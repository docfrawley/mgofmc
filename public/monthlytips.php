<?php require_once("../includes/initialize.php"); ?>
<? include("../includes/layouts/header.php"); ?>


<? 
$themonth=isset($_GET['themonth']) ? $_GET['themonth'] : date("F");
$this_month_tips = new mtipsgroup($themonth);
?>
<div class="row">
	<div class="medium-12 small-centered columns">
		<dl class="sub-nav">
	  		<? tips_month($themonth); ?>
		</dl>
	</div>
</div>

<div class="row">
  <div class="medium-6 columns panel">
    <h4 class="text-center"><? echo "Things to do in {$themonth}";?></h4>

    <? $this_month_tips->print_array('d'); ?>
  </div>
  <div class="medium-6 columns panel">
  	<h4 class="text-center"><? echo "Things to watch for in {$themonth}";?></h4>
  	<? $this_month_tips->print_array('w'); ?>
  </div>
</div>

<div class="row">
  <div class="medium-12 columns panel">
    <h3>Things to Do All Year Long:</h3>

Note: DATES MAY CHANGE SLIGHTLY OVER THE YEARS, ESPECIALLY AFTER MILD WINTERS.<br/>
	<ul>
		<li>have soil tests run - separate tests for lawns, vegetable and flower gardens, shrub borders (soil mailing kits are available at Rutgers Cooperative Extension office)</li>
		<li>apply lime as needed (except when ground is frozen)</li>
		<li>add organics to the compost pile or bin</li>
		<li>prune dead wood on trees, shrubs and vines</li>
		<li>tend house plants</li>
		<li>read gardening books</li>
		<li>give books, tools, compost bins and other gardening materials as gifts for holidays, bridal showers, birthdays, etc.</li>
		<li>call Master Gardener Hotline for gardening information (609-989-6853)</li>
	</ul>
	<h4>Things to Watch Out for All Year Long:</h4>
	<ul>
		<li>cockroach infestations</li>
		<li>food infesting insects, such as Indian meal moth, cigarette beetle, sawtoothed grain beetle</li>
		<li>carpet beetle and cloth moth infestations</li>
	</ul>
  </div>
</div>
 <!-- modal windows -->
 <?  $this_month_tips->generate_boxes(); ?>

<? include("../includes/layouts/footer.php"); ?>
