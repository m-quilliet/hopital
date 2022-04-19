
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
}