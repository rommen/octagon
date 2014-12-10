<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;
 
class AuthenticationSuccessHandler implements AuthenticationSuccessHandlerInterface
{
	
	protected $router;
	protected $security;
	
	public function __construct(Router $router, SecurityContext $security)
	{
		$this->router = $router;
		$this->security = $security;
	}
	
	public function onAuthenticationSuccess(Request $request, TokenInterface $token){
		
            if ($this->security->isGranted('ROLE_ADMIN')){
                    $response = new RedirectResponse($this->router->generate('default_admin_page'));			
            }else{
                    $response = new RedirectResponse($this->router->generate('_home'));
            } 	
            return $response;
	}
	
}
