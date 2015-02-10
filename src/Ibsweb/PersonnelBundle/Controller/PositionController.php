<?php

namespace Ibsweb\PersonnelBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ibsweb\PersonnelBundle\Entity\Position;
use Ibsweb\PersonnelBundle\Entity\PositionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Ibsweb\PersonnelBundle\Form\Type\PositionType;

class PositionController extends Controller{
  /**
   * @Route("/position", name="position_index")
   */
  public function indexAction(){
    //$positions = [];
    $positions = $this->getDoctrine()
      ->getRepository("IbswebPersonnelBundle:Position")
      ->findAllOrderedByTitle();

    return $this->render('IbswebPersonnelBundle:Position:index.html.twig', 
      array(
        'positions' => $positions,
      )
    );
  }

  /**
   * @Route("/position/new", name="position_new")
   */
  public function newAction(Request $request){
    $position = new Position();

    //Set default value
    $position->setActive(true);

    //Create Form
    $form = $this->createForm('position', $position, 
      array(
        'action' => $this->generateUrl("position_new"),
        'method' => "POST",
      )
    );

    //Overwrite the form with the request data (if available)
    $form->handleRequest($request);

    //If the form is appropriately
    if ($form->isValid()){
      $em = $this->getDoctrine()->getManager();
      $em->persist($form->getData());
      $em->flush();

      return $this->redirect($this->generateUrl('position_index'));
    }

    return $this->render('IbswebPersonnelBundle:Position:new.html.twig',
      array(
        'form' => $form->createView(),
      )
    );
  }

  /**
   * @Route("/position/{id}", name="position_update")
   */
  public function updateAction(Request $request, $id){
    $position = $this->getDoctrine()
      ->getRepository("IbswebPersonnelBundle:Position")
      ->find($id);
    $form = $this->createForm('position', $position);

    $form->handleRequest($request);

    if ($form->isValid()){
      $em = $this->getDoctrine()->getManager();
      $em->persist($form->getData());
      $em->flush();

      return $this->redirect($this->generateUrl('position_index'));
    }

    return $this->render('IbswebPersonnelBundle:Position:new.html.twig',
      array(
        'form' => $form->createView(),
      )
    );
  }
    /**
   * @Route("/position/{id}", name="position_delete")
   * @Method("DELETE")
   */
  public function deleteAction(Request $request){
    $position = $this->getDoctrine()
      ->getRepository("IbswebPersonnelBundle:Position")
      ->find($id);
    
    $em = $this->getDoctrine()->getManager();
    $em->remove($position);
    $em->flush();

    return $this->redirect($this->generateUrl('position_index'));
    
  }



  // /**
  //  * @Route("/position/new", name="position_new")
  //  * @Method("POST")
  //  */
  // public function createAction(Request $request){


  //   $form->handleRequest($request);

  //   return $this->render('position/index.html.twig', 
  //     array(
  //       'products' => $products,
  //     )
  //   );
  // }
}