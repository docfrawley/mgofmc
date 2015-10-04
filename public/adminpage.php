<?php require_once("../includes/initialize.php"); ?>
<? include("../includes/layouts/header.php"); ?>


<? $thetask=isset($_GET['admintask']) ? $_GET['admintask'] : ""; 
	if (!$thetask) $thetask=isset($_POST['admintask']) ? $_POST['admintask'] : "fpage" ;
?>

<div class="row">
	<div class="medium-12 small-centered columns">
		<dl class="sub-nav">
  			<dt>Admin Tasks:</dt>
  			<dd <? if ($thetask=="fpage") {echo 'class="active"'; } ?> ><a href="?admintask=fpage">Edit Front Page</a></dd>
  			<dd <? if ($thetask=="checkhours") {echo 'class="active"'; } ?> ><a href="?admintask=checkhours">Check Hours</a></dd>
  			<dd <? if ($thetask=="monthlytips") {echo 'class="active"'; } ?> ><a href="?admintask=monthlytips">Edit Monthly Tips</a></dd>
		</dl>
	</div>
</div>

<?
	switch ($thetask) {
		case 'fpage':
			$frontobject = new frontobject();
			if (isset($_POST['frontcontent'])){
				$frontobject->update($_POST);
			}
			?>  
			<div class="row">
  				<div class="medium-12 columns panel">
			<?
			$frontobject->update_form();
			?>
				</div>
			</div>
			<?
			break;
		
		case 'checkhours':
			# code...
			break;

		case 'monthlytips':
			# code...
			break;

		default:
			echo "Yikes";
			break;
	}


?>


<? include("../includes/layouts/footer.php"); ?>
