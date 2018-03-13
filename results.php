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

		<script>
	  $( function() {
	    $( "#speed" ).selectmenu();

	    $( "#files" ).selectmenu();

	    $( "#number" )
	      .selectmenu()
	      .selectmenu( "menuWidget" )
	        .addClass( "overflow" );

	    $( "#salutation" ).selectmenu();
	  } );
	  </script>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a class="logo" href="index.php">Pathfinder</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

<?php
include("functions.php");
putMenu();
?>

		<!-- Banner -->
			<section id="banner2">
				<div class="inner">
					<h1>Pathfinder Results</h1>
					<p>Review and view the results of an assessment.</div>
			</section>

		<!-- Highlights -->
			<section class="wrapper">
				<div class="inner">
					<div class="highlights">
						<form action="">

  <fieldset>
    <label for="customer">Select a Customer</label>
    <select name="customer" id="customer">
			<?php
			## Get customer list as drop down
			$response = file_get_contents('http://pathtest-pathfinder.6923.rh-us-east-1.openshiftapps.com/api/pathfinder/customers/');
			foreach (json_decode($response,true) as $customer) {
			print "<option value=" . $customer['CustomerId'] . ">" . $customer['CustomerName'] . "</option>";
			}
			 ?>

    </select>
	</fieldset>
<br>
	<input type="submit" value="Get Results">

	</form>
	<?php
	if (isset($_REQUEST['customer']))
	{
	print "<a href=reviewTableView.php?customerId=" . $_REQUEST['customer'] . ">Pane View</a>";
	}
    ?>
	
	<?php
if (isset($_REQUEST['customer'])) {

print '<table><thead><tr><td>Application</td><td>Assessed?</td><td>Review</td></tr></thead><tbody>';
## Results go here
$cust = $_REQUEST['customer'];
$customerDetails = file_get_contents("http://pathtest-pathfinder.6923.rh-us-east-1.openshiftapps.com/api/pathfinder/customers/$cust");
#print_r($customerDetails);
$nn = json_decode($customerDetails,true);
#$name = $nn['CustomerName'];
#print "<h3>Results for $name</h3>";

## Get the apps and results.
$appsRaw = file_get_contents("http://pathtest-pathfinder.6923.rh-us-east-1.openshiftapps.com/api/pathfinder/customers/$cust/applications/");
$appsArr = json_decode($appsRaw,true);
foreach ($appsArr as $app) {
$appName = $app['Name'];
$appId = $app['Id'];
## Get number of Assessments
$assessments = file_get_contents("http://pathtest-pathfinder.6923.rh-us-east-1.openshiftapps.com/api/pathfinder/customers/$cust/applications/$appId/assessments/");
#print_r($assessments);
$ass = json_decode($assessments,true);

## Get the ranking and effort

$assResults = file_get_contents("http://pathtest-pathfinder.6923.rh-us-east-1.openshiftapps.com/api/pathfinder/customers/$cust/applications/$appId/");

print "<tr><td><a href=viewAssessment.php?app=" . $appId . "&assessment=" . $ass[0] . "&customer=" . $cust . ">" . $appName . "</a></td>";
if (sizeof($ass) > 0) {
print "<td class='messageGreen' id='messageGreen'>Yes</td>";
print "<td><a href=reviewAssessment.php?app=" . $appId . "&assessment=" . $ass[0] . "&customer=" . $cust . ">" . "<img src=images/review.png height=24px width=24px></td>";
} else {
print "<td class='messageRed' id='messageRed	'>No</td><td></td>";
}
print "</tr>";
}

print "	 </table>";

}

	 ?>
	 
					</div>
					
				</div>
				
			</section>



		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
         


	</body>
</html>
