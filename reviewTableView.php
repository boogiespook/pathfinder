    <!DOCTYPE HTML>
<!--
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<?php
$custId = $_REQUEST['customer'];

?>
	<head>
		<title>Pathfinder</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />

    <script src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

    <script type="text/javascript">

    function sortReviewData(dataBoi) {
        //console.log("full data set ius ");
        // console.log(dataBoi);
        
        $(document).ready(function() {
        $('#reviewTable').DataTable( {
        data: dataBoi,
        retrieve: true,
        paging: false,
        columns: [
            { title: "Application Name" },
            { title: "Review Decision" },
            { title: "Effort Estimate" },
            { title: "Business Priority" },
            { title: "Work Priority" },

        ]
    } );
} );

    }

    

    function getReviews(){
        let customerId = '<?php print $custId; ?>';
        let url = "http://pathtest-pathfinder.6923.rh-us-east-1.openshiftapps.com/api/pathfinder/customers/" + String(customerId) + "/reviews";
        var xhttp = new XMLHttpRequest();
        // console.log(url);
        let data = null;
        let dataSet = []


        xhttp.open("GET", url, true);
        xhttp.setRequestHeader("Content-type", "application/json");
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                data = JSON.parse(this.responseText);
                console.log(data);
                for (let i = 0; i < data.length; i++){
                    dataSet.push([data[i]["AssessmentId"], data[i]["ReviewDecision"]["rank"], data[i]["WorkEffort"]["rank"], data[i]["BusinessPriority"], data[i]["WorkPriority"]]);
                }
            sortReviewData(dataSet);
            }
        }
        xhttp.send();

    }


    getReviews();


</script>


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



    <div class="table-responsive">  
    <section id="banner2">
        <div class="inner">
            <h1>Review Pane</h1>
            <p>Review and view the results of all assessments.</div>
    </section>


    <table id="reviewTable" class="display" width="100%"></table>

    </div>



		<!-- Scripts -->
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
         


	</body>
</html>
