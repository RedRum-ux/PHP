<?php
    require_once "player.php";

    class Tournament{
        private $name;
        private $date_start;
        private $players = array();

        function __construct($name, $date_start = " "){
            if($date_start==" ")
            $date_start =date('Y-m-d', time());
            $this->date_start = $date_start; 
            $this->name = $name;
        }

        public function addPlayer(Player $Player){
            $this->players[count($this->players)] = $Player;
            return $this;
        }

        public function createPairs(){
            if(count($this->players) % 2 !== 0)
            {
                array_push($this->players, "slip");
                $count = count($this->players);
                $row2 = array_splice($this->players, ($count / 2)); 
                $row1 = $this->players;  
                $row2 = array_reverse($row2); 
                for ($i = 1; $i < $count; $i++) { 
                    echo $this->name,", ", $this->date_start."<br/>";
                    $this->date_start = str_replace('.', '-', $this->date_start);
                    $this->date_start = date("Y-m-d", strtotime($this->date_start.'+ 1 days'));
                    if ($i == 1) {   
                        for ($j = 0; $j < $count / 2; $j++) {  
                            if ($row1[$j] !== "slip" && $row2[$j] !== "slip") {
                                echo $row1[$j]->Print();
                                echo "-";
                                $row2[$j]->Print();
                                echo'<br />';
                               }
                            else continue;   
                        }
                    } 
                    else 
                    { 
                         array_push($row2, array_pop($row1));  
                         $first = array_shift($row1);  
                         array_unshift($row1, array_shift($row2)); 
                         array_unshift($row1, $first);
                         for ($j = 0; $j < $count / 2; $j++)
                         if ($row1[$j] !== "slip" && $row2[$j] !== "slip"){
                            echo $row1[$j]->Print();
                            echo "-";
                            $row2[$j]->Print();
                            echo'<br />';
                        }
                         else continue;
                    }
                }
            } 
            else
            {
                $count = count($this->players);
                $row2 = array_splice($this->players, ($count / 2));  
                $row1 = $this->players; 
                $row2 = array_reverse($row2);
                for ($i = 1; $i < $count; $i++) {
                    echo $this->name,", ", $this->date_start."<br/>";
                    $this->date_start = str_replace('.', '-', $this->date_start);
                    $this->date_start = date("Y-m-d", strtotime($this->date_start.'+ 1 days'));
                    array_push($row2, array_pop($row1));  
                    $first = array_shift($row1); 
                  array_unshift($row1, array_shift($row2));  
                  array_unshift($row1, $first); 
                    for ($j = 0; $j < $count/2; $j++){  
                         echo $row1[$j]->Print();
                         echo "-";
                         $row2[$j]->Print();
                         echo'<br />';
                        }
                    }
                }
            }
        }
?>