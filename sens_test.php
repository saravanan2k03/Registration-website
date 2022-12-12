<?php
$servername = "www.mzcet.in";
$username = "mzcetin1_techquest22";
$password = "Possible@123";
$dbName = "mzcetin1_techquest22";
$Email = $_POST['email'];
$Phone = $_POST['phoneno'];
$colg = $_POST['collegename'];
$memberone = $_POST['memberone'];
$membertwo = $_POST['membertwo'];
$memberthree =$_POST['memberthree'];
$teamname = $_POST['teamname'];
$KnowledgeBowl=$_POST['check'];
$quizardry =$_POST['checkquiz'];
$techecho =$_POST['checkecho'];
$cyberethnicity =$_POST['checkcyber'];
$techvein =$_POST['checktech'];
$websitedesign =$_POST['checkwebsite'];

$hell = "saravanan7937@mountzion.ac.in";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

$qry = "delete from  sympo where youremail='&hell'";
$data = mysqli_query($conn,$qry);
if($data){
  echo"insert";
}
else{
  echo"err";
}
?>