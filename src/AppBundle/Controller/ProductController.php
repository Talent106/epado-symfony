<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security; // turn on security annotation
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Type\ProductType;
use AppBundle\Entity\ProductConnection;
use AppBundle\Type\ProductManufacturer\Type;
use AppBundle\Entity\Product;
use AppBundle\Entity\User;
use AppBundle\Entity\ProductPrice;
use Symfony\Component\Form\FormError;

use Doctrine\ORM\QueryBuilder;

class ProductController extends BaseController
{
    
  
    
    /**
     * @Route("/{_locale}/products/{page}", name="product_list", defaults={"page" = 1})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function indexAction(Request $request, $page)
    {
        if(!in_array($this->getUser()->getType(),array('admin','worker','trader') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        
        $em = $this->getDoctrine()->getManager();

        $order_id=null;
        $order=null;
        
        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:Product','p')
        ->leftJoin('p.translations','pt')   
        ->where("pt.locale = '".$request->getLocale()."'")         
        ->select('p'); //, us


        $filters_params=array();


        $filters=array(
            array( 'name'=>'name', 'table'=>'pt','type'=>'text', 'label'=>$this->get('translator')->trans('Nazwa produktu'), 'value'=>null),
        );
        
        if($this->get('request')->query->get('reset')==1) return $this->refresh($filters_params,array('?*','page'));
        
        foreach($filters as $id=>$data){
            if($this->get('request')->query->get($data['table'].'_'.$data['name'])){
                $filters[$id]['value']=$this->get('request')->query->get($data['table'].'_'.$data['name']);
                
                if($data['type']=='text') $query->andWhere($filters[$id]['table'].'.'.$data['name'].' LIKE \'%'.$filters[$id]['value'].'%\'');
            }   
        }
        
        $pager=$this->getPager($page,10,$query);  
        
        return array('objects'=>$pager['results'], 'pager'=>$pager, 'filters'=>$filters, 'filters_params'=>$filters_params, 'order_id'=>$order_id, 'order'=>$order); 
    }
    
    
    /* @var $query QueryBuilder */
    /**
     * @Route("/{_locale}/product/form/{id}", name="product_form", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function formAction(Request $request, $id){
        if(!in_array($this->getUser()->getType(),array('admin','worker','trader') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        
        
        $connected=null;
        $object=null;
        $order_id=null;
        $order=null;
        $em = $this->getDoctrine()->getManager();
        
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Product');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Produkt nie istnieje'); 
            

            
            $connected=$repository->getConnectedProducts($object);
        }else{
            $object=new Product();
            $object->setCreator($this->getUser());
            $repository=$this->getDoctrine()->getRepository('AppBundle:ProductCategory');
            $category = $repository->findOneById(1); 
            $repository=$this->getDoctrine()->getRepository('AppBundle:ProductType');
            $type = $repository->findOneById(1); 
            $repository=$this->getDoctrine()->getRepository('AppBundle:PageType');
            $pagetype = $repository->findOneById(1); 
            
            $object->setType($type);
            $object->setCategory($category);
            $object->setPageType($pagetype);
            
        }
        
        $currencies=$this->container->getParameter('admin_currencies');
        foreach($currencies as $currency){
            $prices=$object->getPrices();
            $found=false;
            if($prices) foreach($prices as $price){
                if($price->getCurrency()==$currency) $found=true;
                if(!in_array($price->getCurrency(),$currencies)) $object->removePrice($price);
            }
            if(!$found){
                $price=new ProductPrice();
                $price->setCurrency($currency)->setPrice(0)->setProduct($object);
                $object->addPrice($price);
            }
        }
        
      
        if ($request->getMethod() == 'GET') {

            
            $connect=$this->get('request')->query->get('connect');
            $connected_product_id=$this->get('request')->query->get('connected_product_id');
            $disconnected_product_id=$this->get('request')->query->get('disconnected_product_id');
            
            if($connect){
                if($this->getUser()->getType()=='partner') throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');

                $query = $em->createQuery(
                    'SELECT p FROM AppBundle:Product p
                    JOIN p.translations ptrans    
                    WHERE ptrans.name LIKE :connect AND p<>:object AND ptrans.locale = :locale    
                    ORDER BY ptrans.name ASC')
                ->setMaxResults(20)      
                ->setParameter('connect',  '%'.$connect.'%')
                ->setParameter('locale',  $request->getLocale())        
                ->setParameter('object',  $object)
                ;

                $result = $query->getResult();
                foreach($result as $rkey=>$res){
                    foreach($connected as $ckey=>$con){
                       if($con->getId()==$res->getId()) unset($result[$rkey]);
                    }
                }
                return $this->render(
                    'AppBundle::Product/connectResult.html.twig',
                    array('result' => $result)
                );
            }
            
            if($connected_product_id){
                if($this->getUser()->getType()=='partner') throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
                
                $result = $repository->findOneById($connected_product_id); 
                
                $pc=new ProductConnection();
                $pc->setCreator($this->getUser());
                $pc->setProduct($object);
                $pc->setProductConnected($result);
                
                $em->persist($pc);
                $em->flush();
                
                return $this->render(
                    'AppBundle::Product/connectList.html.twig',
                    array('connected' => array($result), 'i'=> count($connected)+1, 'order_id'=>$order_id, 'order'=>$order )
                );
            }
            
            if($disconnected_product_id){
                if($this->getUser()->getType()=='partner') throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
                
                /* var $em EntityManager */
                $result = $repository->findOneById($disconnected_product_id); 
                
