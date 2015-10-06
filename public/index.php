<?php require_once("../includes/initialize.php"); ?>
<? include("../includes/layouts/header.php"); ?>



<div class="row" style="margin-top: 15px;">
	<div class="medium-7 columns">
		  <img src="img/logo.jpg" alt="slide 1" />
  </div>
  <div class="medium-5 columns">
    <ul class="example-orbit-content" data-orbit data-options="animation_speed:500;
                                              animation:fade;
                                              animation_speed:500;
                                              pause_on_hover:false;
                                              animation_speed:500;
                                              navigation_arrows:false;
                                              slide_number: false;
                                              bullets: false">
      <li><img src="img/image1.jpg" alt="slide 1" /></li>
      <li><img src="img/image2.jpg" alt="slide 2" /></li>
      <li><img src="img/image3.jpg" alt="slide 3" /></li>
      <li><img src="img/image4.jpg" alt="slide 4" /></li>
       <li><img src="img/image5.jpg" alt="slide 5" /></li>
    </ul> 
	</div>
</div>
<div class="row">
  <div class="small-12 columns">
    <p>The Master Gardeners of <a href="http://mgofmc.org/rutgers.html">Rutgers Cooperative Extension of Mercer County</a> is a group of volunteers who provide horticultural information and programs to the community. Trained by faculty and staff of NJAES, Rutgers University, and by horticultural experts, the Master Gardeners are knowledgeable about a wide range of gardening subjects.</p>
  </div>
</div>
<div class="row">
  <div class="medium-12 columns">
    <?
      $frontcontent = new frontobject();
      $frontcontent->print_fpage();
    ?>
  </div>
 
</div>
<div class="row">
	<div class="medium-4 columns">
     <button class="custom-button-class" data-reveal data-reveal-id="history">HISTORY</button>
    </div>
	<div class="medium-4 columns">
    <button class="custom-button-class" data-reveal data-reveal-id="mission">MISSION<br/>STATEMENT</button>
  </div>
  <div class="medium-4 columns">
    <button class="custom-button-class" data-reveal data-reveal-id="goals">OUR GOALS</button>
  </div>
</div>

    <!-- modal windows -->
<div id="history" class="reveal-modal" data-reveal>
<p>The Master Gardener Program was created by Cooperative Extension to meet an enormous increase in requests from home gardeners for horticultural information. The increase derives primarily from the urban and transient nature of modern American life. Sixty years ago, an Extension agent dealt with the questions of farm families. Since then, much of this farmland has been subdivided which has increased the number of families Extension must serve. In addition, many of these families are new to the area and are unfamiliar with the grasses, shrubs, trees, diseases, and insects that populate their new community. They often call Extension for advice.
    <br/><br/>In 1972 a county agricultural agent started the Master Gardener Program in Washington State. Since then it has spread to 50 states and several countries. Nineteen of New Jersey's 21 counties now train Master Gardeners. The Mercer County program started in September 1993.</p>
    <a class="close-reveal-modal">&#215;</a>
</div>
<div id="mission" class="reveal-modal" data-reveal>
<p>To excite, inspire and encourage the residents of Mercer County to participate in the rewarding experience of <a href="pdfs/responsible.pdf">responsible gardening</a> and pest management.</p>
      <a class="close-reveal-modal">&#215;</a>
</div>
<div id="goals" class="reveal-modal" data-reveal>
  <ul>
          <li>To extend into the community the educational efforts of Rutgers Cooperative Extension by using trained and certified volunteers.</li>
          <li>To establish educational programs in which Master Gardeners help residents of Mercer County obtain up-to-date recommendations from Rutgers University, the New Jersey Agricultural Experiment Station, and the U.S. Department of Agriculture.</li>
          <li>To assist individual clients, community groups, or other potential audience by disseminating horticultural, pest control, and related information on the county-supported telephone Helpline and at community outreach events.</li>
        </ul>
        <a class="close-reveal-modal">&#215;</a>
</div>


<? include("../includes/layouts/footer.php"); ?>
