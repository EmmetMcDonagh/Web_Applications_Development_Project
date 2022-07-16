<?php
//Emmet McDonagh- Web Applications Project May 2022. Login page
$title = "Login"; // Title

// Include configuration page to connect with mysql database
include("config.php");

//  Verify if is possible to login
if(!empty($_POST)) {
	$action = $_POST['action'];
	if($action == 'login') { // If the 'action' is Login
		//Verify the username and password
		if($_POST['username'] and $_POST['password']) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			// Verify the username typed in the database
			$query_select = "SELECT * FROM users_db WHERE username = '$username' AND password = '$password'"; // Query to MYSQL database to check the username
			$select = mysqli_query($conn,$query_select); // Send the query to database
			if (mysqli_num_rows($select) > 0) { // Check if there is any line returned from query
				$usrArray = mysqli_fetch_assoc($select); // If there is any result returned from query, the results goes into an array
				// Create the customer's session
				$_SESSION['logged'] = true;
				$_SESSION['user'] = $usrArray['username'];
				$redirect = "items.php"; // Website page that will be redirect
				header("location:$redirect"); // Redirection
			} else { // If there is no error message 
				echo "<script language='javascript' type='text/javascript'>alert('Incorrect login or password');</script>";
			}
		} else { // If there is an error when the customer tries to login
				echo "<script language='javascript' type='text/javascript'>alert('Enter your username and password');</script>";
		}
	
				  }
				}
			  
mysqli_close($conn); // Close the connection with database

?>
<!doctype html>
<html lang="en">

<!--HEAD-->
<?php
include("head.php"); // include the head code
?>
<!--end of head-->

<body>

<!--HEADER-->
<?php
include("header.php"); //include the header code
?>
<!--end header-->

  <!--JUMBOTRON-->
  <div class="jumbotron">
  <h1 class="display-5">Mobile Planet! Cheapest Online Store for Used Mobile Phones, IPhones and other devices.</h1>
  <p class="lead">
  </p>
</div>
 <!--end of jumbotron-->
  
 <!--LOG IN-->
 <title> Login Page </title>  
 <style>   
 Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: lightred;  
}  
button {   
       background-color: black;   
       width: 100%;  
        color: orange;   
        padding: 15px;   
        margin: 10px 0px;   
        border: bold;   
        cursor: pointer;   
         }   
 input[type=text], input[type=password] {   
        width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid green;   
        box-sizing: border-box;  
        border: bold;   
		
    }  
 button:hover {   
        opacity: 0.7;   
    }   
  .cancelbtn {   
        width: auto;   
        padding: 10px 18px;  
        margin: 10px 5px;  
    }   
        
     
 .container {   
        padding: 17px;   
        background-color: lightblue;  
    }  
 }   
</style>   	
</head>    
<body>    
    <center> <h1>  Login Form </h1> </center>   <body>    
<div class="container">
  <div class="row">
    <div class= "col-md-12">
      <div class="span14">
        <div class="" id="login">
          <div class="modal-body">
            <div class="well"> 
              <!--nav login-->    
                <br>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade show active" id="login" role="tabpanel"> <br>
                  <!--MODAL LOGIN FORM-->
                  <form action="login.php" method="POST" class="form-horizontal" id="login">
                    <fieldset>
                      <div id="legend">
                        <legend class="" style="font-family:font-family: Arial, Helvetica, sans-serif;font-weight:bold; font-size:22px;">Sign in</legend>
                      </div>
                      <br>
                      <div class="control-group"> 
                        <!-- Username -->
                        <label class="control-label"  for="username" style="font-family: Arial, Helvetica, sans-serif; font-size:22px;">Email Address</label>
                        <div class="controls">
                          <input name="username" type="text" required class="input-large" id="username" placeholder="Email Address">
                          <input name="action" value="login" type="hidden">
                        </div>
                      </div>
                      <br>
                      <div class="control-group"> 
                        <!-- Password-->
                        <label class="control-label" for="password" style="font-family: Arial, Helvetica, sans-serif;  font-size:22px;">Password</label>
                        <br>
                        <div class="controls">
                          <input name="password" type="password" required class="input-large" id="password" placeholder="Password">
                        </div>
                      </div>
                      <br>
                      <div class="control-group"> 
                        <!-- Login Button -->
                        <div class="controls">
                          <button class="btn btn-primary btn-lg" style="background-color: green; role="button">Sign in</button>
                        </div>
                      </div>
                    </fieldset>
                  </form>
                  <!--end login form--> 
                </div>
                <br>
              </div>
              <!--div myTabContent--> 
            </div>
            <!--div well--> 
          </div>
          <!--div modal-body--> 
        </div>
        <!--div loginModal--> 
      </div>
      <!--div span12--> 
    </div>
    <!--div col-->
    <div class="col-md-8"> <br>
      <br>
	</div><!--div col-->
</div><!--div row-->
</div><!--div container-->
 </div>   
    </form>     
</body>     
</html>  

<!--FOOTER-->
<?php
include("footer.php"); // include the footer's code
?>
<!--end of footer-->

</body>
</html>