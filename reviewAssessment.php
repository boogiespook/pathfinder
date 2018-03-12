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


  <h3>Overview</h3>
<div>  
<?php
# Get all the questions
$data = file_get_contents("http://pathtest-pathfinder.6923.rh-us-east-1.openshiftapps.com/api/static/questions") ;
$questions = json_decode($data,true);
#var_dump($questions);
$details = array( "assessment" => $_REQUEST['assessment'], "customer" => $_REQUEST['customer'], "app" => $_REQUEST['app']) ;
## get all the results for that assessment
$answersData = file_get_contents("http://pathtest-pathfinder.6923.rh-us-east-1.openshiftapps.com/api/pathfinder/customers/" . $details['customer'] . "/applications/" . $details['app'] . "/assessments/" . $details['assessment']);
$answers = json_decode($answersData, true);

$appRating = array("RED" => 0, "AMBER" => 0, "GREEN" => 0, "UNKNOWN" => 0);

$questionRating = array("RED" => "", "AMBER" => "", "GREEN" => "", "UNKNOWN" => "");


foreach ($questions as $question) {
$shortAspect = $question['id'];
$aspect = $question['aspect'];
$minimum = $question['minimum'];
$qAnswer = $answers['payload'][$shortAspect];
$metadata = array($question['metaData'][$qAnswer]);
$rating = $question['metaData'][$qAnswer]['rank'];

$appRating[$rating]++;

#print "Answer for $shortAspect is: " . $answers['payload'][$shortAspect] . "<br>";
#print "$aspect: " . $qAnswer . "  Rating: $rating<br>";
#print_r($metadata);
}

#print_r($appRating);
$chartData = json_encode($appRating);

## {text: "Red", count: "4"}
$bubbleData = '';
foreach ($appRating as $key => $value) {
#print "Key: $key <br>Value: $value <br>";
$bubbleData .= '{text: "' . $key . '", count: "' . $value . '"},'; 
}

#print "<br>Data: $bubbleData";
?>  
</div>  
  
<div class="bubbleChart"/></div>

<!-- <table>
<thead>
 <tr>
  <td>Question</td>
  <td>Assessment</td>
  <td>Rating</td>
 </tr> 
</thead> -->

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
  <script src="http://phuonghuynh.github.io/js/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="http://phuonghuynh.github.io/js/bower_components/d3/d3.min.js"></script>
  <script src="http://phuonghuynh.github.io/js/bower_components/d3-transform/src/d3-transform.js"></script>
  <script src="http://phuonghuynh.github.io/js/bower_components/cafej/src/extarray.js"></script>
  <script src="http://phuonghuynh.github.io/js/bower_components/cafej/src/misc.js"></script>
  <script src="http://phuonghuynh.github.io/js/bower_components/cafej/src/micro-observer.js"></script>
  <script src="http://phuonghuynh.github.io/js/bower_components/microplugin/src/microplugin.js"></script>
  <script src="http://phuonghuynh.github.io/js/bower_components/bubble-chart/src/bubble-chart.js"></script>
  <script src="http://phuonghuynh.github.io/js/bower_components/bubble-chart/src/plugins/central-click/central-click.js"></script>
  <script src="http://phuonghuynh.github.io/js/bower_components/bubble-chart/src/plugins/lines/lines.js"></script>
  <style>
    .bubbleChart {
      min-width: 400px;
      max-width: 500px;
      margin: 0 auto;
      float: left;
    }
  </style>
  
<script type="text/javascript" >
$(document).ready(function () {
  var bubbleChart = new d3.svg.BubbleChart({
    supportResponsive: true,
    //container: => use @default
    size: 600,
    //viewBoxSize: => use @default
    innerRadius: 600 / 3.5,
    //outerRadius: => use @default
    radiusMin: 50,
    //radiusMax: use @default
    //intersectDelta: use @default
    //intersectInc: use @default
    //circleColor: use @default
    data: {
      items: [
        <?php echo $bubbleData;  ?>
      ],
      eval: function (item) {return item.count;},
      classed: function (item) {return item.text.split(" ").join("");}
    },
    plugins: [
      {
        name: "central-click",
        options: {
          text: "Show Questions",
          style: {
            "font-size": "12px",
            "font-style": "italic",
            "font-family": "Source Sans Pro, sans-serif",
            //"font-weight": "700",
            "text-anchor": "middle",
            "fill": "white"
          },
          attr: {dy: "65px"},
          centralClick: function() {
            alert("Here are the questions ....");
          }
        }
      },
      {
        name: "lines",
        options: {
          format: [
            {// Line #0
              textField: "count",
              classed: {count: true},
              style: {
                "font-size": "28px",
                "font-family": "Source Sans Pro, sans-serif",
                "text-anchor": "middle",
                fill: "white"
              },
              attr: {
                dy: "0px",
                x: function (d) {return d.cx;},
                y: function (d) {return d.cy;}
              }
            },
            {// Line #1
              textField: "text",
              classed: {text: true},
              style: {
                "font-size": "14px",
                "font-family": "Source Sans Pro, sans-serif",
                "text-anchor": "middle",
                fill: "white"
              },
              attr: {
                dy: "20px",
                x: function (d) {return d.cx;},
                y: function (d) {return d.cy;}
              }
            }
          ],
          centralFormat: [
            {// Line #0
              style: {"font-size": "50px"},
              attr: {}
            },
            {// Line #1
              style: {"font-size": "30px"},
              attr: {dy: "40px"}
            }
          ]
        }
      }]
  });
});
</script>  


	</body>
</html>
