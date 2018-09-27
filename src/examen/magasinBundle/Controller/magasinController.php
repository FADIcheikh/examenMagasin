<?php

namespace examen\magasinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use examen\magasinBundle\Form\FormMagasin;

class magasinController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('magasinBundle:Default:index.html.twig', array('name' => $name));
    }
      public function affichermagasinAction() {
 $em=$this->getDoctrine()->getManager();
 $magasin=$em->getRepository("magasinBundle:lot")->findAll();
   return $this->render('magasinBundle:magasin:affichage.html.twig',array('magasin'=> $magasin));
        
    }
    

    
    public function modifierAction($id)
    {
             
           $em=$this->getDoctrine()->getManager();
           $magasin=$em->getRepository('magasinBundle:lot')->find($id);
           $form=$this->createForm(new FormMagasin() ,$magasin);
           $requete=$this->get('request');
           if($requete->getMethod()=='POST'){
              $form->bind($requete);
                  if($form->isValid()){
                     
                      $em->persist($magasin);
                      $em->flush();
                 return $this->redirect($this->generateUrl("magasin_affichage"));
            }
        }
        return $this->render("magasinBundle:magasin:modifier.html.twig",array('form'=>$form->createView(),'magasin'=>$magasin));
         
     }
    
     public function supprimermagasinAction($id)
    {
       
        $em = $this->getDoctrine()->getManager();
        $lot = $em->getRepository("magasinBundle:lot")->find($id);
        $em->remove($lot);
        $em->flush();
        return $this->redirect($this->generateUrl("magasin_affichage"));
    

    }
    
    
    
     
    public function recherchermagasinAction()
    {
         
         
         $em=$this->getDoctrine()->getManager();
         $req=$this->get('request');
         $magasin=$em->getRepository('magasinBundle:lot')->findAll();
         if ($req->getMethod()=='POST') {
             $libelle=$req->get('libelle');//name de l'input à partir du formulaire
             $magasin=$em->getRepository('magasinBundle:lot')->findBylibelle($libelle);
             
         }
           return $this->render('magasinBundle:magasin:recherche.html.twig',array('magasin'=> $magasin));
     }
    
     
     
      public function  ajouterpromotionAction($id)
    {
          
          $em=$this->getDoctrine()->getManager();
         $req=$this->get('request');
         $magasin=$em->getRepository('magasinBundle:lot')->find($id);
         
         if ($req->getMethod()=='POST') {
             $promo=$req->get('promotion');
        $query=$this->getDoctrine()->getManager()->createQuery('UPDATE magasinBundle:lot l SET  l.promotion = :nvpromo where l.id=:idLot');
    $query->setParameter('nvpromo',$promo);
    $query->setParameter('idLot',$id);
    $query->execute();
         }
    return $this->render('magasinBundle:magasin:promo.html.twig',array('magasin'=> $magasin));

    }
    
    
      
    
    public function calculerAction($id){
         $em=$this->getDoctrine()->getManager();
         $magasin=$em->getRepository('magasinBundle:lot')->find($id);
         $prixlot=$magasin->getPrixlot();
         $promotion=$magasin->getPromotion();
         $quantite=$magasin->getQuantite();
         $prixUnitaire=($prixlot-($prixlot*$promotion/100)/$quantite);
         $libelle=$magasin->getLibelle();
         return $this->render("magasinBundle:magasin:caluler.html.twig",array('libelle'=>$libelle,'prixUnitaire'=>$prixUnitaire));
     }
}
