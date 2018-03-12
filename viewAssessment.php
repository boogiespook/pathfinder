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
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  
  
<?php
$details = array( "assessment" => $_REQUEST['assessment'], "customer" => $_REQUEST['customer'], "app" => $_REQUEST['app']) ;
$answers = array();
$questions = array();
$data = array();

$url = "http://pathfinderapp-pathfinder.6923.rh-us-east-1.openshiftapps.com/api/pathfinder/customers/" . $details['customer'] . "/applications/" . $details['app'] . "/assessments/" . $details['assessment'];
#print $url;
$res = file_get_contents($url);
$results = json_decode($res,true);
if (sizeof($results) > 0) {
foreach ($results['payload'] as $key => $value) {
	if (ctype_upper($key) && $key != "ASSMENTNAME" && $key != "NOTES" && $key != "BUSPRIORITY") {
    print "Key: $key; Value: $value<br />\n";
    array_push($questions, $key);
    array_push($answers, $value);  

 }
}
}

#print_r($questions);
#print_r($answers);
#var_dump($questions);
?>  
  
<script type="text/javascript" >
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawTopX);

function drawTopX() {


 var data = new google.visualization.DataTable();
      data.addColumn('string', 'Questions');
      data.addColumn('number', 'Score');
      data.addRows([
        ['ARCH', 3],
        ['DEPS', 1],
      ]);

      var options = {
        chart: {
          title: 'Assessment Results',
          subtitle: ''
        },
        axes: {
          x: {
            0: {side: 'top'}
          }
        },
        hAxis: {
          title: 'Time of Day'
        },
        vAxis: {
          title: ''
        }
      };

      var materialChart = new google.charts.Bar(document.getElementById('chart_div'));
      materialChart.draw(data, options);
    }
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
					<h1>Pathfinder </h1>
					<p>Assessment Results <i>(Very Much Work in Progress)</i></div>
			</section>

		<!-- Highlights -->
			<section class="wrapper">
				<div class="inner">
					<div class="highlights">



					</div>


    <div id="chart_div" style="width: 900px; height: 500px;"></div>


				</div>
			</section>


		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function(){
	
	$('#message').fadeIn('slow', function(){
               $('#message').delay(5000).fadeOut(); 
            });
            
    $("button").click(function(){
        $("#aaa").toggle();
    });
});
</script>


	</body>
</html>
