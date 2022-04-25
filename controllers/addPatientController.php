<?php
//depuis controllers comment je fais pr trouver mon fichier regex?
require_once(dirname(__FILE__).'/../config/regex.php');
//on appelle le modele 
require_once(dirname(__FILE__).'/../models/Patient.php');


$stylesheet='addPatient.css';
$title='Ajouter un nouveau patient';
 //initialise un tableau d'erreur
$error=[];


if($_SERVER['REQUEST_METHOD']=='POST'){ 
    
     //-si formuliare envoyé en post on va faire des choses 

     //-- verifier lastname -- //recupérer lastname et on nettoie
    $lastname= filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);//full posait des problémes sur les accent
    if(empty($lastname)){
        $error['lastname']= 'Veuillez saisir votre nom de famille.';
    } else {
        $checkLastname= filter_var (
            $lastname,
            FILTER_VALIDATE_REGEXP,
            array("options" =>array("regexp" => '/'.REGEX_NAME.'/'))
        );
        if($checkLastname === false){
            $error['lastname']= 'Veuillez saisir un nom de famille valide .';
        }
    }
    

     //-- verifier firstname --
    $firstname= filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
    if(empty($firstname)){
        $error['firstname']= 'Veuillez saisir votre prénom .';
    } else {
        $checkedFirstname= filter_var (
            $firstname,
            FILTER_VALIDATE_REGEXP,
            array("options" =>array("regexp" => '/'.REGEX_NAME.'/'))
        );
        if($checkedFirstname === false){
            $error['firstname']= 'Veuillez saisir un prénom valide .';
        }
    }



    //-- verif de la date de naissance --
    $birthdate= filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_NUMBER_INT);//sur une date de naissance car auto +-
    if(empty($birthdate)){
        $error['birthdate']= 'Veuillez saisir votre date de naissance.';
    } else {
        $checkBirthdate= filter_var (
            $birthdate,
            FILTER_VALIDATE_REGEXP,
            array("options" =>array("regexp" =>'/' .REGEX_DATE.'/' ))//regex on peux en laisser coté back 
        );
        if($checkBirthdate === false){
            $error['birthdate']= 'Veuillez saisir une date de naissance valide .';
        }
    }

    //--verifier phone --
    $phone= filter_input(INPUT_POST,'phone',FILTER_SANITIZE_NUMBER_INT);//-+ chiffre
    if(!empty($phone))//pas de else car pas obligatoire en front qd pas"required"{
        $checkPhone= filter_var(
            $phone,
            FILTER_VALIDATE_REGEXP,
            array("options"=>array("regexp"=> '/' .REGEX_PHONE.'/' ))
        );
        if($checkPhone=== false){
            $error['phone']= 'Veuillez saisir un numéro de téléphone valide.';
        }

    
    $mail= trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));//trim retirer les espaces

    if(empty($mail)){//si variable mail est valide on va stocker ds tableau d'error à la clé mail mail=veuiillez remplir le champ
        $error['mail']=" Veuillez renseigner votre email.";
    }else{
        $checkMail= filter_var($mail,FILTER_VALIDATE_EMAIL);
    }

    if ($checktMail===false){
        $error['mail']= 'Veuillez saisir un mail valide';  
    }

    if (Patient::isExist($mail)) {
        $error['mail']= 'L\'adresse mail existe déjà.';    
    }

//-si pas erreur alors on enregistre en base car nettoyer et envoyer en post
    if(empty($error)){

        $patient=new Patient($lastname,$firstname,$birthdate,$phone,$mail);//hydrater notre objet

        //apres avoir hydrater le patient on execute la méthode 
    //si bien ajouter en base de donnée je lui indique le message auqual j'ajoute une classe pr s'affichde tel ou tel couleur
        $addedPatient= $patient->add();

        if ($addedPatient=== false){
            $error['addPatient']="Les données n'ont pas été envoyées en base de donnée";
            $className['addPatient']='error';
        }else{

            $error['addPatient']=" Les données sont envoyées avec succés dans la base de donnée";
            $className['addPatient']='sucess';
        }
    }
}


 //-Appel de la page "Accueil"
include(dirname(__FILE__).'/../views/templates/header.php');
//-ligne qui se relie à la views associée //
include(dirname(__FILE__).'/../views/addPatient.php');
include(dirname(__FILE__).'/../views/templates/footer.php');

