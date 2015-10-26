<?php

namespace Application\MainBundle\Controller;

use Application\MainBundle\Entity\Menu;
use Application\MainBundle\Form\MenuType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller
{

    public function editAction($id = null)
    {

        $oMenu = new Menu();
        if (null !== $id) {
            $oMenu = $this->getDoctrine()->getManager()->find('ApplicationMainBundle:Menu', $id);
        }
        
        $form = $this->createForm(new MenuType(), $oMenu, array());

        $form->handleRequest($this->get('request'));
        
        if ($form->isValid()) {
            
            $this->getDoctrine()->getManager()->persist($form->getData());
            $this->getDoctrine()->getManager()->flush();
            
            $this->get('session')->getFlashBag()->add('success', array('Successfull add menu item.'));
            
            return $this->redirect($this->generateUrl('_homepage'));
        }
        
        return $this->render('ApplicationMainBundle:Menu:form.html.twig', array('form' => $form->createView()));
    }

    public function deleteAction()
    {
        
        $menu_ids = $this->get('request')->request->get('menu_item');
        
        if (empty($menu_ids)) {
            return $this->redirect($this->generateUrl('_homepage'));
        }
        
        $query = $this->getDoctrine()->getRepository('ApplicationMainBundle:Menu')->createQueryBuilder('m');
        
        $query->delete()->andWhere($query->expr()->in('m.id', $menu_ids))->getQuery()->getResult();
        
        $this->get('session')->getFlashBag()->add('success', array('Successfull remove menu item.'));
        
        return $this->redirect($this->generateUrl('_homepage'));
    }

}
