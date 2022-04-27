
<?php
require_once(dirname(__FILE__) . '/../utils/database.php');


class Appointment
{
    private int $_id;
    private string $_dateHour;
    private string $_idPatients;
    private object $_pdo;
    // private $_pdo;


    public function __construct(string $dateHour = '', $idPatients = '')
    {
        $this->setDateHour($dateHour);
        $this->setIdPatients($idPatients);
        $this->_pdo = Database::dbConnect();
    }

    public function getId(): int
    {
        return $this->_id;
    }
    public function getDateHour(): string
    {
        return $this->_dateHour;
    }
    public function getIdPatients(): string
    {
        return $this->_idPatients;
    }

    public function setId(int $id): void
    {
        $this->_id = $id;
    }
    public function setDateHour(string $dateHour): void
    {
        $this->_dateHour = $dateHour;
    }
    public function setIdPatients(string $idPatients): void
    {
        $this->_idPatients = $idPatients;
    }

    public function addAppointment(): bool
    {
        try {
            //insérer une requetes sql   
            $sth = $this->_pdo->prepare( //->query va exécuter la requete // nous on veux préparer la requéte en vue de lui affecter des valeurs derrrieres     
                'INSERT INTO `appointments`(`dateHour`,`idPatients`) 
                VALUES (:dateHour,:idPatients);'
            );

            $sth->bindValue(':dateHour', $this->getDateHour(), PDO::PARAM_STR); // méthode pdo statement 
            //methode query (juste recuperer de la donnée) qui retourne un objet de type pdo statment =appeler $sth (qui permet d'accéder à des methodes pdo statment)
            //:lastname= marqueur nomminatif avec ces marqueurs = on prepare,on binValue et on execute
            $sth->bindValue(':idPatients', $this->getIdPatients(), PDO::PARAM_INT);
            //shift alt fléche bas pr dupliquer

            //pas besoin de paramétre; requete sera exécuter à ce moment là
            return $sth->execute(); // retourne excécution de cette requete et va retoirner true ou false

        } catch (PDOException $e) {
            return false;
        }
    }


    public static function listAppointment(): array
    {
        $sql = "SELECT
        `appointments`.`id` AS `idAppointment`,
                `appointments`.`dateHour` AS `dateHour`,
                `patients`.`lastname` AS `lastname`,
                `patients`.`id` AS `id`,
                `patients`.`firstname` AS `firstname` 
                FROM `appointments`
                JOIN `patients`
                ON `patients`.`id` = `appointments`.`idPatients`;";


        try {

            $sth = Database::dbConnect()->query($sql);
            if (!$sth) {
                throw new PDOException();
            }

            return $sth->fetchAll();
        } catch (PDOException $exception) {
            return [];
        }
    }
    //-------------------------Function is Exist "gére les doublons"----------------------------//
    public static function isExist(string $dateHour): bool
    {
        try {
            $sql =
                'SELECT `dateHour`
                FROM `appointments`
                WHERE `dateHour` = :dateHour';
            $sth = Database::dbConnect()->prepare($sql);
            $sth->bindValue(':dateHour', $dateHour, PDO::PARAM_STR);
            $sth->execute();

            if (empty($sth->fetchAll())) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    //------------------------Function Affiche profil Rendez-vous------------------------//

    public static function getOneById(int $id): object
    {
        $sql = "SELECT
                `appointments`.`id` AS `idAppointment`,
                `appointments`.`dateHour` AS `dateHour`,
                `patients`.`lastname` AS `lastname`,
                `patients`.`id` AS `id`,
                `patients`.`firstname` AS `firstname` 
                FROM `appointments`
                JOIN `patients`
                ON `patients`.`id` = `appointments`.`idPatients`
                WHERE `appointments`.`id` = :id;";
        try {
            $sth = Database::dbConnect()->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $verif = $sth->execute();//retourne un bool

            if (!$verif) {
                throw new PDOException();
            } else {
                $appointment = $sth->fetch();
            }
            if (!$appointment) {
                throw new PDOException('rdz-vs non trouvé');
            }
            return $appointment;
        } catch (PDOException $exception) {
            return $exception;
        }
    }

    //----------------------------Function pour Modifier un rendez-vous----------------------//

    public function modifAppointment($id): bool
    {
        $sql = 'UPDATE  `appointments` 
        SET `dateHour`= :dateHour,
            `idPatients` = :idPatients
        WHERE `id` = :id;';

        try {
            $sth = $this->_pdo->prepare($sql);

            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->bindValue(':idPatients', $this->getIdPatients(), PDO::PARAM_INT);
            $sth->bindValue(':dateHour', $this->getDateHour(), PDO::PARAM_STR);


            return $sth->execute();
        } catch (PDOException $e) {
            return false;

        }
    }
    public function getAllApptById(): array
    {
        $sql = "SELECT `id` , `dateHour` ,`idPatients` 
            FROM `appointments`
            WHERE`idPatients`= :idPatients;";

        try {

            $sth = $this->_pdo->prepare($sql);
            $sth->bindValue(':idPatients',$this->_idPatients ,PDO::PARAM_INT);

            if ($sth->execute() ){
            return  $sth->fetchAll();
            }
            
            } catch (PDOException $e) {
            return ['error'];
        }
    }
    
        public static function deleteAppt($idAppointment):bool
        {
            $sql= "DELETE 
                FROM `appointments`
                WHERE `id`=:id;";
    
            try{
                $sth= Database::dbConnect()->prepare($sql);
                $sth->bindValue(':id',$idAppointment, PDO::PARAM_INT); 
                return $sth ->execute();
            } catch (PDOException $e) {
                    return $e;
                }
            }

}
    