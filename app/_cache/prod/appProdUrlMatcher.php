<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // _twig_error_test
        if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
        }

        // logout
        if (preg_match('#^/(?P<_locale>[^/]++)/logout$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'logout')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',));
        }

        // login_check
        if (preg_match('#^/(?P<_locale>[^/]++)/login_check$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'login_check')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',));
        }

        // permission
        if (preg_match('#^/(?P<_locale>[^/]++)/profile/permission(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'permission')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\ProfileController::permissionAction',));
        }

        // profile_show
        if (preg_match('#^/(?P<_locale>[^/]++)/profile/show$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'profile_show')), array (  '_controller' => 'AppBundle\\Controller\\ProfileController::showAction',));
        }

        // panel_after_login
        if ($pathinfo === '/panel_after_login') {
            return array (  '_controller' => 'AppBundle\\Controller\\ProfileController::panelAfterLoginAction',  '_route' => 'panel_after_login',);
        }

        // panel
        if (preg_match('#^/(?P<_locale>[^/]++)/panel$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'panel')), array (  '_controller' => 'AppBundle\\Controller\\ProfileController::panelAction',));
        }

        // profile_address
        if (preg_match('#^/(?P<_locale>[^/]++)/profile/address(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'profile_address')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\ProfileController::addressAction',));
        }

        // profile_edit
        if (preg_match('#^/(?P<_locale>[^/]++)/profile/edit$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'profile_edit')), array (  '_controller' => 'AppBundle\\Controller\\ProfileController::editAction',));
        }

        // reset
        if (preg_match('#^/(?P<_locale>[^/]++)/reset$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'reset')), array (  '_controller' => 'AppBundle\\Controller\\ProfileController::resetAction',));
        }

        // facebook
        if (preg_match('#^/(?P<_locale>[^/]++)/facebook$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'facebook')), array (  '_controller' => 'AppBundle\\Controller\\ProfileController::facebookAction',));
        }

        // login
        if (preg_match('#^/(?P<_locale>[^/]++)/login$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'login')), array (  '_controller' => 'AppBundle\\Controller\\ProfileController::loginAction',));
        }

        // register
        if (preg_match('#^/(?P<_locale>[^/]++)/register$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'register')), array (  '_controller' => 'AppBundle\\Controller\\ProfileController::registerAction',));
        }

        // product_list
        if (preg_match('#^/(?P<_locale>[^/]++)/products(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'product_list')), array (  'page' => 1,  '_controller' => 'AppBundle\\Controller\\ProductController::indexAction',));
        }

        // product_form
        if (preg_match('#^/(?P<_locale>[^/]++)/product/form(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'product_form')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\ProductController::formAction',));
        }

        // product_form_del_img
        if (preg_match('#^/(?P<_locale>[^/]++)/product/form/(?P<id>[^/]++)/image/del$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'product_form_del_img')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\ProductController::delProductImageAction',));
        }

        // product_form_def_img
        if (preg_match('#^/(?P<_locale>[^/]++)/product/form/(?P<id>[^/]++)/image/def$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'product_form_def_img')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\ProductController::defProductImageAction',));
        }

        // product_type_list
        if (preg_match('#^/(?P<_locale>[^/]++)/product/types$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'product_type_list')), array (  '_controller' => 'AppBundle\\Controller\\ProductController::indexTypeAction',));
        }

        // product_type_form
        if (preg_match('#^/(?P<_locale>[^/]++)/product/type/form(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'product_type_form')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\ProductController::formTypeAction',));
        }

        // product_category_list
        if (preg_match('#^/(?P<_locale>[^/]++)/product/categories$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'product_category_list')), array (  '_controller' => 'AppBundle\\Controller\\ProductController::indexCategoryAction',));
        }

        // product_category_form
        if (preg_match('#^/(?P<_locale>[^/]++)/product/category/form(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'product_category_form')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\ProductController::formCategoryAction',));
        }

        // product_show
        if (preg_match('#^/(?P<_locale>[^/]++)/product/show(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'product_show')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\ProductController::productAction',));
        }

        // shop
        if (preg_match('#^/(?P<_locale>[^/]++)/shop$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'shop')), array (  '_controller' => 'AppBundle\\Controller\\ProductController::shopAction',));
        }

        // user_list
        if (preg_match('#^/(?P<_locale>[^/]++)/users(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_list')), array (  'page' => 1,  '_controller' => 'AppBundle\\Controller\\UserController::indexAction',));
        }

        // user_form
        if (preg_match('#^/(?P<_locale>[^/]++)/user/form(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_form')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\UserController::formAction',));
        }

        // ads
        if (preg_match('#^/(?P<_locale>[^/]++)/ads/form$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ads')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\UserController::adsAction',));
        }

        // admin
        if (preg_match('#^/(?P<_locale>[^/]++)/admin$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin')), array (  '_controller' => 'AppBundle\\Controller\\UserController::adminAction',));
        }

        // thumbnail
        if (0 === strpos($pathinfo, '/thumbnails') && preg_match('#^/thumbnails(?:/(?P<resolution>[^/]++)(?:/(?P<file>.+))?)?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'thumbnail')), array (  'resolution' => NULL,  'file' => NULL,  '_controller' => 'AppBundle\\Controller\\ImageController::indexAction',));
        }

        // image_form
        if (preg_match('#^/(?P<_locale>[^/]++)/image/form(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'image_form')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\ImageController::formAction',));
        }

        // image_sort
        if (preg_match('#^/(?P<_locale>[^/]++)/image/sort(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'image_sort')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\ImageController::sortAction',));
        }

        // code_list
        if (preg_match('#^/(?P<_locale>[^/]++)/codes(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'code_list')), array (  'page' => 1,  '_controller' => 'AppBundle\\Controller\\CodeController::indexAction',));
        }

        // sold
        if (preg_match('#^/(?P<_locale>[^/]++)/sold(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'sold')), array (  'page' => 1,  '_controller' => 'AppBundle\\Controller\\CodeController::soldAction',));
        }

        // code_form
        if (preg_match('#^/(?P<_locale>[^/]++)/code/form(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'code_form')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\CodeController::formAction',));
        }

        // welcome_print
        if (preg_match('#^/(?P<_locale>[^/]++)/welcome\\.pdf$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'welcome_print')), array (  '_controller' => 'AppBundle\\Controller\\CodeController::welcomePrintAction',));
        }

        // code_print
        if (preg_match('#^/(?P<_locale>[^/]++)/codes\\.pdf$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'code_print')), array (  '_controller' => 'AppBundle\\Controller\\CodeController::codesPrintAction',));
        }

        // message_list
        if (preg_match('#^/(?P<_locale>[^/]++)/messages(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'message_list')), array (  'page' => 1,  '_controller' => 'AppBundle\\Controller\\MessageController::indexAction',));
        }

        // questions_list
        if (preg_match('#^/(?P<_locale>[^/]++)/questions(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'questions_list')), array (  'page' => 1,  '_controller' => 'AppBundle\\Controller\\MessageController::questionsAction',));
        }

        // message_info
        if (preg_match('#^/(?P<_locale>[^/]++)/messages/info$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'message_info')), array (  '_controller' => 'AppBundle\\Controller\\MessageController::infoAction',));
        }

        // questions_info
        if (preg_match('#^/(?P<_locale>[^/]++)/questions/info$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'questions_info')), array (  '_controller' => 'AppBundle\\Controller\\MessageController::infoQuestionsAction',));
        }

        // message_form
        if (preg_match('#^/(?P<_locale>[^/]++)/message/form(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'message_form')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\MessageController::formAction',));
        }

        // order_list
        if (preg_match('#^/(?P<_locale>[^/]++)/orders(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'order_list')), array (  'page' => 1,  '_controller' => 'AppBundle\\Controller\\OrderController::indexAction',));
        }

        // contract_form
        if (preg_match('#^/(?P<_locale>[^/]++)/contract/form/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'contract_form')), array (  '_controller' => 'AppBundle\\Controller\\OrderController::formContractAction',));
        }

        // contract_form_del_img
        if (preg_match('#^/(?P<_locale>[^/]++)/contract/form/(?P<id>[^/]++)/image/del$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'contract_form_del_img')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\OrderController::delContractImageAction',));
        }

        // contract_page_def_img
        if (preg_match('#^/(?P<_locale>[^/]++)/contract/form/(?P<id>[^/]++)/image/def$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'contract_page_def_img')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\OrderController::defContractImageAction',));
        }

        // contract_info
        if (preg_match('#^/(?P<_locale>[^/]++)/cart/info$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'contract_info')), array (  '_controller' => 'AppBundle\\Controller\\OrderController::infoCartAction',));
        }

        // contract_list
        if (preg_match('#^/(?P<_locale>[^/]++)/contracts(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'contract_list')), array (  'page' => 1,  '_controller' => 'AppBundle\\Controller\\OrderController::indexContractAction',));
        }

        // cart
        if (preg_match('#^/(?P<_locale>[^/]++)/cart(?:/(?P<product_id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'cart')), array (  'product_id' => NULL,  '_controller' => 'AppBundle\\Controller\\OrderController::cartAction',));
        }

        // order_form
        if (preg_match('#^/(?P<_locale>[^/]++)/order/form(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'order_form')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\OrderController::formAction',));
        }

        // order_payu
        if (preg_match('#^/(?P<_locale>[^/]++)/order/payu(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'order_payu')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\OrderController::payuAction',));
        }

        // order_address_form
        if (preg_match('#^/(?P<_locale>[^/]++)/order/address/form(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'order_address_form')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\OrderController::addressFormAction',));
        }

        // order_invoice_download
        if (preg_match('#^/(?P<_locale>[^/]++)/order/invoice/download/epado_dokument_(?P<id>[^/\\.]++)\\.pdf$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'order_invoice_download')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\OrderController::invoiceDownloadAction',));
        }

        // order_invoice_add
        if (preg_match('#^/(?P<_locale>[^/]++)/order/invoice/add(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'order_invoice_add')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\OrderController::invoiceAddAction',));
        }

        // order_info
        if (preg_match('#^/(?P<_locale>[^/]++)/order/info$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'order_info')), array (  'ad' => NULL,  '_controller' => 'AppBundle\\Controller\\OrderController::infoAction',));
        }

        // order_status_list
        if (preg_match('#^/(?P<_locale>[^/]++)/status/list$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'order_status_list')), array (  '_controller' => 'AppBundle\\Controller\\OrderController::indexStatusAction',));
        }

        // order_status_form
        if (preg_match('#^/(?P<_locale>[^/]++)/status/form(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'order_status_form')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\OrderController::formStatusAction',));
        }

        // mail_list
        if (preg_match('#^/(?P<_locale>[^/]++)/mail/list$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'mail_list')), array (  '_controller' => 'AppBundle\\Controller\\OrderController::indexMailAction',));
        }

        // mail_form
        if (preg_match('#^/(?P<_locale>[^/]++)/mail/form(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'mail_form')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\OrderController::formMailAction',));
        }

        // statistics
        if (preg_match('#^/(?P<_locale>[^/]++)/statistics$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'statistics')), array (  '_controller' => 'AppBundle\\Controller\\OrderController::statisticsAction',));
        }

        // page_list
        if (preg_match('#^/(?P<_locale>[^/]++)/pages(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'page_list')), array (  'page' => 1,  '_controller' => 'AppBundle\\Controller\\PageController::indexAction',));
        }

        // page_code
        if (preg_match('#^/(?P<_locale>[^/]++)/page/code(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'page_code')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\PageController::codeAction',));
        }

        // page_audiobook
        if (preg_match('#^/(?P<_locale>[^/]++)/page/audiobook/form(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'page_audiobook')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\PageController::audiobookAction',));
        }

        // page_form
        if (preg_match('#^/(?P<_locale>[^/]++)/page/form(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'page_form')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\PageController::formAction',));
        }

        // page_form_del_img
        if (preg_match('#^/(?P<_locale>[^/]++)/page/form/(?P<id>[^/]++)/image/del$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'page_form_del_img')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\PageController::delPageImageAction',));
        }

        // page_page_def_img
        if (preg_match('#^/(?P<_locale>[^/]++)/page/form/(?P<id>[^/]++)/image/def$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'page_page_def_img')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\PageController::defPageImageAction',));
        }

        // page_type_list
        if (preg_match('#^/(?P<_locale>[^/]++)/page/types$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'page_type_list')), array (  '_controller' => 'AppBundle\\Controller\\PageController::indexTypeAction',));
        }

        // page_type_form
        if (preg_match('#^/(?P<_locale>[^/]++)/page/type/form(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'page_type_form')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\PageController::formTypeAction',));
        }

        // page_category_list
        if (preg_match('#^/(?P<_locale>[^/]++)/page/categories$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'page_category_list')), array (  '_controller' => 'AppBundle\\Controller\\PageController::indexCategoryAction',));
        }

        // page_category_form
        if (preg_match('#^/(?P<_locale>[^/]++)/page/category/form(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'page_category_form')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\PageController::formCategoryAction',));
        }

        // country_list
        if (preg_match('#^/(?P<_locale>[^/]++)/countries(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'country_list')), array (  'page' => 1,  '_controller' => 'AppBundle\\Controller\\CountryController::indexAction',));
        }

        // country_form
        if (preg_match('#^/(?P<_locale>[^/]++)/countries/form(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'country_form')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\CountryController::formAction',));
        }

        // cemetery_info
        if (preg_match('#^/(?P<_locale>[^/]++)/cemetery/info$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'cemetery_info')), array (  'ad' => NULL,  '_controller' => 'AppBundle\\Controller\\CemeteryController::infoAction',));
        }

        // cemetery_list
        if (preg_match('#^/(?P<_locale>[^/]++)/cemeteries(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'cemetery_list')), array (  'page' => 1,  '_controller' => 'AppBundle\\Controller\\CemeteryController::indexAction',));
        }

        // cemetery_form
        if (preg_match('#^/(?P<_locale>[^/]++)/cemetery/form(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'cemetery_form')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\CemeteryController::formAction',));
        }

        // family_list
        if (preg_match('#^/(?P<_locale>[^/]++)/families(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'family_list')), array (  'page' => 1,  '_controller' => 'AppBundle\\Controller\\FamilyController::indexAction',));
        }

        // family_form
        if (preg_match('#^/(?P<_locale>[^/]++)/family/form(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'family_form')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\FamilyController::formAction',));
        }

        if (0 === strpos($pathinfo, '/c')) {
            // cron
            if ($pathinfo === '/cron_reminder') {
                return array (  '_controller' => 'AppBundle\\Controller\\HomeController::cronAction',  '_route' => 'cron',);
            }

            // contact
            if ($pathinfo === '/contact') {
                return array (  '_controller' => 'AppBundle\\Controller\\HomeController::contactAction',  '_route' => 'contact',);
            }

        }

        // search
        if (preg_match('#^/(?P<_locale>[^/]++)/search$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'search')), array (  '_controller' => 'AppBundle\\Controller\\HomeController::searchAction',));
        }

        // cemetery
        if (preg_match('#^/(?P<_locale>[^/]++)/cemetery/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'cemetery')), array (  '_controller' => 'AppBundle\\Controller\\HomeController::cemeteryAction',));
        }

        // page
        if (preg_match('#^/(?P<code>\\d{15}+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'page')), array (  '_controller' => 'AppBundle\\Controller\\HomeController::pageAction',));
        }

        // page_locale
        if (preg_match('#^/(?P<_locale>[^/]++)/(?P<code>\\d{15}+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'page_locale')), array (  '_controller' => 'AppBundle\\Controller\\HomeController::pageLocaleAction',));
        }

        // page_preview
        if (preg_match('#^/(?P<_locale>[^/]++)/preview/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'page_preview')), array (  '_controller' => 'AppBundle\\Controller\\HomeController::pagePreviewAction',));
        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\HomeController::homeAction',  '_route' => 'homepage',);
        }

        // homepage_locale
        if (preg_match('#^/(?P<_locale>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'homepage_locale')), array (  '_controller' => 'AppBundle\\Controller\\HomeController::homeLocaleAction',));
        }

        // rules
        if (preg_match('#^/(?P<_locale>[^/]++)/rules$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'rules')), array (  '_controller' => 'AppBundle\\Controller\\HomeController::rulesAction',));
        }

        // prv
        if (preg_match('#^/(?P<_locale>[^/]++)/prv$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'prv')), array (  '_controller' => 'AppBundle\\Controller\\HomeController::prvAction',));
        }

        // text_list
        if (preg_match('#^/(?P<_locale>[^/]++)/texts(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'text_list')), array (  'page' => 1,  '_controller' => 'AppBundle\\Controller\\TextController::indexAction',));
        }

        // text_form
        if (preg_match('#^/(?P<_locale>[^/]++)/text/form(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'text_form')), array (  'id' => NULL,  '_controller' => 'AppBundle\\Controller\\TextController::formAction',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
