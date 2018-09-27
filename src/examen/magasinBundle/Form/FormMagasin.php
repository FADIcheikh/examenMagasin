<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace examen\magasinBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FormMagasin extends AbstractType {
   
    
    
    function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('libelle')->add('dateajout')->add('quantite')->add('prixlot')->add('Envoyer','submit');
       
    }


    
    
    
    
    public function getName() {
       return 'magasin';
    }

//put your code here
}