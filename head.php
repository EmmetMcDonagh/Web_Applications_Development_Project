<head>
<!--Emmet McDonagh- Web Applications Project May 2022. Home/Index Page-->

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

<style>
body, td, th {
	font-size: 1em;
}
<!--CREATE FOOTER WITH CSS-->
  .description {
 margin="auto";
 position="absolute";
	justify-content: center;
}
.description li {
	float: left;
	display: inline-block;
}
<!--Code adapted from:https://findbootstrapsnippets.com/bootstrap-templates/responsive-shopping-cart.html/-->
<!--CREATE SHOPPING CART TABLE WITH CSS-->
<!--SHOPPING CART-->
  .table>tbody>tr>td {
	vertical-align: middle;
}
.img-responsive {
	max-width: 100%;
}
.top-menu {
	text-align: right;
    padding: 3px 34px 3px 0;
	font-family: Arial, Helvetica, sans-serif;
    background-color: #e9ecef;

  }
  table#cart thead {
	  display: none;
  }
  table#cart tbody td {
	  display: block;
	  padding: .6rem;
	  min-width: 320px;
  }
  table#cart tbody tr td:first-child {
	  background: #333;
	  color: #fff;
  }
  table#cart tbody td:before {
	  content: attr(data-th);
	  font-weight: bold;
	  display: inline-block;
	  width: 8rem;
  }
  table#cart tfoot td {
	  display: block;
  }
  table#cart tfoot td .btn {
	  display: block;
  }
}
</style>
<title>Mobile Planet | <?php echo $title; ?></title>
</head>