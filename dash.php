<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MY Check In</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Slick slider css -->
    <link href="css/skdslider.css" rel="stylesheet">
    <!-- Font awesome css -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- smooth animate css file -->
    <link rel="stylesheet" href="css/animate.css"> 
    <!-- Main style css -->
    <link rel="stylesheet" href="style.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico"/>
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'>     
   
    <link href="assets/modal/css/bootstrap-modal.css" rel="stylesheet">
	<link href="assets/modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet">
	
	
	
<!--
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link rel='stylesheet' href='../assets/css/order.css'>
-->


<script src='bt_cal/assets/js/moment.min.js'></script>
<script src='bt_cal/assets/js/jquery.min.js'></script>
<script src='bt_cal/assets/js/jquery-ui.min.js'></script>
<script src='bt_cal/assets/js/fullcalendar.min.js'></script>
	
	
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- BEGAIN PRELOADER 
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
  -->
  <!-- END PRELOADER -->

  <!-- START HEADER SECTION -->
  <header id="headerArea">
    <a href="#" class="scrollToTop"><i class="fa fa-angle-up"></i></a>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="slider_area">           
          <div class="menuarea"> 
            <div class="navbar navbar-default navbar-fixed-top" role="navigation">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <!-- For Text Logo -->
                 <a class="navbar-brand logo" href="#"><span>My</span>Check In</a>
                 <!-- For Img Logo -->
                  <!--  <a class="navbar-brand logo" href="#"><img src="img/logo.png" alt="logo"></a> -->
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav navbar-right custom_nav mobnav" id="top-menu">
                    <li class="active"><a href="#headerArea">HOME</a></li>
                    <li><a href="#CheckIn">Check In </a></li>
                    <li><a href="#priceList">Booking</a></li>
                    <li><a href="#messages">Groups</a></li>
                    <li><a href="#testimonila">Settings</a></li>
                    <li><a href="#clients"><span>X</span> Messages</a></li>
                    <li><a href="#contact">Logout</a></li>
                  </ul>
                </div><!--/.nav-collapse -->
              </div>
            </div>
          </div>
                  
        </div>
      </div>  
    </div>      
  </header>
  <!-- END HEADER SECTION -->

  <!-- START FEATURES SECTION 
  <section id="featuresSection">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="features_ara">
            <br>
			<h2>BENT MY Check In</h2>
            
            <div class="features_responsive">
              <div class="row">
                <div class="col-lg-3 col-md-3">
                  <div class="single_features_responsive wow fadeInUp">
                    <i class="fa fa-desktop desktop_icon"></i>
                    <a href="">
					<h2>Calendar</h2>
                    <p>Schedule Meetings</p>
					</a>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3">
                  <div class="single_features_responsive wow fadeInUp">
                   <i class="fa fa-paste font_icon"></i>
                    <h2>Group</h2>
                    <p>View Group member location </p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3">
                  <div class="single_features_responsive wow fadeInUp">
                     <i class="fa fa-credit-card html_icon"></i>
                    <h2>Booking</h2>
                    <p>Book meeting rooms</p>
                  </div>
                </div>
				<div class="col-lg-3 col-md-3">
                  <div class="single_features_responsive wow fadeInUp">
                    <i class="fa fa-desktop desktop_icon"></i>
                    <a href="">
					<h2>Messaging</h2>
                    <p>Internal Email</p>
					</a>
                  </div>
                </div>
              </div>
            </div>
           </div>
        </div>
      </div>
    </div>  
	
	-->
	
   <!-- START FEATURES PRODUCT AREA -->
    <div class="features_productarea">
      <div class="direction_icon">
        <a id="firstTop" class="dirc_up" href="#">
          <i class="fa fa-chevron-up"></i>
        </a>
        <a id="firstBottom" class="dirc_down" href="#">
          <i class="fa fa-chevron-down"></i>
        </a>
      </div>
      <div class="container">
        <!-- START FIRST FEATURES PRODUCT -->
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="featprodcs_img wow fadeInLeft">
              <img class="img-responsive" src="img/mobile_img1.png" alt="img">
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="featprodcs_content wow fadeInRight">
              <h3><span data-toggle="modal" data-target="#addemp"><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Add New Employee"><i class="fa fa-plus"></i>Employee</a></span>
		  
		   <span data-toggle="modal" data-target="#addtask"><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Add New Employee"><i class="fa fa-plus"></i>Task</a></span></h3>
			  
			  <h1>Detailed documentation</h1>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Stet clita kasd gubergren, no sea takimata.</p>
              <div class="media features_widget">
                <a class="pull-left" href="#">
                  <span class="fa fa-clock-o clock_icon"></span>
                </a>
                <div class="media-body media_content">
                  <h4>Beautiful, modern design</h4>
                  <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata.</p>
                </div>
              </div>
              <div class="media features_widget">
                <a class="pull-left" href="#">
                  <span class="fa fa-wrench clock_icon"></span>
                </a>
                <div class="media-body media_content">
                  <h4>Easy to set up</h4>
                  <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- START SECOND FEATURES PRODUCT -->
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="secondfeatures_prodsarea">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="featprodcs_content  wow fadeInLeft">
                  <h1>All you want from an app</h1>
                  <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Stet clita kasd gubergren, no sea takimata sanctus est.</p>
                  <div class="media features_widget">
                    <a class="pull-left" href="#">
                       <span class="fa fa-video-camera clock_icon"></span>
                    </a>
                    <div class="media-body media_content">
                      <h4>Video background</h4>
                      <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata.</p>
                    </div>
                  </div>
                   <div class="media features_widget">
                    <a class="pull-left" href="#">
                       <span class="fa fa-lightbulb-o clock_icon"></span>
                    </a>
                    <div class="media-body media_content">
                      <h4>Cool animations</h4>
                      <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata.</p>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="featprodcs_img wow fadeInRight">
                    <img class="img-responsive" src="img/mobile_img3.png" alt="img">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- START FEATURES PRODUCT AREA -->
    <div class="features_productarea sample_appparea">
      <div class="direction_icon">
        <a id="secondTop" class="dirc_up" href="#">
          <i class="fa fa-chevron-up"></i>
        </a>
        <a id="secondBottom" class="dirc_down" href="#">
          <i class="fa fa-chevron-down"></i>
        </a>
      </div>
      <div class="container">
        <!-- START FIRST FEATURES PRODUCT -->
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="app_content">
              <h1>Sample screenshot from app</h1>
              <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Consetetur sadipscing.</p>            
            </div>
          </div>
        </div>       
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="app_area">
           <div class="container">
              <div class="row">
              <div class="col-lg-7 col-md-7 wow fadeInUp">
                <div class="featprodcs_img app_img">
                  <img class="img-responsive" src="img/mobile_img2.png" alt="img">
                </div>
                </div>
                <div class="col-lg-5 col-md-5">
                  <div class="featprodcs_content apparea_content">
                    <h1>Choose a chapter</h1>
                    <ul class="nav chapterNav">
                      <li><a href="#">Chapter 01</a></li>
                      <li><a href="#">Chapter 02</a></li>
                      <li><a href="#">Chapter 03</a></li>
                      <li><a href="#">Chapter 04</a></li>
                      <li><a href="#">Chapter 05</a></li>
                    </ul>
                  </div>
                </div>
              </div>
           </div>
          </div>
        </div>
      </div>
      <!-- START APP DOWNLOAD AREA -->
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="appdownload_area">
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="appdownload">
                    <p><span>Get your copy now!</span>Suspendisse vitae bibendum mauris.</p> 
                    <p>Nunc iaculis nisl vitae laoreet elementum donec dignissim metus sit.</p>
                    <a class="download_btn appdown_btn" href="#">Download</a>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>     
  </section>

  

  <!-- START VIDEO SECTION -->
  <section id="videoSection">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="video_area">
            <h1>Watch our products video</h1>
            <p>Lorem ipsum dolor sit amet. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming.</p>
            <div class="featured_video">
              <iframe src="https://player.vimeo.com/video/98931428" width="100%" height="100%" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>               
            </div>
          </div>
        </div>
      </div>
    </div>      
  </section>
  <!-- END VIDEO SECTION -->



  <!-- START CLIENTS SECTION -->
  <section id="clients">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="clients_area">
            <h1>Some of our happy clients</h1>
            <p>Here are a few firms that trust our services, day after day.</p>
            <div class="client_slider">
              <!-- Carousel
                ================================================== -->
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="item active">
                    <ul>
                      <li><a href="#"><img src="img/microsoft.png" alt="img"></a></li>
                      <li><a href="#"><img src="img/hp.png" alt="img"></a></li>
                      <li><a href="#"><img src="img/android.png" alt="img"></a></li>
                      <li><a href="#"><img src="img/intel.png" alt="img"></a></li>
                    </ul>
                  </div>
                  <div class="item">
                    <ul>
                      <li><a href="#"><img src="img/microsoft.png" alt="img"></a></li>
                      <li><a href="#"><img src="img/hp.png" alt="img"></a></li>
                      <li><a href="#"><img src="img/android.png" alt="img"></a></li>
                      <li><a href="#"><img src="img/intel.png" alt="img"></a></li>
                    </ul>
                  </div>
                </div>
              </div><!-- /.carousel -->

              <a class="clientSlider_left" href="#myCarousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
              <a class="clientSlider_right" href="#myCarousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END CLIENTS SECTION -->

  <!-- START CONTACT SECTION -->
  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="contact_area">
            <h1>Get in touch</h1>
            <p>Feel free to ask any questions via the contact form below.</p>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="contact_left wow fadeInLeft">
                  <h1>Contact</h1>
                  <div class="media contact_media">
                    <i class="fa fa-phone"></i>
                    <div class="media-body contact_media_body">
                      <h4>Phone: +120568974564</h4>
                    </div>
                  </div>
                    <div class="media contact_media">
                    <i class="fa fa-envelope"></i>
                    <div class="media-body contact_media_body">
                      <h4>Email:info@codeengine.com</h4>
                    </div>
                  </div>
                    <div class="media contact_media">
                    <i class="fa fa-map-marker"></i>
                    <div class="media-body contact_media_body">
                      <h4>Address: Lombard, IL, United States</h4>
                    </div>
                  </div>
                  <div class="contact_social">
                    <h1>Social</h1>
                    <a class="fb" href="#"><i class="fa fa-facebook"></i></a>
                    <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                    <a class="gplus" href="#"><i class="fa fa-google-plus"></i></a>
                    <a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a>
                  </div>
                </div>
                </div>
              <div class="col-lg-6 col-md-6">
                <div class="contact_right wow fadeInRight">
                <div id="form-messages"></div>
                  <form class="footer_form">
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="form-grooup">
                          <input type="text" class="form-control" placeholder="Name" required>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email (Required)" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                          <textarea class="form-control"  cols="30" rows="8" placeholder="Message"></textarea>
                        </div>
                      </div>
                    </div>
                    <input class="contact_sendbtn" type="submit" value="Send">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
          <!-- BEGAIN GOOGLE MAP -->
          <div class="google_map wow fadeInUp">                         
            <div id="map_canvas"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END CONTACT SECTION -->

  <!-- START FOOTER SECTION -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="footer_area">
            <p>Designed By <a href="#" rel="nofollow">BENT Software Labs</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- END FOOTER SECTION -->
  
  
  <div class="modal fade" id="addemp">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">

          <h3><i class="fa fa-ok-circle"></i>Add New Employee</h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">

            <form action="db_addemp.php" method="post" id="addcont_form" role="form" class="form-horizontal">
              <div class="form-group">
                  <div class="col-sm-12 fa-align-right">
                  <input type="textarea" class="form-control" name="task_desc" id="task_desc" placeholder="Task Description">
                </div>
                </div>
               
			   <div class="form-group">
                 <div class="col-md-6 fa-align-right">
                
				   <select name="emptype" id="emptype" class="form-control">
            	  <option value="0">--- Module ---</option>
 <?php

    $STM = $dbh->prepare("SELECT * FROM lut_modules");

    $STM->execute();

    $STMrecords9 = $STM->fetchAll();
    foreach($STMrecords9 as $row9)
        { ?><option value="<?php echo $row9['moduleid'];?>"><?php echo $row9['module'].' '.$row9['module_th'] ;?> </option>
                 <?php  } ?>  
                  </select>  
                </div>
                </div>
			   
               <div class="form-group">
                 <div class="col-md-6 fa-align-right">
                
				   <select name="assignto" id="assignto" class="form-control">
            	  <option value="0">---Assigned To---</option>
 <?php

    $STM = $dbh->prepare("SELECT * FROM  tbl_users");

    $STM->execute();

    $STMrecords3 = $STM->fetchAll();
    foreach($STMrecords3 as $row3)
        { ?><option value="<?php echo $row3['id'];?>"><?php echo $row3['fname'].' '.$row3['lname'] ;?> </option>
                 <?php  } ?>  
                  </select>  
                </div>
                
                 <div class="col-md-6 fa-align-right">
                
				   <select name="assignby" id="assignby" class="form-control">
            	  <option value="0">---Assign By---</option>
 <?php

    $STM = $dbh->prepare("SELECT * FROM  tbl_users");

    $STM->execute();

    $STMrecords3a = $STM->fetchAll();
    foreach($STMrecords3a as $row3)
        { ?><option <?php if($userida == $row3['id']){echo("selected");}?> value="<?php echo $row3['id'];?>"><?php echo $row3['fname'].' '.$row3['lname'] ;?> </option>
                 <?php  } ?>  
                  </select>  
                </div>
                </div>
                <div class="form-group">
                <div class="col-md-6 fa-align-left">
				 <div class="input-group">
				 <input type="date" name="startdate" value="" id="startdate" placeholder="Start Date" class="form-control input-datepicker">
                  <span class="input-group-addon"></span>
				  </div>
                </div>
                              
                <div class="col-md-6 fa-align-right">
				 <div class="input-group">
				<input type="date" name="duedate" id="duedate" placeholder="Due Date" class="form-control input-datepicker">
                  <span class="input-group-addon"></span>
                 </div> 
                </div>
                </div>
                <div class="form-group">
				<div class="col-md-6 fa-align-right">
			   <div class="input-group">
                  <input type="time" name="due_time" id="due_time" placeholder="Due Time" class="form-control input-timepicker">
                  <span class="input-group-addon"></span>
                </div>
                </div>
                </div>
                
                 <div class="form-group">
                <div class="col-md-6 fa-align-left">
                 <select class="form-control" name="customer" id="customeradd"  >
						<option value="0">---Customer---</option>
						<?php

						$STM = $dbh->prepare("SELECT * FROM  tbl_customer ORDER BY cust_name ASC");

						$STM->execute();

						$STMCUST = $STM->fetchAll();
						foreach($STMCUST as $cust)
						{ ?><option value="<?php echo $cust['cust_ID'];?>"><?php echo $cust['cust_name'] ;?> </option>
						<?php  } ?>  
						</select>  
                </div>
                
                
               
                
                <div class="col-md-6 fa-align-right">
                 	<div id="selectonchange" style="display:none;">
				
				  </div>					
						
                  </div>
                  </div>
				  
                 <div class="form-group">
                 <div class="col-md-12 fa-align-right">
                <input type="text" class="form-control" name="task_notes" id="task_notes" placeholder="Task Notes">
                </div>
                </div> 
                 
				  
                <div class="form-group">
                <div class="col-md-offset-3 col-lg-10">
                <input type="submit" name="submit" id="submit" class="btn btn-info" value="Save">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  
                </div> 
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>





  
  
  <div class="modal fade" id="addtask" tabindex="-1" role="dialog" aria-labelledby="addtaskLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">

          <h3><i class="fa fa-ok-circle"></i>Add New Task</h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">

            <form action="db_addtaskdash.php" method="post" id="addcont_form" role="form" class="form-horizontal">
              <div class="form-group">
                  <div class="col-sm-12 fa-align-right">
                  <input type="textarea" class="form-control" name="task_desc" id="task_desc" placeholder="Task Description">
                </div>
                </div>
               
			   <div class="form-group">
                 <div class="col-md-6 fa-align-right">
                
				   <select name="module" id="module" class="form-control">
            	  <option value="0">--- Module ---</option>
 <?php

    $STM = $dbh->prepare("SELECT * FROM lut_modules");

    $STM->execute();

    $STMrecords9 = $STM->fetchAll();
    foreach($STMrecords9 as $row9)
        { ?><option value="<?php echo $row9['moduleid'];?>"><?php echo $row9['module'].' '.$row9['module_th'] ;?> </option>
                 <?php  } ?>  
                  </select>  
                </div>
                </div>
			   
               <div class="form-group">
                 <div class="col-md-6 fa-align-right">
                
				   <select name="assignto" id="assignto" class="form-control">
            	  <option value="0">---Assigned To---</option>
 <?php

    $STM = $dbh->prepare("SELECT * FROM  tbl_users");

    $STM->execute();

    $STMrecords3 = $STM->fetchAll();
    foreach($STMrecords3 as $row3)
        { ?><option value="<?php echo $row3['id'];?>"><?php echo $row3['fname'].' '.$row3['lname'] ;?> </option>
                 <?php  } ?>  
                  </select>  
                </div>
                
                 <div class="col-md-6 fa-align-right">
                
				   <select name="assignby" id="assignby" class="form-control">
            	  <option value="0">---Assign By---</option>
 <?php

    $STM = $dbh->prepare("SELECT * FROM  tbl_users");

    $STM->execute();

    $STMrecords3a = $STM->fetchAll();
    foreach($STMrecords3a as $row3)
        { ?><option <?php if($userida == $row3['id']){echo("selected");}?> value="<?php echo $row3['id'];?>"><?php echo $row3['fname'].' '.$row3['lname'] ;?> </option>
                 <?php  } ?>  
                  </select>  
                </div>
                </div>
                <div class="form-group">
                <div class="col-md-6 fa-align-left">
				 <div class="input-group">
				 <input type="date" name="startdate" value="" id="startdate" placeholder="Start Date" class="form-control input-datepicker">
                  <span class="input-group-addon"></span>
				  </div>
                </div>
                              
                <div class="col-md-6 fa-align-right">
				 <div class="input-group">
				<input type="date" name="duedate" id="duedate" placeholder="Due Date" class="form-control input-datepicker">
                  <span class="input-group-addon"></span>
                 </div> 
                </div>
                </div>
                <div class="form-group">
				<div class="col-md-6 fa-align-right">
			   <div class="input-group">
                  <input type="time" name="due_time" id="due_time" placeholder="Due Time" class="form-control input-timepicker">
                  <span class="input-group-addon"></span>
                </div>
                </div>
                </div>
                
                 <div class="form-group">
                <div class="col-md-6 fa-align-left">
                 <select class="form-control" name="customer" id="customeradd"  >
						<option value="0">---Customer---</option>
						<?php

						$STM = $dbh->prepare("SELECT * FROM  tbl_customer ORDER BY cust_name ASC");

						$STM->execute();

						$STMCUST = $STM->fetchAll();
						foreach($STMCUST as $cust)
						{ ?><option value="<?php echo $cust['cust_ID'];?>"><?php echo $cust['cust_name'] ;?> </option>
						<?php  } ?>  
						</select>  
                </div>
                
                
               
                
                <div class="col-md-6 fa-align-right">
                 	<div id="selectonchange" style="display:none;">
				
				  </div>					
						
                  </div>
                  </div>
				  
                 <div class="form-group">
                 <div class="col-md-12 fa-align-right">
                <input type="text" class="form-control" name="task_notes" id="task_notes" placeholder="Task Notes">
                </div>
                </div> 
                 
				  
                <div class="form-group">
                <div class="col-md-offset-3 col-lg-10">
                <input type="submit" name="submit" id="submit" class="btn btn-info" value="Save">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  
                </div> 
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  
  
  
  
  

  <!-- JQuery Files -->

  <!-- Initialize jQuery Library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <!-- Google map -->
  <script src="https://maps.googleapis.com/maps/api/js"></script>
  <script src="js/jquery.ui.map.js"></script>  
  <!-- Skds slider -->
  <!-- Bootstrap js  -->
  <script src="js/bootstrap.min.js"></script>
  <!-- For smooth animatin  -->
  <script src="js/wow.min.js"></script> 

  <!-- Custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  
  <script src="assets/modal/js/bootstrap-modal.js"></script>
