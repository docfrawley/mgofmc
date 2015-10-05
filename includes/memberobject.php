<?php include_once("initialize.php");
session_start();

class memberobject {
	
	private $fname;
  private $lname;
  private $class;
  private $numindex;
  private $hrsarray;
	
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
    $this->hrsarray = array();
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

  function full_name(){
    return $this->fname.' '.$this->lname;
  }

  function set_hrsarray($year){
    global $database;
    $this->hrsarray = array();
    $sql = "SELECT * FROM mghours WHERE numindex='".$this->numindex."' ORDER BY datehrs";
    $result_set = $database->query($sql);
    while ($value = $database->fetch_array($result_set)) {
        if ($year == date('Y', $value['datehrs'])){
          array_push($this->hrsarray, $value);
        }
      }
  }

  function get_totals($whichhrs='all', $whichmonth='all'){
    $this->set_hrsarray(date('Y'));
    $temparray = array();
    if ($whichmonth != 'all') {
      foreach ($this->hrsarray as $value){
        if (date('F', $value['datehrs'])==$whichmonth){
          array_push($temparray, $value);
        }
      } 
    } else {
        $temparray = $this->hrsarray;
    }
    $total = 0;
    foreach ($temparray as $value){
        if ($value['typehrs']==$whichhrs){
          $total += $value['numhrs'];
        } elseif ($whichhrs=='all') {
          $total += $value['numhrs'];
        }
      } 
    return $total;
  }

  function list_totals(){
    ?>
    <table><tr>
      <td><? echo $this->full_name(); ?></td>
      <td><? echo "Total Helpline Hours: ".$this->get_totals('helpline', 'all'); ?></td>
      <td><? echo "Total Mercer County Hours: ".$this->get_totals('mercer', 'all'); ?></td>
      <td><? echo "Total Continuing Ed Hours: ".$this->get_totals('conted', 'all'); ?></td>
      <td><? echo "Total Overall Hours: ".$this->get_totals('all', 'all'); ?></td>
    </tr></table>
    <?
  }

  function month_totals($month){
    ?>
    <table><tr>
      <td><? echo $month; ?></td>
      <td><? echo "Total Helpline Hours: ".$this->get_totals('helpline', $month); ?></td>
      <td><? echo "Total Mercer County Hours: ".$this->get_totals('mercer', $month); ?></td>
      <td><? echo "Total Continuing Ed Hours: ".$this->get_totals('conted', $month); ?></td>
      <td><? echo "Total Overall Hours: ".$this->get_totals('all', $month); ?></td>
    </tr></table>
    <?
  }

  function list_hrs(){
    $this->set_hrsarray(date('Y'));
    $month = strtotime('2013-01-01');
    ?> <ul class="accordion" data-accordion> <?
    for ($i = 1; $i <= 12; $i++){
      $month_name = date('F', $month);
      $month = strtotime('+1 month', $month);
      ?>
      <li class="accordion-navigation">
        <a href="<? echo '#'.$month_name; ?>"><? $this->month_totals($month_name); ?></a>
        <div id="<? echo $month_name; ?>" class="content">
          <ul>
            <?
              foreach ($this->hrsarray as $value) {
                if (date('F', $value['datehrs'])==$month_name) {
                  ?>
                  <li>
                    <table><tr>
                      <td><? echo date('j/n/y', $value['datehrs']); ?></td>
                      <td><? echo $value['typehrs']; ?></td>
                      <td><? echo $value['numhrs']; ?></td>
                    </tr></table>
                  </li>
                <?
                } 
              }
            ?>
          </ul>
        </div>
      </li>
      <?
    }
    ?>
    </ul>
    <?
  }

  function add_hours_form(){
    ?>
    <form action="memberin.php" method="POST">

        <div class="row panel">
          <div class="small-12 columns text-center">
              <h3>Enter Hours Form</h3>
          </div>
          <div class="small-7 columns">
            <fieldset> 
              <div class="row">
                <label>Date of Activity</label><br/>
                <div class="medium-5 columns">
                  <label>Month
                    <select name="month">
                    <option selected="selected" value="<? echo date('n', $this->ceudate); ?>"><? echo date('F', $this->ceudate);; ?></option>
                        <? getMonths(); ?>
                    </select>
                  </label>
                </div>
                <div class="medium-3 columns">
                  <label>Day
                    <select name="day">
                    <option selected="selected" value="<? echo date('d', $this->ceudate); ?>"><? echo date('d', $this->ceudate); ?></option>
                        <? getDays(); ?>
                    </select>
                  </label>
                </div>
                <div class="medium-4 columns">
                  <label>Year
                    <select name="year">
                      <option selected="selected" value="<? echo date('Y', $this->ceudate); ?>"><? echo date('Y', $this->ceudate); ?></option>
                          <? getYears(); ?>
                    </select>
                  </label>
                </div>
              </div>
            </fieldset>
          </div>

          <div class="small-5 columns">
            <div class="row">
              <div class="small-12 columns">
                <label>Type of Hours:</label>
                <select name="typehrs">
                        <option value="helpline">Helpline</option>
                        <option value="mercer">Mercer County</option>
                        <option value="conted">Continuing Ed</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="small-12 columns">
                <label>Number of Hours:</label>
                <input type="text" name="numhrs" placeholder="Number of Hours"/>
              </div>
            </div>
          </div>
          <div class="small-12 columns">
            <input type="hidden" name="dohours" value="yes"/>
            <input type="hidden" name="workhours" value="add"/>
            <input type="submit" value="Submit" class="button tiny radius"/>
          </div>
        </div>
          </form>
    <?
  }

  function add_hrs($info){
    global $database;
    print_r($info);
    $datereceipt = mktime(0, 0, 0, $database->escape_value($info['month']), 
      $database->escape_value($info['day']), 
      $database->escape_value($info['year']));
    $sql = "INSERT INTO mghours (";
    $sql .= "numindex, datehrs, typehrs, numhrs";
    $sql .= ") VALUES ('";
    $sql .= $this->numindex ."', '";
    $sql .= $datereceipt ."', '";
    $sql .= $database->escape_value($info['typehrs']) ."', '";
    $sql .= $database->escape_value($info['numhrs']) ."')";
    $database->query($sql);
    $_SESSION['ceumessage']="You have successfully added a new entry which is listed below.";
  }

  function update_hrs($info){
    global $database;
    $datereceipt= mktime(10,0,0, $database->escape_value($info['month']) , 
      $database->escape_value($info['day']), 
      $database->escape_value($info['year']));
    $sql = "UPDATE mghours SET ";
    $sql .= "datehrs='". $datereceipt ."', ";
    $sql .= "typehrs='". $database->escape_value($info['typeceu']) ."', ";
    $sql .= "numhrs='". $database->escape_value($info['notes'])."'";
    $sql .= " WHERE numindex='". $this->numindex ."'";
      $database->query($sql);
      $_SESSION['ceumessage']="You have successfully edited that CEU entry. Changes are reflected below.";
  }

    function delete_hrs(){
		global $database;
		$sql = "DELETE FROM ceurenewal ";
		  $sql .= "WHERE numindex='".$this->numindex."' ";
		  $sql .= "LIMIT 1";
		$database->query($sql);
		if ($database->affected_rows() == 1) {
		  $_SESSION['ceumessage']="You have successfully deleted that CEU, which is reflected in your CEU listings below.";
		}
  }
}

?>