                $query = $em->createQuery('DELETE  FROM AppBundle:ProductConnection p
                    WHERE (p.product = :object AND  p.product_connected = :result) OR (p.product_connected = :object AND  p.product = :result)')
                    ->setParameter('result',  $result)
                    ->setParameter('object',  $object);
                
                $query->execute();

                return new \Symfony\Component\HttpFoundation\JsonResponse(array('status' => 'ok'));
            } 
        }
        
        $fields_errors=array();
        $error='';
        $refresh=false;
        if ($request->getMethod() == 'POST') {

            if(!empty($_FILES)) {
                
                if(!$this->getUser()->havePagePermission($object,'page_images')) {
                    $message=$this->get('translator')->trans('Wystąpił błąd.');
                    if(!$request->isXmlHttpRequest()) {
                        $this->get('session')->getFlashBag()->add('error', $message);
                        return $this->refresh();
                    }
                    throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
                }
                
                $types=array('image/png','image/jpeg');
                $extensions=array('jpg','jpeg','png');
 
                // @var $file \Symfony\Component\HttpFoundation\File\UploadedFile
                foreach ($request->files as $file) {

                    if(!$file || !in_array($file->getMimeType(),$types) || !in_array($file->guessExtension(),$extensions)){
                        $message=$this->get('translator')->trans('Niewłaściwy format pliku, dozwolone pliki to jpg lub png.');
                        if(!$request->isXmlHttpRequest()) {
                            $this->get('session')->getFlashBag()->add('error', $message);
                            return $this->refresh();
                        }
                        return new \Symfony\Component\HttpFoundation\JsonResponse(array('status' => 'error', 'message'=>$message));
                    }

                    if($file->getSize()>$file->getMaxFilesize()){
                        $message=$this->get('translator')->trans('Plik jest za duży. Dozwolony rozmiar to:').' '.$file->getMaxFilesize();
                        if(!$request->isXmlHttpRequest()) {
                            $this->get('session')->getFlashBag()->add('error', $message);
                            return $this->refresh();
                        }
                        return new \Symfony\Component\HttpFoundation\JsonResponse(array('status' => 'error', 'message'=>$message));
                    }
            
                    $img = new \AppBundle\Entity\Image();
                    $img->setProduct($object);

                    $images=$object->getImagesSort();
                    $last=null;
                    if($images) $last=end($images);   
                    if($last) $img->setSort($last->getSort()+1);
                    else $img->setSort(1);  

                    $img->setPath('_NULL_');
                    $em->persist($img);
                    $em->flush();

                    $filename = sha1(uniqid(mt_rand(), true)).'.'.$file->guessExtension();
                    $targetFile = $img->getUploadRootDir().'/'.$filename;
                    $temp=move_uploaded_file($file->getPathname(), $targetFile);     

                    $img->setPath($filename);
                    $em->persist($img);
                    $em->flush();

                    if(!$object->getImage()) { 
                        $object->setImage($img);                 
                        $em->persist($object);
                        $em->flush();
                    }

                    if(!$request->isXmlHttpRequest()) {
                        $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Dodawanie przebiegło prawidłowo'));
                        return $this->refresh();
                    }
                    return new \Symfony\Component\HttpFoundation\JsonResponse(array('status' => 'ok', 'id'=>$img->getId()));
                }    
                
                
            }
            if($this->get('request')->request->get('video')){
                    $url=$this->getVideoImage($this->get('request')->request->get('video'));
                    //die($url);
                    
                    if(!$url){
                        $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('Wystąpił błąd upewnij się że podany link jest prawidłowy.'));
                        return $this->refresh(); 
                    }
                    
                    $img = new \AppBundle\Entity\Image();
                    $img->setProduct($object);
                    $img->setVideo($this->get('request')->request->get('video'));
                    $img->setPath('_NULL_');
                    
                    $images=$object->getImagesSort();
                    if($images) $last=end($images);   
                    if($last)
                    $img->setSort($last->getSort()+1);
                    else
                    $img->setSort(1);  
                    
                    $em->persist($img);
                    $em->flush();
                    
                    $filename = sha1(uniqid(mt_rand(), true));
                    
                    $split = explode('.', $url);
                    $targetFile = $img->getUploadRootDir().'/'.$filename.'.'.strtolower(end($split));
                    $size=file_put_contents($targetFile, file_get_contents($url));

                    if($size)
                    {
                        $img->setPath($filename.'.'.end($split));
                        $em->persist($img);
                        $em->flush();
                        
                        return $this->refresh();
                    }
                    else
                    {
                        $em->remove($img);
                        $em->flush();

                        $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('Wystąpił błąd upewnij się że podany link jest prawidłowy.'));
                        return $this->refresh();
                    }
                

            }      
        }
        
        $form=$this->createForm(new ProductType(), $object, array(
            'default_locale'=>$this->container->getParameter('default_locale'),
            'locales'=>$this->container->getParameter('admin_locales'),
            'translator'=>$this->get('translator'),
            'cascade_validation' => true) );
                    
        $form->handleRequest($this->getRequest());
        if ($form->isSubmitted()) {
            
            if($this->getUser()->getType()=='partner') throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
                
            
            
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($object);
                $em->flush();
      
                return $this->refresh( array('id'=>$object->getId()), array('?*') );
            } 
        }

        return array('object'=>$object, 'connected'=>$connected,  'form'=>$form->createView(), 'order_id'=>$order_id, 'order'=>$order );
    }
    
    
    /**
     * @Route("/{_locale}/product/form/{id}/image/del", name="product_form_del_img", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function delProductImageAction(Request $request, $id){
        
        if($this->getUser()->getType()=='partner') throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
                
        $product=null;
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Product');
            $product = $repository->findOneById($id);
            if(!$product) throw $this->createNotFoundException('Produkt nie istnieje');
        }
        $em = $this->getDoctrine()->getManager();
        foreach($product->getImages() as $image) {
            if($image->getId() == $_POST['delImgId']) {
                
                if($product->getImage() && $image->getId()==$product->getImage()->getId()){
                    $product->setImage(null);
                    $em->persist($product);
                    $em->flush();
                }
                
                $file = $image->getAbsolutePath();
                $em->remove($image);
                $em->flush();
            }
        }

        return new \Symfony\Component\HttpFoundation\JsonResponse(array('status' => true));
    }
    
    

    /**
     * @Route("/{_locale}/product/form/{id}/image/def", name="product_form_def_img", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function defProductImageAction(Request $request, $id){
        
        if($this->getUser()->getType()=='partner') throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
                
        $product=null;
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Product');
            $product = $repository->findOneById($id);
            if(!$product) throw $this->createNotFoundException('Produkt nie istnieje');
        }
        $em = $this->getDoctrine()->getManager();
        foreach($product->getImages() as $image) {
            if($image->getId() == $_POST['defImgId']) {
                $product->setImage($image);
                $em->persist($product);

                $em->flush();
            }
        }

        return new \Symfony\Component\HttpFoundation\JsonResponse(array('status' => true));
    }
    
    

    /**
     * @Route("/{_locale}/product/types", name="product_type_list")
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function indexTypeAction()
    {
        if(!in_array($this->getUser()->getType(),array('admin','worker') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        $repository=$this->getDoctrine()->getRepository('AppBundle:ProductType');
        $objects = $repository->findAll();
        
        return array('objects'=>$objects);

        
    }

    /**
     * @Route("/{_locale}/product/type/form/{id}", name="product_type_form", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function formTypeAction(Request $request, $id){
        if(!in_array($this->getUser()->getType(),array('admin','worker') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        $object=null;
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:ProductType');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Produkt nie istnieje'); 
        }else{
            $object=new \AppBundle\Entity\ProductType();
            $object->setCreator($this->getUser());
        }
        
        
        $form=$this->createForm(new \AppBundle\Type\ProductTypeType(), $object, array('validation_groups'=>'registration','cascade_validation' => true) );
                    
        $form->handleRequest($this->getRequest());
        if ($form->isSubmitted()) {
            
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($object);
                $em->flush();
                return $this->refresh( array('id'=>$object->getId()), array('?*') );
            } 
        }
        
        
    
        return array('object'=>$object, 'form'=>$form->createView());
    }
    
    
    
    
    

    /**
     * @Route("/{_locale}/product/categories", name="product_category_list")
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function indexCategoryAction()
    {
        if(!in_array($this->getUser()->getType(),array('admin','worker') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        $repository=$this->getDoctrine()->getRepository('AppBundle:ProductCategory');
        $objects = $repository->findAll();
        
        return array('objects'=>$objects);

        
    }

    /**
     * @Route("/{_locale}/product/category/form/{id}", name="product_category_form", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function formCategoryAction(Request $request, $id){
        if(!in_array($this->getUser()->getType(),array('admin','worker') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        $object=null;
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:ProductCategory');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Produkt nie istnieje'); 
        }else{
            $object=new \AppBundle\Entity\ProductCategory();
            $object->setCreator($this->getUser());
            
            //die($object->getCreator()->getUsername());
        }
        
        $form=$this->createForm(new \AppBundle\Type\ProductCategoryType(), $object, array('validation_groups'=>'registration','cascade_validation' => true) );
                    
        $form->handleRequest($this->getRequest());
        if ($form->isSubmitted()) {
            
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($object);
                $em->flush();
                return $this->refresh( array('id'=>$object->getId()), array('?*') );
            } 
        }
        
        //$test=$object->getProducts();
        //foreach($test as $t) echo $t->getName();
        return array('object'=>$object, 'form'=>$form->createView());
    }
     
   
    
    

    /* @var $query QueryBuilder */
    /**
     * @Route("/{_locale}/product/show/{id}", name="product_show", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function productAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Product');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Produkt nie istnieje'); 

            $connected=$repository->getConnectedProducts($object);
        }else{
            if(!$object) throw $this->createNotFoundException('Produkt nie istnieje'); 
        }
        
        
        return array('object'=>$object);
    }    
    
    
    /**
     * @Route("/{_locale}/shop", name="shop")
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function shopAction(Request $request)
    {
       
        if(!in_array($this->getUser()->getType(),array('admin','worker','partner') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        $em = $this->getDoctrine()->getManager();
        
        
        $query = $em->createQueryBuilder('')->from('AppBundle:Product','p')->leftJoin('p.translations','pt')
        ->where("pt.locale = '".$request->getLocale()."'")
        ->andWhere('p.enabled = 1')
        ->andWhere('p.deleted IS NULL ')
        ->orderBy('pt.name', 'ASC')->select('p');

        $repository=$this->getDoctrine()->getRepository('AppBundle:ProductCategory');
        $productcategory = $repository->findOneById(2); 
        $query->andWhere('p.category = :category'); 
        $query->setParameter('category',  $productcategory);

        $products = $query->getQuery()->getResult();

        return array('products'=>$products);
    }
}
