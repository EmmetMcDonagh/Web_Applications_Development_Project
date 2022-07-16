<!--Emmet McDonagh- Web Applications Project May 2022. Header Page-->

<?php if(isset($_SESSION['user'])) { ?>

  <div class="col-md-12 top-menu"> Welcome <?php echo $_SESSION['user']; ?> |  <a href="logout.php"><i class="square"></i> Sign Out </a></div>
<?php } ?>

<!--NAVIGATION BAR-->
<!--Code taken from:http://www.dlxs.org/docs/12/class/text/textclasscss.html/-->
<!--Used code snippets- this displays different styles and for Navigation and Menus-->
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--ADD STYLE TO THE NAVIGATION BAR WITH CSS-->
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.header { 
  overflow: hidden; /* Lightblue background-color for Navigation Bar */
  background-color: lightblue;
  padding: 20px 10px;
}
.header a {   /* Font Size for Navigation Bar */
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 20px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 30px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: blue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
</style>
</head>
<body>

<div class="header">
  <a href="index.php" class="logo">Mobile Planet</a>
  <div class="header-right">
    <a class="active" href="index.php">Home</a>
	<a href="aboutus.php">About Us</a>
    <a href="items.php">Shop</a>
    <a href="login.php">Sign In</a>
	<a href="cart.php">Cart</a>
	 
		<?php // find out if there is an item added in the shopping cart
		if(isset($_SESSION['cart'])) {
			$arraycart = $_SESSION['cart'] ;
			if($arraycart) {
				echo '('.count($arraycart).')'; //show between brackets the number of items added to the shopping cart
			}	
		}
		?>
        
		</a>
  </div>
</div>

</body>
</html>
       
        </button>
      </li>
    </ul>
  </div>
  <!--div navbar--> 
</nav>
<!--end of navbar--> 