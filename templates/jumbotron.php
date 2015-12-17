<?php 

/* edit jumbotron info box here */

$meetingVenue = MEETING_VENUE;
$meetingDate = MEETING_DATE;
$meetingLocation = MEETING_LOCATION;

$jumbo_info = <<<EOT
	<div class="home-jumbo-info">
		<ul>
		  <li class="thumbnail">
			  <p>
				  {$meetingDate}, {$meetingVenue} <br/>
				  {$meetingLocation}
			  </p>
			  <p>
			  	  <!--a href="abstract-submission.php" class="btn btn-success btn-lg" role="button">
					Submit poster abstract &raquo;
				  </a>
				  Or 
				  -->
				  <a href="register.php" class="btn btn-success btn-lg" role="button">
					register now &raquo;
				  </a>
			  </p>
		   </li>
		</ul>
	 </div> <!-- home jumbo info -->
EOT;

?>



	<div class="jumbotron hidden-xs" id="home-map-jumbotron">
<?php if ($page_name == 'home' || $page_name == 'contact' || $page_name == 'register'): ?>
	<div class="container" id="home-map-canvas"></div>
	<?php print $jumbo_info; ?>
<?php elseif ($page_name == 'info' || $page_name == 'logistics'): ?>
	<div id="jumbo-carousel" class="carousel slide" data-ride="carousel" data-interval="8000">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
		<li data-target="#jumbo-carousel" data-slide-to="0" class="active"></li>
		<li data-target="#jumbo-carousel" data-slide-to="1"></li>
		<li data-target="#jumbo-carousel" data-slide-to="2"></li>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">
		<div class="item active">
		  <img src="<?php echo BASE_DIRECTORY;?>includes/<?php echo JUMBOTRON_IMG_1; ?>" alt="Nepal">
		  <div class="carousel-caption"></div>
		</div>
		<div class="item">
		  <img src="<?php echo BASE_DIRECTORY; ?>includes/<?php echo JUMBOTRON_IMG_2; ?>" alt="Nepal">
		  <div class="carousel-caption"></div>
		</div>
		<div class="item">
		  <img src="<?php echo BASE_DIRECTORY; ?>includes/<?php echo JUMBOTRON_IMG_3; ?>" alt="Nepal">
		  <div class="carousel-caption"></div>
		</div>
	  </div>

	  <!-- Controls -->
	  <a class="left carousel-control" href="#jumbo-carousel" data-slide="prev">
		<!--span class="glyphicon glyphicon-chevron-left"></span-->
	  </a>
	  <a class="right carousel-control" href="#jumbo-carousel" data-slide="next">
		<!--span class="glyphicon glyphicon-chevron-right"></span-->
	  </a>
	  
	  <?php print $jumbo_info; ?>
</div>
<?php endif; ?>
	</div>