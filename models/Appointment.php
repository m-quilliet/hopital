
<?php
require_once(dirname(__FILE__).'/../utils/database.php');


class Appointment{
    protected string $_dateHour;
    protected int $_idPatients;


    public function __construct($dateHour,$idPatients){
        $this-> setdateHour($dateHour);
        $this-> setidPatients;
    }


    public function getdateHour():string {
            return $this->_dateHour;
    }
    public function getidPatients():int {
                return $this->_idPatients;
    }



    public function setdateHour():string {
        return $this->_dateHour;
    }
    public function setidPatients():string{
        return $this->_idPatients;
    }

    // public function addAppointement(){
    //     try {
    //         //insérer une requetes sql   
    //         $sth = $this->_pdo->prepare( //->query va exécuter la requete // nous on veux préparer la requéte en vue de lui affecter des valeurs derrrieres     
    //             "INSERT INTO `appointment`(`dateHour`,`idPatients`) 
    //             VALUES (:datehour,:idPatients)
    //             INNER JOIN `patient``
    //             ON `patient`.'id'= `appoitment`.'idPatients'
    //             "
    //         );

    //         $sth->bindValue(':dateHour', $this->getDateHour(), PDO::PARAM_STR); // méthode pdo statement 
    //         //methode query (juste recuperer de la donnée) qui retourne un objet de type pdo statment =appeler $sth (qui permet d'accéder à des methodes pdo statment)
    //         //:lastname= marqueur nomminatif avec ces marqueurs = on prepare,on binValue et on execute
    //         $sth->bindValue(':idPatients', $this->getIdPatients(), PDO::PARAM_STR);
    //          //shift alt fléche bas pr dupliquer

    //         //pas besoin de paramétre; requete sera exécuter à ce moment là
    //         return $sth->execute(); // retourne excécution de cette requete et va retoirner true ou false

    //     } catch (PDOException $e) {
    //         return false;
    //     }
    // }
}
