<?php

namespace Ibsweb\PersonnelBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ibsweb\PersonnelBundle\Entity\EmploymentRecord;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Ibsweb\PersonnelBundle\Form\Type\EmploymentRecordType;

class EmploymentRecordController extends Controller{
  /**
   * @Route("/employment_record", name="employment_record_index")
   */
  public function indexAction(){
    //$positions = [];
    $employment_records = $this->getDoctrine()
      ->getRepository("IbswebPersonnelBundle:EmploymentRecord")
      ->findAll();

    return $this->render('IbswebPersonnelBundle:EmploymentRecord:index.html.twig', 
      array(
        'employment_records' => $employment_records,
      )
    );
  }

  /**
   * @Route("/employment_record/new", name="employment_record_new")
   */
  public function newAction(Request $request){
    //$positions = [];
    $employment_record = new EmploymentRecord();
    $form = $this->createForm('employment_record', $employment_record, 
      array(
        'action' => $this->generateUrl("employment_record_new"),
        'method' => "POST",
      )
    );
    $form->handleRequest($request);

    if ($form->isValid()){
      //$er = $form->getData();
      $em = $this->getDoctrine()->getManager();
      $em->persist($form->getData());
      $em->flush();

      return $this->redirect($this->generateUrl('employment_record_index'));
    }

    return $this->render('IbswebPersonnelBundle:EmploymentRecord:new.html.twig',
      array(
        'form' => $form->createView(),
      )
    );
  }
}