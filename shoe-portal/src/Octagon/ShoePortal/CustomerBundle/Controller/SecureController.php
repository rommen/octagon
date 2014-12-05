<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Basic controller to handle authenticated user data
 *
 * @author rommen
 */
class SecureController extends Controller {

    /**
     * Checks if session is assigned to authenticated user.
     * If no authenticated user present, then redirect to login page.
     * If user authenticated then do nothing.
     * @return redirect to login page or null
     */
    public function checkIfUserLoggedIn() {
        if (false == $this->isLoggedIn()) {
            $logger = $this->get('logger');
            $logger->info('User is not logged in, throwing AccessDeniedException');
            throw $this->createAccessDeniedException('Unable to access this page!');
        }
//        if(!$this->isLoggedIn()){
//            return $this->redirect($this->generateUrl('_login')); 
//        }else
//            return null;
    }

    /**
     * Get authenticated user id as pure integer from DB
     * @return integer
     */
    public function getAuthUserId() {
        return $this->getUser()->getId();
    }

    /**
     * Checks if user is logged in and return true/false.
     *
     * Also in Twig you may use this template:
     * {% if app.user %}
     *       # user is logged in
     * {% else %}
     *       # user is not logged in
     * {% endif %}
     * @return boolean
     */
    public function isLoggedIn() {
        try {
            $securityContext = $this->container->get('security.context');
            if ($securityContext->isGranted('IS_AUTHENTICATED_FULLY')){
                return true;
            }else{
                return false;
            }
        } catch (\Exception $e) {
            $logger = $this->get('logger');
            $logger->error('Cannot determine if user is logged in: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get authenticated username
     * @return string
     */
    public function getAuthUsername() {
        
    }

    /**
     * Checks if user is logged in and it is admin
     * Also in Twig this template may be used
     * {% if is_granted('ROLE_SUPER_ADMIN') -%}
     *     # You're a `admin`
     * {%- endif %}
     * @return boolean
     */
    public function isUserAdmin() {
        try {
            return $this->get('security.context')->isGranted('ROLE_ADMIN');
        } catch (\Exception $e) {
            $logger = $this->get('logger');
            $logger->error('Cannot determine if user is admin: ' . $e->getMessage());
            return false;
        }
    }

}
