<?php

namespace Ibsweb\PersonnelBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ibsweb\PersonnelBundle\Entity\Affiliation;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Ibsweb\PersonnelBundle\Form\Type\AffiliationType;

class AffiliationController extends Controller{
  /**
   * @Route("/affiliation", name="affiliation_index")
   */
  public function indexAction(){
    //$affiliations = [];
    $affiliations = $this->getDoctrine()
      ->getRepository("IbswebPersonnelBundle:Affiliation")
      ->findAll();

    return $this->render('IbswebPersonnelBundle:Affiliation:index.html.twig', 
      array(
        'affiliations' => $affiliations,
      )
    );
  }

  /**
   * @Route("/affiliation/new", name="affiliation_new")
   */
  public function newAction(Request $request){
    $affiliation = new Affiliation();
    $form = $this->createForm('affiliation', $affiliation, 
      array(
        'action' => $this->generateUrl("affiliation_new"),
        'method' => "POST",
      )
    );

    $form->handleRequest($request);

    if ($form->isValid()){
      $em = $this->getDoctrine()->getManager();
      $em->persist($form->getData());
      $em->flush();

      return $this->redirect($this->generateUrl('affiliation_index'));
    }

    return $this->render('IbswebPersonnelBundle:Affiliation:new.html.twig',
      array(
        'form' => $form->createView(),
      )
    );
  }

  /**
   * @Route("/affiliation/{id}", name="affiliation_update")
   */
  public function updateAction(Request $request, $id){
    $affiliation = $this->getDoctrine()
      ->getRepository("IbswebPersonnelBundle:Affiliation")
      ->find($id);
    $form = $this->createForm('affiliation', $affiliation);

    $form->handleRequest($request);

    if ($form->isValid()){
      $em = $this->getDoctrine()->getManager();
      $em->persist($form->getData());
      $em->flush();

      return $this->redirect($this->generateUrl('affiliation_index'));
    }

    return $this->render('IbswebPersonnelBundle:Affiliation:new.html.twig',
      array(
        'form' => $form->createView(),
      )
    );
  }
    /**
   * @Route("/affiliation/{id}", name="affiliation_delete")
   * @Method("DELETE")
   */
  public function deleteAction(Request $request){
    $affiliation = $this->getDoctrine()
      ->getRepository("IbswebPersonnelBundle:Affiliation")
      ->find($id);
    
    $em = $this->getDoctrine()->getManager();
    $em->remove($affiliation);
    $em->flush();

    return $this->redirect($this->generateUrl('affiliation_index'));
    
  }



  // /**
  //  * @Route("/affiliation/new", name="affiliation_new")
  //  * @Method("POST")
  //  */
  // public function createAction(Request $request){


  //   $form->handleRequest($request);

  //   return $this->render('affiliation/index.html.twig', 
  //     array(
  //       'products' => $products,
  //     )
  //   );
  // }
}