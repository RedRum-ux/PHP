<?php
    class Player{
         private $name;
         private $city ;
         function __construct($name, $city =""){
            $this->name = $name;
            $this->city = $city;
        }
         public function setCity($City){
              return new Player($this->name,$City);
            }
        public function Print(){
            echo $this->name." ".$this-> city." ";
        }
        }
?>