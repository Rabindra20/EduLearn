<?php
include('database_connection.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: teach_login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user_id']);
    header("location: teach_login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.carousel.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.transitions.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="css/nivo-slider-theme.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="css/responsive.css" rel="stylesheet">

</head>
<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="teach_index.php">
                  <h1><span>Edu</span>Learn</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
								</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active">
                    <a class="page-scroll" href="teach_index.php">Home</a>
                  </li>
                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Course<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="teach_offline.php">offline</a></li>
                                <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="teach_online">online<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="teach_online.php">Solve Doubt</a></li>
          <li><a tabindex="-1" href="live.html" echo="login">Go Live</a></li>                  
        </ul>
      </li>
    </ul> 
	<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="p.php">personal details</a></li>
                      <li><a href="logout.php">logout</a></li>
                    </ul> 
                  </li>
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->

  <!-- Start Bottom Header -->
  <div class="header-bg page-area">
    <div class="home-overly"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="slider-content text-center">
            <div class="header-bottom">
              <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                <h1 class="title2">Offline videos</h1>
              </div>
              <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                <h2 class="title3">Offline videos are avaible page</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END Header -->
  <div class="blog-page area-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="page-head-blog">
            <div class="single-blog-page">
              <!-- search option start -->
              <form action="search-option">
                <div class="search-option">
                  <input type="text" placeholder="Search...">
                  <button class="button" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                </div>
              </form>
              <!-- search option end -->
            </div>
            <div class="single-blog-page">
              <!-- recent start -->
              <div class="left-blog">
                <h4>PDF</h4>
                <div class="recent-post">
                  <!-- start single post -->
                  <div class="recent-single-post">
                    <div class="post-img">
                      <a href="pdf/1.pdf"><img src="img/1.jpg" width="400px" height="40px">
												</a>
                    </div>
                    <div class="pst-content">
                      <p><a href="pdf/1.pdf">
                      <p> subject name:Software Engineering</p>
                      <p> topic name:design patterns</p>
                      </a></p>
                    </div>
                  </div>
                  <!-- End single post -->
                  <!-- start single post -->
                  <div class="recent-post">
                      <!-- start single post -->
                      <div class="recent-single-post">
                        <div class="post-img">
                          <a href="pdf/1.pdf"><img src="img/1.jpg" width="400px" height="40px">
                            </a>
                        </div>
                        <div class="pst-content">
                          <p><a href="pdf/1.pdf">
                          <p> subject name:Software Engineering</p>
                          <p> topic name:design patterns</p>
                          </a></p>
                          </div>
						  
                          <form action="upload.php" method="post" enctype="multipart/form-data">
    Select pdf to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload pdf" name="submit">
</form>
                        
                      </div></div>
                  <!-- End single post -->
                </div>
              </div>
              <!-- pdf end -->
            </div>
            <div class="single-blog-page">
              <div class="left-blog">
                <h4>Subject</h4>
                <ul>
                  <li>
                    <a href="#">c language</a>
                  </li>
                  <li>
                    <a href="#">C++</a>
                  </li>
                  <li>
                    <a href="#">Data Structure</a>
                  </li>
                  <li>
                    <a href="#">Software Engineer</a>
                  </li>
                  <li>
                    <a href="#">MFCS</a>
                  </li>
                  <li>
                    <a href="#">Web Techcology</a>
                  </li>
                  <li>
                    <a href="#">Data Communication and Computer Networks</a>
                  </li>
                  <li>
                      <a href="#">Operating System</a>
                    </li>
                    <li>
                      <a href="#">Computer Organistion</a>
                    </li>
                    <li>
                      <a href="#">Design and Analysis of Algorithms </a>
                    </li>
                    <li>
                      <a href="#">Unix</a>
                    </li>
                    <li>
                      <a href="#">information security management</a>
                    </li>
                     
                    <li>
                              <a href="#">Artifial Intelligence</a>
                            </li>
                            <li>
                              <a href="#">Design Patterns</a>
                            </li>
                            <li>
                              <a href="#">Mobile Computing</a>
                            </li>
                            <li>
                              <a href="#">Flat</a>
                            </li>
                            <li>
                              <a href="#">Compiler</a>
                            </li>
                            <li>
                              <a href="#">Linux</a>
                            </li>
                            <li>
                              <a href="#">more subjects.......</a>
                            </li>
                </ul>
              </div>
            </div>
            
            <div class="single-blog-page">
              <div class="left-tags blog-tags">
                <div class="popular-tag left-side-tags left-blog">
                  <h4>Engineering branches</h4>
                  <ul>
                    <li>
                      <a href="#offline.php">Computer science and Engineering</a>
                    </li>
                    <li>
                      <a href="#">Civil Engineering</a>
                    </li>
                    <li>
                      <a href="#">Mechanical Engineering</a>
                    </li>
                    <li>
                      <a href="#">Electrical and electronics Engineering</a>
                    </li>
                    <li>
                      <a href="#">Electronic and Communication Engineering</a>
                    </li>
                    <li>
                      <a href="#">Chemical Engineering</a>
                    </li>
                    <li>
                      <a href="#">Aerospace Engineering</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End left sidebar -->
        <!-- Start single blog -->
        <h2>videos</h2><hr>
        <div class="col-md-4 col-sm-4 col-xs-8">
          <div class="row">
            <div class="col-md-12 col-sm-8 col-xs-12">
              <div class="single-blog">
                <div class="single-blog-img">
                  <a href="blog-details.html">
                   <ul>
							<?php
								$query =$connect->query("SELECT * FROM videos");
								while($row = $query->fetch()){
								$video_id = $row['video_id'];
							?>
								<h3><?php echo $row['title']; ?></h3><video width="720" height="540" controls>
                          <source src="upload/<?php echo $row['location']; ?>" type="video/mp4">
                          
                          Your browser does not support the video tag.
                        </video>
					<?php
							} 
							?>
					</ul>
                   
				  
										</a>
                </div>
                
              </div>
            </div>
            <!-- End single blog -->
         <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="single-blog">
                <div class="single-blog-img">
                  <a href="blog-details.html">
                      <video width="720" height="540" controls>
                          <source src="upload/1.mp4" type="video/mp4">
                          <source src="upload/1.ogg" type="video/ogg">
                          Your browser does not support the video tag.
                        </video>
										</a>
                </div>
               
                <div class="blog-text">
                  <h4>
											<a href="#">Algorithms</a>
										</h4>
                  <p>DAA</p>
                   
                </div>
                
              </div>
            </div>
			<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="single-blog">
                <div class="single-blog-img">
                  <a href="blog-details.html">
                      <video width="720" height="540" controls>
                          <source src="upload/2.mp4" type="video/mp4">
                          <source src="upload/2.ogg" type="video/ogg">
                          Your browser does not support the video tag.
                        </video>
										</a>
                </div>
               
                <div class="blog-text">
                  <h4>
											<a href="#">JAVA</a>
										</h4>
                  <p>JAVA</p>
                   
                </div>
                
              </div>
            </div>
            <!-- End single blog -->
            <div class="blog-pagination">
              <ul class="pagination">
                <li><a href="#">&lt;</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
              <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="container1">
		<br>
		<br>
				<form method="post" enctype="multipart/form-data" >
						<?php
							if(isset($_FILES['file'])){
							
								$name = $_FILES['file']['name'];
								$extension = explode('.', $name);
								$extension = end($extension);
								$type = $_FILES['file']['type'];
								$size = $_FILES['file']['size'] /1024/1024;
								$random_name = rand();
								$tmp = $_FILES['file']['tmp_name'];
								
								
								if ((strtolower($type) != "video/mpg") && (strtolower($type) != "video/wma") && (strtolower($type) != "video/mov") 
								&& (strtolower($type) != "video/flv") && (strtolower($type) != "video/mp4") && (strtolower($type) != "video/avi") 
								&& (strtolower($type) != "video/qt") && (strtolower($type) != "video/wmv") && (strtolower($type) != "video/wmv"))
								{
									$message= "Video Format Not Supported !";

								}else
								{
									move_uploaded_file($tmp, 'upload/'.$random_name.'.'.$extension);	
									$connect->query("insert into videos (title,location) values ('$name','$random_name.$extension')");
									$message="Video Uploaded Successfully!";
								}
								
								?>
								<?php
								echo "<script type='text/javascript'>alert('$message\\n\\nUpload: $name\\nSize: $size\\nType: $type\\nStored in: uploads/$name');</script>";
								?>
								
								<?php
							}
					
						?>
	
					<h4> Select a Video : </h4>
					<input name="UPLOAD_MAX_FILESIZE" value="20971520"  type="hidden"/>
					<input type="file" name="file" id="file" />
					
					<input type="submit" value="Click to Upload" />
			</form>
			</div>
     
  </div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Blog Area -->

  <div class="clearfix"></div>

 <!-- Start Footer bottom Area -->
<footer>
  <div class="footer-area">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="footer-content">
            <div class="footer-head">
              <div class="footer-logo">
                <h2><span>Edu</span>Learn</h2>
              </div>

              <p>You can contact through this.</p>
              <div class="footer-icons">
                <ul>
                  <li>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-google"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- end single footer -->
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="footer-content">
            <div class="footer-head">
              <h4>information</h4>
              <p>
                You can contect us.
              </p>
              <div class="footer-contacts">
                <p><span>Tel:</span> +919603881548</p>
                <p><span>Email:</span> gamil.com</p>
                <p><span>Working Hours:</span> 9am-5pm</p>
              </div>
            </div>
          </div>
        </div>
        <!-- end single footer -->
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="footer-content">
            <div class="footer-head">
              <h4>Instagram</h4>
              <div class="flicker-img">
                <a href="#"><img src="img/portfolio/1.jpg" alt=""></a>
                <a href="#"><img src="img/portfolio/2.jpg" alt=""></a>
                <a href="#"><img src="img/portfolio/3.jpg" alt=""></a>
                <a href="#"><img src="img/portfolio/4.jpg" alt=""></a>
                <a href="#"><img src="img/portfolio/5.jpg" alt=""></a>
                <a href="#"><img src="img/portfolio/6.jpg" alt=""></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-area-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="copyright text-center">
            <p>
              &copy; Copyright <strong>EduLearn</strong>. All Rights Reserved
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/venobox/venobox.min.js"></script>
<script src="lib/knob/jquery.knob.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/parallax/parallax.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script src="lib/appear/jquery.appear.js"></script>
<script src="lib/isotope/isotope.pkgd.min.js"></script>

<!-- Contact Form JavaScript File -->
<script src="contactform/contactform.js"></script>

<script src="js/main.js"></script>


</body>
</html>
