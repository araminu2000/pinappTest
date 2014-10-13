<?php


namespace Pinapp\TracerBundle\Controller;


use Pinapp\TracerBundle\Entity\Requirement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ContentController extends Controller
{
    public function displayHomeAction()
    {

        return $this->render('@PinappTracer/Content/homepage.html.twig');
    }

} 