<?php include_once("initialize.php");
session_start();

class mtipobject {
	
	private $thetip;
	private $do_or_watch;
	private $month;
  private $besttime;
  private $pname;
	
  function __construct($numindex) {
  	global $database;
    $sql = "SELECT * FROM DoWatch WHERE numindex='".$numindex."'";
    $result_set = $database->query($sql);
    $value = $database->fetch_array($result_set);
    $this->thetip = $value['thetext'];
    $this->do_or_watch = $value['dorw'];
    $this->month = $value['month'];
    $this->besttime = $value['isbest'];
    $this->pname = $value['pname'];
  }

  function get_tip(){
    return $this->thetip;
  }

  function get_pname(){
    return $this->pname;
  }
}


?>