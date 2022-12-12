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
 
if($result->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "members-data_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('teamname','memberone','membertwo','memberthree','youremail','collegename','phoneno','knowledgeblow','quizardry','techecho','cyberethnicity','techvein','websitedesign'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($rows = $result->fetch_assoc()){ 
        
        $lineData = array($rows['teamname'], $rows['memberone'], $rows['membertwo'], $rows['memberthree'], $rows['youremail'], $rows['collegename'], $rows['phoneno'],$rows['knowledgeblow'],$rows['quizardry'],$rows['techecho'],$rows['cyberethnicity'],$rows['techvein'],$rows['websitedesign']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
 
?>