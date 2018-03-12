<?php
function putMenu() {
print '		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.php">Home</a></liadmin>
					<li><a href="http://pathfinderapp-pathfinder.6923.rh-us-east-1.openshiftapps.com/" target=_blank>Survey</a></li>
					<li><a href="results.php">Results</a></li>
					<li><a href="admin.php">Admin</a></li>
					<li><a href="credits.php">Credits</a></li>
				</ul>
			</nav>';

}

function getCustomerName($custId) {
$customerDetails = file_get_contents("http://pathfinderapp-pathfinder.6923.rh-us-east-1.openshiftapps.com/api/pathfinder/customers/$custId");
$nn = json_decode($customerDetails,true);
$name = $nn['CustomerName'];
print $name;
}
?>