<script src="assets/modal/js/bootstrap-modalmanager.js"></script>

<script src="../assets/modal/js/bootstrap-modal.js"></script>
<script src="../assets/modal/js/bootstrap-modalmanager.js"></script>


<script src='assets/js/plugins/jquery.pnotify.js'></script>
<script src='assets/js/plugins/jquery.sparkline.min.js'></script>
<script src='assets/js/plugins/mwheelIntent.js'></script>
<script src='assets/js/plugins/mousewheel.js'></script>
<script src='assets/js/bootstrap/tab.js'></script>
<script src='assets/js/bootstrap/dropdown.js'></script>
<script src='assets/js/bootstrap/tooltip.js'></script>
<script src='assets/js/bootstrap/collapse.js'></script>
<script src='assets/js/bootstrap/scrollspy.js'></script>
<script src='assets/js/plugins/bootstrap-datepicker.js'></script>
<script src='assets/js/bootstrap/transition.js'></script>
<script src='assets/js/plugins/jquery.knob.js'></script>
<script src='assets/js/plugins/jquery.flot.min.js'></script>

<script src='assets/js/plugins/datatables/datatables.min.js'></script>
<script src='assets/js/plugins/chosen.jquery.min.js'></script>
<script src='assets/js/plugins/jquery.timepicker.min.js'></script>
<script src='assets/js/plugins/daterangepicker.js'></script>
<script src='assets/js/plugins/colpick.js'></script>
<script src='assets/js/plugins/moment.min.js'></script>
<script src='assets/js/plugins/datatables/bootstrap.datatables.js'></script>
<script src='assets/js/bootstrap/modal.js'></script>
<script src='assets/js/plugins/raphael-min.js'></script>
<script src='assets/js/plugins/morris-0.4.3.min.js'></script>
<script src='assets/js/plugins/justgage.1.0.1.min.js'></script>
<script src='assets/js/plugins/jquery.maskedinput.min.js'></script>
<script src='assets/js/plugins/jquery.maskmoney.js'></script>
<script src='assets/js/plugins/summernote.js'></script>
<script src='assets/js/plugins/dropzone-amd-module.js'></script>
<script src='assets/js/plugins/jquery.validate.min.js'></script>
<script src='assets/js/plugins/jquery.bootstrap.wizard.min.js'></script>
<script src='assets/js/plugins/jscrollpane.min.js'></script>
<script src='assets/js/application.js'></script>



  </body>
</html>