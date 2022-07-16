 <!--Emmet McDonagh. Web Applications Project. May 2022. Code for Footer.-->
 
 <!--FOOTER-->
<footer class="page-footer" style="background-color: lightblue;"><hr>   
    				
	<div class="container">
		<ul class="description">
		<div class="row align-items-center justify-content-center">
			<div class="col">
				<li><img src="images\securepayment.png" width=55% class="img-fluid">
				</li>
			</div>
			<div class="col">
				<li><img src="images\fastdelivery.jpg" width=55% class="img-fluid">
				</li>
			</div>
			<div class="col">
				<li><img src="images\easyreturnsandexchanges.jpg" width=55% class="img-fluid">
				</li>
			</div>
			<div class="col">
				<li><img src="images\satisfaction.jpg" width=55% class="img-fluid">
				</li>
			</div>
		</div>	<!--div row-->
		</ul>
		<p class="text-center" style="font-family:Arial, Helvetica, sans-serif; color: white">  © 2022 Mobile Planet</p>
	</div><!--div container-->		
</footer>
<!--end of footer-->	

<!-- JavaScript --> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">

</script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script> 
<script>
<!--JS VALIDATE USERNAME-->
function validateForm() {
    var usn = document.forms["tab"]["username"].value;
	var x = document.forms[“tab”][“email”].value;
	var atpos = x.indexOf(“@”);
    var dotpos = x.lastIndexOf(“.”);
	
	if (usn == "") {
		alert("Email Address must be filled out");
		return false;
	}
	
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
		alert(“Please enter a valid email address.”);
		return false;
	}
}
</script>
<script>
<!--JS Adds or Decreases the quantity of items-->
	$(document).ready(function(){	
		$("#plus").click(function() {
		  var qty = $('#btn-qty').val(); 
		  qty = parseInt(qty);
		  qty = qty + 1; //Increments the quantity of item
		  $('#btn-qty').val(qty); // updates the value of the '#btn-qty' field
		});
		
		$("#minus").click(function() {
		  var qty = $('#btn-qty').val(); // retrieve the current value of the field '#btn-qty'
		  qty = parseInt(qty);
		  qty = qty - 1; // Decrease the value by 1
		  if(qty < 1) { // If the value is below one, it changes to one
			  qty = 1;
		  }
		  $('#btn-qty').val(qty); // updates the value of the '#btn-qty' field
		});
	})
</script>
<script>
<!--CHANGES USING DOM-->
document.getElementById("Flash Sale").style.font = "bold 80px Amatic SC, cursive"; <!--STYLE-->
document.getElementById("jumbotronLove").innerHTML = "Mobile Planet";<!--HTML-->
</script>
