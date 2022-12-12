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
 
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "techquest_" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('teamname','memberone','membertwo','memberthree','youremail','collegename','phoneno','knowledgeblow','quizardry','techecho','cyberethnicity','techvein','websitedesign'); 

 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 
if($result->num_rows > 0){ 
    // Output each row of the data 
    while($rows = $result->fetch_assoc()){ 
        $lineData = array($rows['teamname'], $rows['memberone'], $rows['membertwo'], $rows['memberthree'], $rows['youremail'], $rows['collegename'], $rows['phoneno'],$rows['knowledgeblow'],$rows['quizardry'],$rows['techecho'],$rows['cyberethnicity'],$rows['techvein'],$rows['websitedesign']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;