<?php
// Emmet McDonagh. Web Application Project May 2022.  Page which displays Items.

$title = "Items"; //Title

// Include code to connect to database
include("config.php");

// Execute the query in the items database
$query_select = "SELECT * FROM items_db ORDER BY id ASC"; // Query sql - table of items
$select = mysqli_query($conn, $query_select); // Execute the query
?>

<!doctype html>
<html lang="en">

<!--HEAD-->
<?php
include("head.php"); // Include the head's code
?>
<!--end of head-->

<body>

<!--HEADER-->
<?php
include("header.php"); //Include the header's code
?>
<!--end of header-->

 <!--JUMBOTRON-->
  <div class="jumbotron">
  <h1 class="display-5">Mobile Planet! Cheapest Online Store for Used Mobile Phones, IPhones and other devices.</h1>
  <p class="lead">
  </p>
</div>
 <!--end of jumbotron-->
 

<!--LIST OF ITEMS-->
<div class="container">
    <div class="row">
   
   <?php
	// iterate through the items database
		while($row = mysqli_fetch_assoc($select))
    	{
	?>
  
   <!--ITEMS-->
    <!--LOG IN-->
 
</style>   	
        <div class="col-md-4">
              <div class="thumbnail">
                 <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['item_name']; ?>" class="img-fluid">
                <div class="caption">
                  <h4 class="pull-right" style="font-family: Arial, Helvetica, sans-serif; color:Black; font-weight:bold; font-size:26px;">€<?php echo number_format($row['item_price'], 2, '.', ''); ?></h4>
                  <h4><a href="products-details.php?id=<?php echo $row['id']; ?>" style="font-family: Arial, Helvetica, sans-serif; color: blue; font-weight:bold; font-size:30px;"><?php echo $row['item_name']; ?></a></h4>
                  <p style="font-family: Arial, Helvetica, sans-serif; font-size:18px;"><?php echo $row['item_description']; ?></p>
                </div><!--div caption-->
				<br>
				<!--BUTTONS-->
                <div class="btn-group text-center">
					<button type="button" class="btn btn-primary" style="background-color: green;" style="font-family: Arial, Helvetica, sans-serif;"><i class="fashopping-cart"></i><a href="cart.php?add=<?php echo $row['id']; ?>" style="color:#fff;"> Add To Shopping Cart</a></button>
                </div><!--div btn group-->
               </div><!--div-->
            </div> <!--div col-md-4-->
 
 <?php
	}
	?>

    </div><!--div row-->
</div><!--div container-->
<br><br>

<!--FOOTER-->
<?php
include("footer.php"); //Include footer's code
//end of footer

mysqli_close($conn); //Close connection to database
?>

</body>
</html>