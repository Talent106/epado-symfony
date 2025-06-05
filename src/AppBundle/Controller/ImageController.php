<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Image;
use AppBundle\Type\ImageType;
use Symfony\Component\Form\FormError;
use Doctrine\ORM\QueryBuilder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security; // turn on security annotation


class ImageController extends BaseController {

    /**
     * @Route("/thumbnails/{resolution}/{file}", name="thumbnail", requirements={"file"=".+"}, defaults={"resolution"=null,"file"=null})
     */
    public function indexAction(Request $request, $resolution, $file) {
        $xAxis = null;
        $yAxis = null;

        $documentRoot = $_SERVER['DOCUMENT_ROOT'];
        if (!in_array(substr($documentRoot, -1), array('\\', '/')))
            $documentRoot.='/';

        $fileObj = new \SplFileInfo($documentRoot . $file);
        if (!$fileObj->isFile()) {
            header("HTTP/1.0 404 Not Found");
            die('File not found');
        }

        $fileExt = $fileObj->getExtension();
        if ($fileExt == 'jpg' || $fileExt == 'jpeg') {
            $img = @imagecreatefromjpeg($fileObj->getPathname()) or die("Cannot create new JPEG image");
        } else if ($fileExt == 'png') {
            $img = @imagecreatefrompng($fileObj->getPathname()) or die("Cannot create new PNG image");
        } else if ($fileExt == 'gif') {
            $img = @imagecreatefromgif($fileObj->getPathname()) or die("Cannot create new GIF image");
        }
        
        $iThumbnailHeight=null;
        //change becouse images was cut off from right
        $iThumbnailHeight=0;
                
        if(strpos($resolution,'x')!==false)
        list($iThumbnailWidth, $iThumbnailHeight) = explode('x', $resolution);
        else $iThumbnailWidth=$resolution;
        
        
        
        $iOrigWidth = imagesx($img);
        $iOrigHeight = imagesy($img);


        $fScale = max($iThumbnailWidth / $iOrigWidth, $iThumbnailHeight / $iOrigHeight);

        if($iThumbnailHeight===0) $iThumbnailHeight=floor($iThumbnailWidth*($iOrigHeight/$iOrigWidth));
        if($iThumbnailWidth===0) $iThumbnailWidth=floor($iThumbnailHeight*($iOrigWidth/$iOrigHeight));
        
        
        //becouse it is never null it will not lounch
        if($iThumbnailHeight===null){
           if($iOrigWidth>$iOrigHeight){
               $iThumbnailWidth=$iThumbnailWidth;
               $iThumbnailHeight=floor($iThumbnailWidth*($iOrigHeight/$iOrigWidth));
           }else{
               $iThumbnailHeight=$iThumbnailWidth; 
               $iThumbnailWidth=floor($iThumbnailHeight*($iOrigWidth/$iOrigHeight));
           } 
        }
        
        
        
        if ($fScale < 1) {
            $iNewWidth = ceil($fScale * $iOrigWidth);
            $iNewHeight = ceil($fScale * $iOrigHeight);

            $tmpimg = imagecreatetruecolor($iNewWidth, $iNewHeight);
            $tmp2img = imagecreatetruecolor($iThumbnailWidth, $iThumbnailHeight);
            if ($fileExt == 'png') {
                imagealphablending($tmpimg, false);
                imagesavealpha($tmpimg, true);

                imagealphablending($tmp2img, false);
                imagesavealpha($tmp2img, true);
            }
            imagecopyresampled($tmpimg, $img, 0, 0, 0, 0, $iNewWidth, $iNewHeight, $iOrigWidth, $iOrigHeight);

            if ($iNewWidth == $iThumbnailWidth) {
                $yAxis = floor(($iNewHeight / 2) - ($iThumbnailHeight / 2));
                $xAxis = 0;
            } else if ($iNewHeight == $iThumbnailHeight) {
                $yAxis = 0;
                $xAxis = floor(($iNewWidth / 2) - ($iThumbnailWidth / 2));
            }

            imagecopyresampled($tmp2img, $tmpimg, 0, 0, $xAxis, $yAxis, $iThumbnailWidth, $iThumbnailHeight, $iThumbnailWidth, $iThumbnailHeight);

            imagedestroy($img);
            imagedestroy($tmpimg);
            $img = $tmp2img;
        }else{//zmiana powoduje generowanie odpowiednich rozmiarow nawet jezeli obrazek jest mniejszy
            $iNewWidth = ceil($fScale * $iOrigWidth);
            $iNewHeight = ceil($fScale * $iOrigHeight);

            $tmpimg = imagecreatetruecolor($iNewWidth, $iNewHeight);
            $tmp2img = imagecreatetruecolor($iThumbnailWidth, $iThumbnailHeight);
            if ($fileExt == 'png') {
                imagealphablending($tmpimg, false);
                imagesavealpha($tmpimg, true);

                imagealphablending($tmp2img, false);
                imagesavealpha($tmp2img, true);
            }
            imagecopyresampled($tmpimg, $img, 0, 0, 0, 0, $iNewWidth, $iNewHeight, $iOrigWidth, $iOrigHeight);

            if ($iNewWidth == $iThumbnailWidth) {
                $yAxis = floor(($iNewHeight / 2) - ($iThumbnailHeight / 2));
                $xAxis = 0;
            } else if ($iNewHeight == $iThumbnailHeight) {
                $yAxis = 0;
                $xAxis = floor(($iNewWidth / 2) - ($iThumbnailWidth / 2));
            }

            imagecopyresampled($tmp2img, $tmpimg, 0, 0, $xAxis, $yAxis, $iThumbnailWidth, $iThumbnailHeight, $iThumbnailWidth, $iThumbnailHeight);

            imagedestroy($img);
            imagedestroy($tmpimg);
            $img = $tmp2img;  
        }

        //die($iThumbnailWidth.' - '.$iThumbnailHeight);
        
        $targetDir = $documentRoot . 'thumbnails/' . $resolution;
        $fileObj = new \SplFileInfo($targetDir . '/' . $file);
        if (substr($fileObj->getPath(), 0, strlen($targetDir)) != $targetDir) {
            header("HTTP/1.0 404 Not Found");
            die('File not found');
        }

        $dirs = explode('/', substr($fileObj->getPath(), strlen($documentRoot . 'thumbnails/')));
        $dir = $documentRoot . 'thumbnails/';
        foreach ($dirs as $_dir) {
            $dir .= $_dir . '/';
            if (!is_dir($dir)) {
                mkdir($dir);
            }
        }

        if ($fileExt == 'jpg' || $fileExt == 'jpeg') {
            header("Content-type: image/jpeg");
            imagejpeg($img, $fileObj->getPathname());
            imagejpeg($img);
        } else if ($fileExt == 'png') {
            header("Content-type: image/png");
            imagepng($img, $fileObj->getPathname());
            imagepng($img);
        } else if ($fileExt == 'gif') {
            header("Content-type: image/gif");
            imagegif($img, $fileObj->getPathname());
            imagegif($img);
        } else {
            header("Content-type: image/jpeg");
            imagejpeg($img);
        }
        imagedestroy($img);
        die();
    }

    

