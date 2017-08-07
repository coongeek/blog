<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{
    public function profileAction(Request $request)
    {
        $ownerProfile = $this->getUser()->getProfile();
        
        exit(\Doctrine\Common\Util\Debug::dump($ownerProfile->getId()));
    }
}

