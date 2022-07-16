<?php $title = ''; 

//Emmet McDonagh- Web Applications Project May 2022. Home/Index Page.
//Home page that contains a carousel and 4 recently added products/items.

//Initiate session
session_start();

session_destroy(); // Destroy session to be able to initiate new tests
?>

<!doctype html>
<html lang="en">

<!--HEAD-->
<?php
include("head.php"); // Include head's code
?>
<!--end of head-->

<body>

<!--HEADER-->
<?php
include("header.php"); //Include header's code
?>
<!--end of header-->

<!--Code adapted from:https://www.w3schools.com/bootstrap5/bootstrap_jumbotron.php/-->
<!--this displays a jumbotron-->

 <!--JUMBOTRON-->
  <div class="jumbotron">
  <h1 class="display-5">Mobile Planet! Cheapest Online Store for Used Mobile Phones, IPhones and other devices.</h1>
  <p class="lead">
  </p>
</div>
 <!--end of jumbotron-->
 
<!--CAROUSEL/SLIDESHOW--> 
<!--Code adapted from:https://www.w3schools.com/bootstrap5/bootstrap_carousel.php/-->
  <h2 class="text-center" id="Flash Sale" style="max-width:550px;"style="fontcolor: blue;">Flash Sale</h2><br><br>
	<div class="container-fluid"
		<div class="row align-items-left">
		<!-- Indicators -->
			<div class="col-md-8 offset-md-4">
			 <!-- Wrapper for slides -->
				<div id="myCarousel" class="carousel slide" data-ride="carousel" data-pause="hover">
              <!-- The slideshow/carousel -->
                        <div class="carousel-inner" role="listbox">
						<div class="carousel-item active">
							<a href="items.php"><img class="img-fluid" title="iPhone6" src="images\iphone6.jpg" width= "300px" alt="First slide"></a>
						</div>
						<div class="carousel-item">
							<a href="items.php"><img class="d-block img-fluid" title="Nokia 3310" src="images\3310blue.jpg" width= "300px"  alt="Second slide"></a>
						</div>
						<div class="carousel-item">
							<a href="items.php"><img class="d-block img-fluid" title="Samsung J5" src="images\j5.jpg" width= "300px"  alt="Third slide"></a>
						</div>
						<div class="carousel-item">
							<a href="items.php"><img class="d-block img-fluid" title="Samsung A12" src="images\samsunga12.jpg" width= "300px"  alt="Fourth slide"></a>
						</div>
						
	
					</div> <!--carousel-inner-->
				</div><!--carousel slide-->
			</div><!--column-->
		</div><!--row-->
	</div><!--container-fluid-->
<!--end of slideshow-->
  
 <!--FOOTER-->  
<?php
include("footer.php"); //Include footer's code
?>
<!---end of footer-->

</body>
</html>