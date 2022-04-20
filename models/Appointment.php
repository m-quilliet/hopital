
<?php
require_once(dirname(__FILE__) . '/../utils/database.php');


class Appointment
{
    private string $_dateHour;
    private string $_idPatients;
    // private $_pdo;


    public function __construct(string $dateHour= '', $idPatients='')
    {
        $this->setDateHour($dateHour);
        $this->setIdPatients($idPatients);
        $this->_pdo = Database::dbConnect();
    }


    public function getDateHour(): string
    {
        return $this->_dateHour;
    }
    public function getIdPatients(): string
    {
        return $this->_idPatients;
    }


    public function setDateHour(string $dateHour):void
    {
        $this->_dateHour = $dateHour;
    }
    public function setIdPatients(string $idPatients):void
    {
        $this->_idPatients = $idPatients;
    }

    public function addAppointment(): bool
    {
        try {
            //insérer une requetes sql   
            $sth = $this->_pdo->prepare( //->query va exécuter la requete // nous on veux préparer la requéte en vue de lui affecter des valeurs derrrieres     
                'INSERT INTO `appointments`(`dateHour`,`idPatients`) 
                VALUES (:dateHour,:idPatients);
                '
            );

            $sth->bindValue(':dateHour', $this->getDateHour(), PDO::PARAM_STR); // méthode pdo statement 
            //methode query (juste recuperer de la donnée) qui retourne un objet de type pdo statment =appeler $sth (qui permet d'accéder à des methodes pdo statment)
            //:lastname= marqueur nomminatif avec ces marqueurs = on prepare,on binValue et on execute
            $sth->bindValue(':idPatients', $this->getIdPatients(), PDO::PARAM_INT);
            //shift alt fléche bas pr dupliquer

            //pas besoin de paramétre; requete sera exécuter à ce moment là
            return $sth->execute(); // retourne excécution de cette requete et va retoirner true ou false

        } catch (PDOException $e) {
            echo $e-> getMessage();
            die;
            // return false;
        }
    }
}
