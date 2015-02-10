<?php

namespace Ibsweb\PersonnelBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ibsweb\PersonnelBundle\Entity\Personnel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Ibsweb\PersonnelBundle\Form\Type\PersonnelType;

class PersonnelController extends Controller{

  /**
   * @Route("/personnel", name="personnel_index")
   */
  public function indexAction(){
    $personnels = $this->getDoctrine()
      ->getRepository("IbswebPersonnelBundle:Personnel")
      ->findAll();

    return $this->render('IbswebPersonnelBundle:Personnel:index.html.twig', 
      array(
        'personnels' => $personnels,
      )
    );
  }

  /**
   * @Route("/personnel/new", name="personnel_new")
   */
  public function newAction(Request $request){
    //$positions = [];
    $personnel = new Personnel();
    $form = $this->createForm('personnel', $personnel, 
      array(
        'action' => $this->generateUrl("personnel_new"),
        'method' => "POST",
      )
    );
    $form->handleRequest($request);

    if ($form->isValid()){
      //$er = $form->getData();
      $em = $this->getDoctrine()->getManager();
      $em->persist($form->getData());
      $em->flush();

      return $this->redirect($this->generateUrl('personnel_index'));
    }

    return $this->render('IbswebPersonnelBundle:Personnel:new.html.twig',
      array(
        'form' => $form->createView(),
      )
    );
  }
}