<?php

$servername = "www.mzcet.in";
$username = "mzcetin1_techquest22";
$password = "Possible@123";
$dbName = "mzcetin1_techquest22";
$mysqli = new mysqli($servername, $username, $password, $dbName);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

$sql = " SELECT * FROM sympo ORDER BY id DESC ";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/Regsiter.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;600&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="./css/animationbackground.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
	<title>Mzcet</title>
      </head>

    <body>
	<section>
		<h1 class="text-center">Students</h1>
		<table class="table table-striped table-bordered">
		<thead class="thead-dark">	
			<tr>
				<th>Teamname</th>
				<th>MemberOne</th>
				<th>MemberTwo</th>
				<th>MemberThree</th>
				<th>Email</th>
				<th>College</th>
				<th>Mobileno</th>
				<th>Knowledgeblow</th>
				<th>Quizardry</th>
				<th>TechEcho</th>
				<th>CyberEthnicity</th>
				<th>Techvein</th>
				<th>Websitedesign</th>
				
			</tr>
			</thead>

			<?php
				// LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<td><?php echo $rows['teamname'];?></td>
				<td><?php echo $rows['memberone'];?></td>
				<td><?php echo $rows['membertwo'];?></td>
				<td><?php echo $rows['memberthree'];?></td>
				<td><?php echo $rows['youremail'];?></td>
				<td><?php echo $rows['collegename'];?></td>
				<td><?php echo $rows['phoneno'];?></td>
				<td><?php echo $rows['knowledgeblow'];?></td>
				<td><?php echo $rows['quizardry'];?></td>
				<td><?php echo $rows['techecho'];?></td>
				<td><?php echo $rows['cyberethnicity'];?></td>
				<td><?php echo $rows['techvein'];?></td>
				<td><?php echo $rows['websitedesign'];?></td>

			</tr>
			<?php
				}
			?>
		</table>
		<div class="d-flex justify-content-center mt-5">
		<div class="float-right">
        <a href="exportData.php" class="btn btn-h gradient-btn w-100 btn-block btn-lg"><i class="dwn"></i> Export</a>
        </div>
         </div>
	</section>

</body>

</html>
