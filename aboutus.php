<?php 
//Emmet McDonagh - Web Applications Project May 2022. About us Page.

$title = 'About us'; //title

//Start session
session_start();
?>

<!doctype html>
<html lang="en">

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

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

 
<!--ADD STYLE TO THE ABOUT PAGE WITH CSS-->
<!--Code adapted from:https://www.w3schools.com/howto/howto_css_about_page.asp-->
<style>

body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: lightgray;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
 border: bold;   

}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: green;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
  
</style>
</head>
<body>

<div class="about-section" style="font-size:18px";>
  <h1>About Us</h1>
  <p>Refurbished and Used Mobile Phones, IPhones , iPads , Tablets, and Accessories at the Low Prices for sale in Dublin & Across Ireland. </p>
  <p>Used mobile phones, laptops and other devices. </p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <div class="container">
        <h2>John Doe</h2>
        <p class="title">Sales Department</p>
        <p>john@mobileplanet.com</p>
        <p><button class="button" style="font-size:18px";>Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <div class="container">
        <h2>Jane Doe</h2>
        <p class="title">Accounts Department</p>
        <p>jane@mobileplanet.com</p>
        <p><button class="button" style="font-size:18px";>Contact</button></p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <div class="container">
        <h2>Mike Ross</h2>
        <p class="title">Returns Department</p>
        <p>mike@example.com</p>
        <p><button class="button" style="font-size:18px";>Contact</button></p>
      </div>
    </div>
  </div>
</div>

</body>
</html>
<!--end of about us--> 