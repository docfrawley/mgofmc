<?php include_once("initialize.php");
session_start();

class mtipsgroup {
	
	private $whatdo;
	private $whatwatch;
	private $month;
  private $picarray;
	
  function __construct($themonth) {
	 global $database;
   $this->whatdo = array();
	 $this->whatwatch = array();
	 $this->month = $themonth;
   $this->picarray = array();
   $sql = "SELECT * FROM DoWatch WHERE month='".$themonth."'";
    $result_set = $database->query($sql);
    while ($value = $database->fetch_array($result_set)) {
        if ($value['pname'] != '') {array_push($this->picarray, $value['pname']);}
    }
  }

  function set_array($dw){
  	global $database;
  	if ($dw=='d'){$this->whatdo = array();}
  	else {$this->whatwatch = array();}
  	$sql = "SELECT * FROM DoWatch WHERE month='".$this->month."' AND dorw='".$dw."'";
  	$result_set = $database->query($sql);
  	while ($value = $database->fetch_array($result_set)) {
        $newtip = new mtipobject($value['numindex']);
  			if ($dw=='d') {array_push($this->whatdo, $newtip);}
  			else {array_push($this->whatwatch, $newtip);}
		}

  }

  function print_array($dw){
  	$this->set_array($dw);
    $temp_array=($dw=='d') ? $this->whatdo : $this->whatwatch ;
    echo "<ul>";
  	foreach ($temp_array as $value) {
      echo "<li>{$value->get_tip()}</li>";
    }
    echo "</ul>";
  }

  function generate_boxes(){
    foreach ($this->picarray as $value) {
      ?>
        <div id="<? echo $value; ?>" class="reveal-modal" data-reveal>
          <img src="img/<? echo $value; ?>.jpg">
          <a class="close-reveal-modal">&#215;</a>
        </div>
      <?
    }
  }
}


?>