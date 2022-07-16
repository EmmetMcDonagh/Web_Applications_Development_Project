<?php
//Emmet McDonagh- Web Applications Project May 2022. Cart page-->
//The shopping cart page that will populate all the items that have been added to cart, along with the quantities, total prices, and subtotal price.

$title = "cart"; // Title

//INCLUDE CONNECTION TO MYSQL DATABASE
include("config.php");

//Code adapted from: https://codeshack.io/shopping-cart-system-php-mysql/-->
//Adding an Item to the Cart
$cart = '';
$total = 0;
if(isset($_POST['update'])) {
	//Receives the items from items_db that have been checked for update
	$v_update = $_POST['item'];
		
	foreach($v_update as $key=>$value) { 
		if($value['amount'] <= 0) { 
			unset($_SESSION['cart'][$key]);
		}else {
			$_SESSION['cart'][$key]['amount'] = $value['amount']; // Updates the cost of the item in the session variable 'cart'
		}
	}
}//End of IF STATEMENT

//VERIFY IF DELETE OPTION WAS SELECTED
if(isset($_GET['delete'])) {
//GET RECEIVED ITEMS FOR EXCLUSION
	$delete = $_GET['delete'];
// REMOVE ITEMS FROM SHOPPING CART 
unset($_SESSION['cart'][$delete]);
}//End of IF STATEMENT

// If the user clicked the buy now button on the items page we can check for the form data
if(isset($_GET['add'])) {
	$v_prod = $_GET['add'];
	$cart = array();
	//CHECK ITEM DATA FROM MYSQL DATABASE
	$query_select = "SELECT * FROM items_db WHERE id = ".$v_prod; // sql query - product's table
	$select = mysqli_query($conn, $query_select); // Perform the query
	if($select) {
		$row = mysqli_fetch_array($select); //allocate the product's data in the variable $ row
		
		$cart = $_SESSION['cart'];
		//INCLUDE ITEM'S DATA IN THE SHOPPING CART MATRIX
		$cart[$row['id']]['id'] = $row['id'];
		$cart[$row['id']]['item_name'] = $row['item_name'];
		$cart[$row['id']]['image'] = $row['image'];
		$cart[$row['id']]['item_description'] = $row['item_description'];
		$cart[$row['id']]['item_price'] = $row['item_price'];
		$cart[$row['id']]['amount'] = 1;
		//RECORD ARRAY AT THE SESSION
		$_SESSION['cart'] = $cart;
	}
	//CHECK IF THE USER IS LOGGED IN
	if(!$_SESSION['logged']) {
		$redirect = "items.php"; //Page that user will be redirected to
		header("location:$redirect"); // Redirection
	}	
	
}
if(isset($_POST['item'])) {
	$v_item = $_POST['item'];
	$cart = array();
	//CHECK ITEMS'S DATA
	$query_select = "SELECT * FROM  WHERE id = ".$v_item; // sql query - item_db table
	$select = mysqli_query($conn, $query_select); // Execute the query
	if($select) {
		$row = mysqli_fetch_array($select); //allocate the items's data in the variable $ row
		
		//IF THERE ARE DATA ON THE CART, RECOVER THE SESSION VALUES FOR THE VARIABLE $ cart
		$cart = $_SESSION['cart'];
		//INCLUDE ITEMS'S DATA IN THE SHOPPING CART MATRIX
		$cart[$row['id']]['id'] = $row['id'];
		$cart[$row['id']]['item_name'] = $row['item_name'];
		$cart[$row['id']]['image'] = $row['image'];
		$cart[$row['id']]['item_description'] = $row['item_description'];
		$cart[$row['id']]['item_price'] = $row['item_price'];
		$cart[$row['id']]['amount'] = $_POST['amount'];
		//RECORD THE ARRAY OF THE SESSION
		$_SESSION['cart'] = $cart;
	}
}
//CHECK IF THE USER IS LOGGED IN
if(!$_SESSION['logged']) { // If the user is not logged in, redirect to login page
	$redirect = "login.php"; //Page that will be redirected
	header("location:$redirect"); // Redirection
}else { // If logged in, let user see the cart
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

  <!--JUMBOTRON-->
  <div class="jumbotron">
  <h1 class="display-5">Mobile Planet! Cheapest Online Store for Used Mobile Phones, IPhones and other devices.</h1>
  <p class="lead">
  </p>
</div>
 <!--end of jumbotron-->

<!--CREATE PAYMENT SUMMARY FORM USING CSS-->
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap; 
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%;
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%;
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; 
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {  /* Displays background color of light blue */
  background-color: lightblue;
  padding: 5px 20px 15px 20px;
  border: 1px solid black;
  border-radius: 3px;
}

input[type=text] {  /* Displays border style */
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: green;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 2px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 10px;
  }
}
</style>
</head>
<body>

 <!--TABLE CONTAINING INFO OF BILLING ADDRESS-->

