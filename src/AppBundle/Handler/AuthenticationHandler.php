<?php

namespace AppBundle\Handler;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;


use Symfony\Component\Translation\TranslatorInterface;


class AuthenticationHandler implements AuthenticationSuccessHandlerInterface, AuthenticationFailureHandlerInterface
{
    private $router;
    private $session;
    private $translator;
    /**
     * Constructor
     *
     * @param   RouterInterface $router
     * @param   Session $session
     */
    //jakie obiekty się tu dostaną tak jak i do listenerów decyduje sie przez parametr argument w configu handlera
    public function __construct( RouterInterface $router, Session $session, TranslatorInterface $translator ) //, Session $session
    {
        $this->router  = $router;
        $this->session = $session;
        $this->translator = $translator;
    }

    /**
     * onAuthenticationSuccess
     *
     * @param   Request $request
     * @param   TokenInterface $token
     * @return  Response
     */
    public function onAuthenticationSuccess( Request $request, TokenInterface $token )
    {
        // if AJAX login
        if ( $request->isXmlHttpRequest() ) {

            $array = array( 'success' => true, 'url'=>$this->router->generate( 'homepage' ) ); // data to return via JSON
            $response = new Response( json_encode( $array ) );
            $response->headers->set( 'Content-Type', 'application/json' );

            return $response;

            // if form login
        } else {

            if ( $this->session->get('_security.main.target_path' ) ) {

                $url = $this->session->get( '_security.main.target_path' );

            } else {

                $url = $this->router->generate( 'homepage' );

            } // end if

            return new RedirectResponse( $url );

        }
    }

    /**
     * onAuthenticationFailure
     *
     * @param   Request $request
     * @param   AuthenticationException $exception
     * @return  Response
     */
    public function onAuthenticationFailure( Request $request, AuthenticationException $exception )
    {
        // if AJAX login
        if ( $request->isXmlHttpRequest() ) {

            $array = array( 'success' => false, 'message' => $this->translator->trans($exception->getMessageKey(), array(), 'security') ); // data to return via JSON
            $response = new Response( json_encode( $array ) );
            $response->headers->set( 'Content-Type', 'application/json' );

            return $response;

            // if form login
        } else {

            // set authentication exception to session
            $request->getSession()->set(SecurityContextInterface::AUTHENTICATION_ERROR, $exception);

            return new RedirectResponse( $this->router->generate( 'login' ) );
        }
    }
}