    /* @var $query QueryBuilder */
    /**
     * @Route("/{_locale}/image/form/{id}", name="image_form", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function formAction(Request $request, $id){
        $object=null;
        $em = $this->getDoctrine()->getManager();
        
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Image');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Zdjęcie nie istnieje'); 
            
        }else{
            throw $this->createNotFoundException('Zdjęcie nie istnieje'); 
        }
        
        if($this->get('request')->query->get('response'))
        $response=$this->get('request')->query->get('response');    
        else
        $response='form';


        
        $form=$this->createForm(new ImageType(), $object, array(
            'default_locale'=>$this->container->getParameter('default_locale'),
            'locales'=>$this->container->getParameter('admin_locales'),
            'translator'=>$this->get('translator'),
            'validation_groups'=> array('admin'),
            'cascade_validation' => true) );
                    
        $form->handleRequest($this->getRequest());
        if ($form->isSubmitted()) {
            
            if($this->getUser()->getType()=='partner') throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
                
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                //$em->persist($object->getAddress());
                $em->persist($object);
                $em->flush();
      
                return $this->refresh( array('id'=>$object->getId(),'response'=>'close'), array('?*') );
            }else $response='error'; 
        }

        return array('object'=>$object,'form'=>$form->createView(), 'response'=>$response);
    }


    /**
     * @Route("/{_locale}/image/sort/{id}", name="image_sort", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function sortAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        
        if($id){
            
            $sorted=explode(',',$id);
            if(count($sorted)>1)
            foreach($sorted as $sort=>$id)
            {
                $repository=$this->getDoctrine()->getRepository('AppBundle:Image');
                $object = $repository->findOneById($id);
                if($object) {$object->setSort($sort); $em->persist($object);   }  
            }
            
            
            $em->flush();

            
        }else{
            throw $this->createNotFoundException('Zdjęcie nie istnieje'); 
        }
        
        die();
    } 
}
