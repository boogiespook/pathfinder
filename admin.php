<!DOCTYPE HTML>
<!--
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Pathfinder</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a class="logo" href="index.php">Pathfinder</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.php">Home</a></liadmin>
					<li><a href="admin.php">Admin</a></li>
					<li><a href="results.php">Results</a></li>
					<li><a href="generic.php">Survey</a></li>
				</ul>
			</nav>

		<!-- Banner -->
			<section id="banner2">
				<div class="inner">
					<h1>Pathfinder Admin</h1>
					<p>Create customers and create applications.</div>
			</section>

		<!-- Highlights -->
			<section class="wrapper">
				<div class="inner">
					<div class="highlights">



					</div>
					<table><thead><tr><td>Customer Name</td><td>Customer Details</td><td>Applications</td><td>Edit</td></tr></thead><tbody>
<?php
# Get customer details from mongo

$response = file_get_contents('http://pathfinderapp-pathfinder.6923.rh-us-east-1.openshiftapps.com/api/pathfinder/customers/');

#print_r(json_decode($response));
#var_dump($response);
foreach (json_decode($response,true) as $customer) {
print "<tr><td>" . $customer['CustomerName'] . "</td>";
$CustomerId = $customer['CustomerId'];
$CustomerDescription = $customer['CustomerDescription'];
print "<td>" . $CustomerDescription . "</td>";
print "<td>";
## Get all the apps for that client
$apps = file_get_contents("http://pathfinderapp-pathfinder.6923.rh-us-east-1.openshiftapps.com/api/pathfinder/customers/$CustomerId/applications/");
#print_r($apps);
foreach (json_decode($apps,true) as $app) {
print $app['Name'] . "<br>" ;
}
print '</td><td><img src="images/edit.png"></td>';
print "</tr>";
}
#print "Customer: " . $response[0]['CustomerName'];

?>
</tbody>
</table>

<button>Add New Customer</button>

				</div>
			</section>



		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	</body>
</html>
