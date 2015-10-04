<?php include_once("initialize.php");
session_start();

class memberobject {
	
	private $fname;
  private $lname;
  private $class;
  private $numindex;
	
  function __construct($numindex=100000) {
    global $database;
    $sql = "SELECT * FROM memblist WHERE numindex='".$database->escape_value($numindex)."'";
    $result_set = $database->query($sql);
    if ($database->num_rows($result_set)<1) {
      $this->fname = "";
      $this->lname = "";
      $this->class = "";
      $this->numindex = "";
    } else {
      $user = $database->fetch_array($result_set);
      $this->fname = $user['fname'];
      $this->lname = $user['lname'];
      $this->class = $user['class'];
      $this->numindex = $user['numindex'];
    }
  }

  function login_check($info){
    global $database;
    $fname = $database->escape_value($info['fname']);
    $lname = $database->escape_value($info['lname']);
    $class = $database->escape_value($info['class']);
    $sql = "SELECT * FROM memblist WHERE fname='".$fname."' AND lname='".$lname."' AND class='".$class."'";
    $result_set = $database->query($sql);
    $user = $database->fetch_array($result_set);
    if ($user['numindex']=="") {
      $_SESSION['tryagain'] = "<br/>What you entered does not correspond to any records in our database. Please try again. <br/><br/>";
      return false;
    } else {
        $this->fname = $user['fname'];
        $this->lname = $user['lname'];
        $this->class = $user['class'];
        $this->numindex = $user['numindex'];
        $_SESSION['whatmember'] = $this->numindex;
        unset($_SESSION['tryagain']); 
    }
    return true;
  }

  function add_hours(){
    ?>
    <form action="memberin.php" method="POST">

        <div class="row">
          <div class="small-4 columns">
            <strong>ADD HOURS</strong>
            <label>Date:</label>
            
          </div>

          <div class="small-4 columns">
            <label>Last Name:</label>
            <input type="text" name="lname"/>
          </div>

          <div class="small-4 columns">
            <label>Class Year:</label>
            <input type="text" name="class"/>
          </div>
        </div>
        <div class="row">
          <div class="small-12 columns">
                <input type="submit" value="submit" class="button tiny radius"/>
          </div>
        </div>
          </form>
    <?
  }

  function update($info){
    global $database;
    $numindex = 1;
    $this->fpage = $database->escape_value($info['frontcontent']);
    $sql = "UPDATE frontpage SET ";
    $sql .= "whatsay='". $this->fpage ."' ";
    $sql .= "WHERE numindex='".$numindex."'";
      $database->query($sql);
  }
}


?>