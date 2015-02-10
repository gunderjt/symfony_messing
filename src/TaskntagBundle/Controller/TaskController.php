<?php
namespace TaskntagBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use TaskntagBundle\Entity\Task;
use TaskntagBundle\Entity\Tag;
use TaskntagBundle\Form\Type\TaskType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TaskController extends Controller
{
  /**
   * @Route("/task", name="task_index")
   */
  public function indexAction(){
    //$positions = [];
    $tasks = $this->getDoctrine()
      ->getRepository("TaskntagBundle:Task")
      ->findAll();

    return $this->render('TaskntagBundle:Task:index.html.twig', 
      array(
        'tasks' => $tasks,
      )
    );
  }

  /**
   * @Route("/task/new", name="task_new")
   */
  public function newAction(Request $request)
  {
    $task = new Task();

    // dummy code - this is here just so that the Task has some tags
    // otherwise, this isn't an interesting example
    // $tag1 = new Tag();
    // $tag1->name = 'tag1';
    // $task->getTags()->add($tag1);
    // $tag2 = new Tag();
    // $tag2->name = 'tag2';
    // $task->getTags()->add($tag2);
    // end dummy code

    $form = $this->createForm(new TaskType(), $task);

    $form->handleRequest($request);

    if ($form->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($form->getData());
      $em->flush();

      return $this->redirect($this->generateUrl('task_index'));
    }

    return $this->render('TaskntagBundle:Task:new.html.twig', array(
      'form' => $form->createView(),
    ));
  }

  /**
   * @Route("/task/{id}/edit", name="task_edit")
   */
  public function editAction(Request $request, $id)
  {
    $task = $this->getDoctrine()
      ->getRepository("TaskntagBundle:Task")
      ->find($id);

    if(!$task){
      return $this->redirect($this->generateUrl('task_index'));
    }
    $form = $this->createForm(new TaskType(), $task);

    if ($form->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($form->getData());
      $em->flush();

      return $this->redirect($this->generateUrl('task_index'));
    }
    return $this->render('TaskntagBundle:Task:new.html.twig', array(
      'form' => $form->createView(),
    ));
  }
}