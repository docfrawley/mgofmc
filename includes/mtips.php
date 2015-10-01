<?php include_once("initialize.php");
session_start();

class mtipsgroup {
	
	private $whatdo;
	private $whatwatch;
	private $month;
	
  function __construct($themonth) {
	$this->whatdo = array();
	$this->whatwatch = array();
	$this->month = $themonth;
  }

  function set_array($dw){
  	global $database;
  	if ($dw=='d'){$this->whatdo = array();}
  	else {$this->whatwatch = array();}
  	$sql = "SELECT * FROM DoWatch WHERE month='".$this->month."' AND dorw='".$dw."'";
  	$result_set = $database->query($sql);
  	while ($value = $database->fetch_array($result_set)) {
  			if ($dw=='d') {array_push($this->whatdo, $value['thetext']);}
  			else {array_push($this->whatwatch, $value['thetext']);}
		}

  }

  function print_array($dw){
  	$this->set_array($dw);
  	if ($dw=='d'){print_r($this->whatdo);}
  	else {print_r($this->whatwatch);}
  }
}


?>