<?php include_once("initialize.php");
session_start();

class frontobject {
	
	private $fpage;
	
  function __construct($numindex) {
  	global $database;
    $sql = "SELECT * FROM frontpage";
    $result_set = $database->query($sql);
    $value = $database->fetch_array($result_set);
    $this->fpage = $value['whatsay'];
  }

  function print_fpage(){
    echo $this->fpage;
  }

  function update_form(){
    ?><form action = "<? echo $self; ?>" method="post">
        <textarea name="frontcontent" id="editor1" rows="30" cols="100"><? echo $this->fpage; ?>
        </textarea><br/>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
        <input type="hidden" name="admintask" value="fpage"/>
        <br/><input type="submit" value="submit" />
        </form><?
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