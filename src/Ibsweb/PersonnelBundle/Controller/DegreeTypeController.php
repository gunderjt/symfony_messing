<?php

namespace Ibsweb\PersonnelBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ibsweb\PersonnelBundle\Entity\DegreeType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Ibsweb\PersonnelBundle\Form\Type\DegreeTypeType;

class DegreeTypeController extends Controller{
  /**
   * @Route("/degree", name="degree_index")
   */
  public function indexAction(){
    $degrees = $this->getDoctrine()
      ->getRepository("IbswebPersonnelBundle:DegreeType")
      ->findAll();

    return $this->render('IbswebPersonnelBundle:DegreeType:index.html.twig', 
      array(
        'degrees' => $degrees,
      )
    );
  }

  /**
   * @Route("/degree/new", name="degree_new")
   */
  public function newAction(Request $request){
    //$positions = [];
    $degree = new DegreeType();
    $form = $this->createForm('degree', $degree, 
      array(
        'action' => $this->generateUrl("degree_new"),
        'method' => "POST",
      )
    );
    $form->handleRequest($request);

    if ($form->isValid()){
      //$er = $form->getData();
      $em = $this->getDoctrine()->getManager();
      $em->persist($form->getData());
      $em->flush();

      return $this->redirect($this->generateUrl('degree_index'));
    }

    return $this->render('IbswebPersonnelBundle:DegreeType:new.html.twig',
      array(
        'form' => $form->createView(),
      )
    );
  }
}