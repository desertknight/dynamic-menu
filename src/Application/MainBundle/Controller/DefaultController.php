<?php

namespace Application\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction()
    {
        return $this->render('ApplicationMainBundle:Default:index.html.twig');
    }

    public function listMenuAction()
    {

        $menus = $this->getDoctrine()->getRepository('ApplicationMainBundle:Menu')->findBy(array('parent' => null), array('id' => 'ASC'));

        return $this->render('ApplicationMainBundle:Default:menu.html.twig', array('menus' => $menus));
    }

}
