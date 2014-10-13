<?php


namespace Cegeka\FlandersDriveBundle\Controller;


use Cegeka\FlandersDriveBundle\Entity\Requirement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ContentController extends Controller
{
    public function displayHomeAction()
    {

        return $this->render('@CegekaFlandersDrive/Content/homepage.html.twig');
    }

} 