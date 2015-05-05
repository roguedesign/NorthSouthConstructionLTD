<!DOCTYPE html>
<html>
    <head>
	<title><?php echo $title; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta name="description" content="TODO List - sample application for NetBeans IDE" />
	<meta name="keywords" content="NetBeans, PHP" />
	<meta name="author" content="Amy Munro" />
        
	

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <link href='http://fonts.googleapis.com/css?family=Dosis:300,400,700' rel='stylesheet' type='text/css'>
        <?php require 'application/views/head.php'; ?>
    </head>
    <body id="page-top">
        
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">North South Construction LTD</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#about">ABOUT</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">PROJECT</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">CONTACT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        
    <?php echo $output ?>    
    
        
    </body>
</html>
