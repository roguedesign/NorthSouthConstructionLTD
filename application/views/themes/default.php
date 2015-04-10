<!DOCTYPE html>
<html>
    <head>
	<title><?php echo $title; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta name="description" content="TODO List - sample application for NetBeans IDE" />
	<meta name="keywords" content="NetBeans, PHP" />
	<meta name="author" content="NetBeans PHP team" />
        
	<?php require 'application/views/head.php'; ?>
        <link href='http://fonts.googleapis.com/css?family=Dosis:300,400,700' rel='stylesheet' type='text/css'>

        
        <link rel="stylesheet" href="assets/themes/default/css/bjqs.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Code+Pro|Open+Sans:300' rel='stylesheet' type='text/css'> 
        <link rel="stylesheet" href="assets/themes/default/css/demo.css">
        <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script src="assets/themes/default/js/bjqs-1.3.min.js"></script>
        
        <link rel="stylesheet" href="assets/themes/default/css/jquery.remodal.css" type="text/css" >
    </head>
    <body>
        
            
            <div id="nav">
                <ul>
                    <li>ABOUT US</li>
                    <li>WHAT WE DO</li>
                    <li>PROJECTS</li>
                    <li>CONTACT US</li>
                </ul>
            </div>
            <div id="header"><img src="assets/themes/default/images/bgheader.jpg" alt="header"/>
                <div id="name">
                    <p id="namewhite">NORTH<strong>SOUTH</strong><strong id="nameorange">CONSTRUCTION</strong></p>   
                    <p id="statement">dealing in construction and architecture for over 10 years</p>
                </div>
            </div>
            
            <div id="info">
                <div id="about">
                    <br/><br/><br/><br/><br/><br/><br/><br/>
                    <h1>ABOUT US</h1>
                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
                        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim 
                        id est laborum."
                    </p>
                    <br/><br/><br/><br/><br/><br/><br/><br/>
                    <h1>WHAT WE DO</h1>
                    <p>
                       "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
                        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim 
                        id est laborum."
                        <br/> 
                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
                        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim 
                        id est laborum."
                    </p>
                    <br/><br/><br/><br/><br/><br/><br/><br/>
                    <img src="assets/themes/default/images/arrowdown.jpg" alt="arrowdown" />
                    <br/><br/><br/><br/><br/><br/><br/><br/>
                </div>
            </div>
        
        <div id="projects">
            <br/><br/><br/><br/><br/><br/><br/><br/>
            <div class='remodal-bg'>
                
                    <h1>PROJECTS</h1>
                    <br/><br/><br/>
                    
                    
                    <div id="project1">
                        <h3>HOUSE IN SUMNER</h3>
                    <img src="assets/themes/default/images/thumbs/houseview.jpg" alt="thumb of house view">
                    <p>
                        This is a project we did up in the port hills overlooking Sumner, Christchurch. It is the first house we did from start to finish.
                    </p>
                    <p><a href='#modal'>view</a></p>
                    </div>
                           
               
                    <div id="project2">
                            <h3>MOVIE THEATER</h3>
                        <img src="assets/themes/default/images/thumbs/houseview.jpg" alt="thumb of house view">
                        <p>
                            This is a project we did up in the port hills overlooking Sumner, Christchurch. It is the first house we did from start to finish.
                        </p>
                        <p><a href='#movies'>view</a></p>
                    </div>
                        
                  
            
               <!-- HOUSE GALLERY -->        
            <div class="remodal" data-remodal-id="modal">         
                <div id="projecthouse">
                <div id="container"> 
                    <div id="banner-fade">
                        <ul class="bjqs">
                            <li><img src="assets/themes/default/images/house/housebathroom.jpg" title="BATHROOM - Shower and Bathtub"></li>
                            <li><img src="assets/themes/default/images/house/kitchen.jpg" title="KITCHEN"></li>
                            <li><img src="assets/themes/default/images/house/kitchenview.jpg" title="KITCHEN VIEW - Standing from the kitchen"></li>
                            <li><img src="assets/themes/default/images/house/housebathroom3.jpg" title="BATHROOM - Handbasin"></li>
                            <li><img src="assets/themes/default/images/house/houseside.jpg" title="SIDE OF HOUSE - Showing different levels of structure"></li>
                            <li><img src="assets/themes/default/images/house/housefront.jpg" title="SIDE OF HOUSE - Mini seating area"></li>
                            <li><img src="assets/themes/default/images/house/housedeck.jpg" title="FRONT DECK - Front decking of the house"></li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>

               
<!--                MOVIE GALLERY --> 
               <div class="remodal" data-remodal-id="movies">
                    <div id="projectmovie">
                    <div id="container">  
                        <div id="banner-fade"> 
                            <ul class="bjqs">
                                <li><img src="assets/themes/default/images/movie/movie1.jpg" title="BATHROOM - Shower and Bathtub"></li>
                                <li><img src="assets/themes/default/images/movie/movie2.jpg" title="BATHROOM - Shower and Bathtub"></li>
                                <li><img src="assets/themes/default/images/movie/movie3.jpg" title="BATHROOM - Shower and Bathtub"></li>
                                <li><img src="assets/themes/default/images/movie/movie4.jpg" title="BATHROOM - Shower and Bathtub"></li>
                                <li><img src="assets/themes/default/images/movie/movie5.jpg" title="BATHROOM - Shower and Bathtub"></li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
               
               
               
            </div> 
        </div>
                    <script class="secret-source">
                      jQuery(document).ready(function($) {

                        $('#banner-fade').bjqs({
                          height      : 465,
                          width       : 620,
                          responsive  : true
                        });

                      });
                    </script>
                    
                    <script src="assets/themes/default/js/jquery.remodal.min.js"></script>
    </body>
</html>
