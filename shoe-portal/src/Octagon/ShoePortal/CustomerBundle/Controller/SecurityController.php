<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
/**
 * Description of SecurityController
 *
 * @author rommen
 */
class SecurityController extends SecureController {

    public function loginAction(Request $request) {
        return $this->render('CustomerBundle:Security:login.html.twig');
    }

}
