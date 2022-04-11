<?php
require_once(dirname(__FILE__).'/../config/regex.php');

$stylesheet='ajoutPatient.css';
$error=[];

if($_SERVER['REQUEST_METHOD']=='POST'){
    if($_SERVER['REQUEST_METHOD']== 'POST'){

        //-- verifier lastname --
        $lastname= filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if(empty($lastname)){
                $error['lastname']= 'Veuillez saisir votre nom de famille.';
            } else {
                $checkedLastname= filter_var (
                    $lastname,
                    FILTER_VALIDATE_REGEXP,
                    array("options" =>array("regexp" => '/'.REGEX_NAME.'/'))
                );
                if($checkedLastname === false){
                    $error['lastname']= 'Veuillez saisir un nom de famille valide .';
                }
            }

        //-- verifier firstname --
        $firstname= filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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
        $date= filter_input(INPUT_POST, 'date', FILTER_SANITIZE_NUMBER_INT);
        if(empty($date)){
            $error['date']= 'Veuillez saisir une date .';
        } else {
            $checkdate= filter_var (
                $date,
                FILTER_VALIDATE_REGEXP,
                array("options" =>array("regexp" =>'/' .REGEX_DOB.'/' ))
            );
            if($checkdate === false){
                $error['date']= 'Veuillez saisir une date valide .';
            }
        }

        //--verifier phone --
        $phone= filter_input(INPUT_POST,'phone',FILTER_SANITIZE_NUMBER_INT);
        $checkphonee= filter_var(
            $phone,
            FILTER_VALIDATE_REGEXP,
            array("options"=>array("regexp"=> "/^[0-9]{10}/"))
        );
        if($checkphone== false){
            $error['phone']= 'Veuillez saisir un numéro de téléphone valide.';
        } 
    
        $email= trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        if(empty($email)){
            $error['email']= ' Veuillez saisir votre email .';
        }else{
            $checkedEmail= filter_var (
                $email,
                FILTER_VALIDATE_EMAIL,
            );
                if($checkedEmail=== false){
                $error['email']= 'Veuillez saisir un email valide .';
                }


        }
    }
}

 // Appel de la page "Accueil"
include(dirname(__FILE__).'/../views/templates/header.php');
// ligne qui se relie à la views associée //
include(dirname(__FILE__).'/../views/ajoutPatient.php');
include(dirname(__FILE__).'/../views/templates/footer.php');
?>