<h2>Payment Summary Form</h2>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php"> <!--Use a <form> element to process the input-->
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Full Name">
            <label for="email"><i class="fa fa-envelope"></i> Email Address</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="14 Main Street">
            

            <div class="row">
              <div class="col-50">
                <label for="state">County</label>
                <input type="text" id="county" name="county" placeholder="Galway">
              </div>
              <div class="col-50">
                <label for="zip">EirCode</label>
                <input type="text" id="EirCode" name="zip" placeholder="H23H269">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" <a href="items.php"><img class="img-fluid" title="Visa" src="images\visa.png" width= "100px"></i>
              <i class="fa fa-cc-visa" <a href="items.php"><img class="img-fluid" title="Mastercard" src="images\mastercard.png" width= "80px"></i>
			  <i class="fa fa-cc-visa" <a href="items.php"><img class="img-fluid" title="Maestro" src="images\maestro.png" width= "80px";"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="23">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
        
      </form>
    </div>
  </div>
  
  <!--TABLE CONTAINING INFO OF THE ITEMS ADDED IN THE SHOPPING CART-->
    <div class="container">
      <h4>Cart <span class="price" style="color:black" ><i class="fa fa-shopping-cart"></i></span></h4>
<HTML>
<HEAD>
<TITLE>Shopping Cart</TITLE>
</HEAD>
<BODY>
<div id="shopping-cart">					
<table class="cart" cellpadding="10" cellspacing="2" style="border:bold">
<tbody>
<tr>
<th style="text-align:left;">Item Name</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="5%">Sub Total</th>
</tr>	
    </div>
  </div>
</div>

                    <form action="cart.php" method="post">
                    <input type="hidden" name="update" value="1">

                    <?php
                    if(isset($_SESSION['cart'])) { 
					$cart = $_SESSION['cart'];
					$total = 0;
					foreach($cart as $key => $value) {
						$total += ($value['item_price']*$value['amount']);
					?>
	
	
						<tr>
							<td data-th="Items"> <!--ROW WITH ITEMS'S DATA-->
								<div class="row">
									<div class="col-sm-2 hidden-xs"><img src="<?php echo $value['image']; ?>" alt="<?php echo $value['item_name']; ?>"  class="img-responsive"/></div>
									<div class="col-sm-10">
										<h4 class="nomargin" style="font-family: Arial, Helvetica, sans-serif; color:Blue; font-weight:bold;"><?php echo $value['item_name']; ?></h4>
										<p style="font-family:'Open Sans Condensed', sans-serif;"><?php echo $value['item_description']; ?></p>
									</div>
								</div>
							</td>
							<td data-th="Quantity">
								<input type="number" style="font-family: Arial, Helvetica, sans-serif;" name="prod[<?php echo $key;?>][amount]" class="form-control text-center" value="<?php echo $value['amount']; ?>">
							</td>
							<td data-th="Price" style="font-family: Arial, Helvetica, sans-serif; color:black;">€ <?php echo number_format($value['item_price'], 2, '.', ''); ?></td>
							
							<td data-th="Subtotal" class="text-center" style="font-family: Arial, Helvetica, sans-serif;">€ <?php echo number_format(($value['item_price']*$value['amount']), 2, '.', ''); ?></td>
							<td class="actions" data-th="">
								
								<a href="cart.php?delete=<?php echo $key;?>"><img src="images/delete.png" width="40" height="40" alt=""/></a>								
							</td>
						</tr>
                    
					<?php } 
					}
					?>
                    
					</form>
				<!--end of cart's session containg information about the items added into the Shopping Cart-->
					</tbody>
					<tfoot>
						<tr><!--BUTTONS-->
					      	
							<td  style= "font-family: Arial, Helvetica, sans-serif;"><a href="items.php" class="btn primary btn-sm" style="padding:25px 60px"><i class="left" rowspan="7"></i> Continue Shopping</a></td>
							<td style="font-family: Arial, Helvetica, sans-serif;"><a href="#" class="btn primary btn-sm" style="padding:25px 30px" >Proceed to Checkout <i class="right"></i></a></td>
							<tr><td colspan="1" align="right">Total:</td>
							<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total, 2); ?></strong></td>
							<td></td>
						</tr>
					</tfoot>
				</table>
					<!--end of table-->
    </div>
   </div>
</div>
<br><br>

<!--FOOTER-->
<?php
	mysqli_close($conn); //Close connection to MYSQL database
?>
<!--end of footer-->

 </body>
</html>
        
<?php
}
?>