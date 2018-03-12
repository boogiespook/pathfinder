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
					<p>Assessment Review for <?php getCustomerName($_REQUEST['customer']); ?> </div>
			</section>

		<!-- Highlights -->

				<div class="inner">
					<div class="highlights">

					</div>

<div id="leftReviewPane">
<h3>Assessment</h3>
<!-- <table>
<thead>
 <tr>
  <td>Question</td>
  <td>Assessment</td>
  <td>Rating</td>
 </tr> 
</thead> -->
<?php
# Get all the questions
$data = file_get_contents("http://pathfinderapp-pathfinder.6923.rh-us-east-1.openshiftapps.com/api/static/questions") ;
$questions = json_decode($data,true);
#var_dump($questions);
$details = array( "assessment" => $_REQUEST['assessment'], "customer" => $_REQUEST['customer'], "app" => $_REQUEST['app']) ;
## get all the results for that assessment
$answersData = file_get_contents("http://pathfinderapp-pathfinder.6923.rh-us-east-1.openshiftapps.com/api/pathfinder/customers/" . $details['customer'] . "/applications/" . $details['app'] . "/assessments/" . $details['assessment']);
$answers = json_decode($answersData, true);


#var_dump($answers);
#print "Answers <br>";
#echo json_encode($answers['payload'], JSON_PRETTY_PRINT);

$red = $amber = $green = 0;




foreach ($questions as $question) {
#print "<tr><td>" . $question['aspect'] . "</td><td></td><td></td></tr>";
$shortAspect = $question['id'];
#$metaData = array($question['metaData']);

print "Answer for $shortAspect is: " . $answers['payload'][$shortAspect] . "<br>";
#print "Short Name: $shortAspect <br>";
#print_r($metaData);
#print "<br><br>";
}

?>
<!-- </table> -->
</div>

<div id="rightReviewPane">
<h3>Architect Review</h3>
<br>
<p>Please use this section to provide your assessment of the possible migration/modernisation plan and an effort estimation.

<form action="#" id="myForm" method="post">
<h4>Proposed Action </h4>
<select name="proposedAction" id="vertical">
<option value="Rehost">Re-host</option>
<option value="Replatform">Re-platform</option>
<option value="Refactor">Refactor</option>
<option value="Repurchase">Repurchase</option>
<option value="Retire">Retire</option>
<option value="Retain">Retain</option>
</select>
<br>
<h4>Effort Estimate</h4>
<select name="effortEstimate" id="effortEstimate">
<option value="Small">Small</option>
<option value="Medium">Medium</option>
<option value="Large">Large</option>
<option value="ExtraLarge">Extra Large</option>
</select> 
<input type="hidden" name="status" value="reviewSubmitted" /> 
<br>
<input type="submit" value="Submit Review">
</form>


</div>

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
