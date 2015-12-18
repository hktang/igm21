<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="APN IGM/SPG">
    <meta name="author" content="APN Secretariat">
    <link href="includes/bootstrap/css/bootstrap.css" media="all" rel="stylesheet" type="text/css">
	<link href="includes/jqui/css/apn-ui/jquery-ui-1.10.3.custom.min.css" media="all" rel="stylesheet" type="text/css">
	<link href="includes/apn-styles.css" media="all" rel="stylesheet" type="text/css">
	<title><?php echo $page_title ?></title>
  </head>
  
  <body>

    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#igm-main-nav">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img id="header-logo-apn" src= "<?php echo BASE_DIRECTORY ?>includes/logo-apn-w-h.png" alt="APN logo" height="20" ></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="igm-main-nav">
          <ul class="nav navbar-nav">
            <li <?php echo ($page_name == 'home') ? "class='active'" : ""; ?>>
                <a href="<?php echo BASE_DIRECTORY ?>">
                    <span class="glyphicon glyphicon-home"></span> <?php echo MEETING_SHORTNAME; ?>
                </a>
            </li>
            <!--li <?php echo ($page_name == 'info') ? "class='active'" : ""; ?>>
                <a href="<?php echo BASE_DIRECTORY ?>info.php">
                    <span class="glyphicon glyphicon-info-sign"></span>General information
                </a>
            </li-->
            <li <?php echo ($page_name == 'register') ? "class='active'" : ""; ?>>
                <a href="<?php echo BASE_DIRECTORY ?>register.php">
                    <span class="glyphicon glyphicon-list"></span> Registration
                </a>
            </li>
            <li <?php echo ($page_name == 'papers') ? "class='active'" : ""; ?>>
                <a href="<?php echo SECURE_SERVER_URL; ?>">
                    <span class="glyphicon glyphicon-book"></span> Meeting Documents
                </a>
            </li>
            <li <?php echo ($page_name == 'abstract-submission') ? "class='active'" : ""; ?>>
                <a href="<?php echo BASE_DIRECTORY ?>abstract-submission.php">
                    <span class="glyphicon glyphicon-file"></span> Abstract submission
                </a>
            </li>					
            <li <?php echo ($page_name == 'logistics') ? "class='active'" : ""; ?>>
                <a href="<?php echo BASE_DIRECTORY ?>logistics.php">
                    <span class="glyphicon glyphicon-map-marker"></span> Logistics information
                </a>
            </li>
            <li <?php echo ($page_name == 'contact') ? "class='active'" : ""; ?>>
                <a href="<?php echo BASE_DIRECTORY ?>contact.php">
                    <span class="glyphicon glyphicon-phone-alt"></span> Contact
                </a>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

<div class="container">