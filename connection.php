<?php
if (isset($_POST['email'])) {
    if (isset($_POST['teamname']) && isset($_POST['phoneno']) &&
        isset($_POST['collegename'])) {

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
            $host = "db4free.net";
            $dbUsername = "mztechquest";
            $dbPassword = "abcd@123";
            $dbName = "mztechquest";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            echo "all";
        }
        else {
            $Select = "SELECT youremail FROM sympo_data WHERE youremail = ? LIMIT 1";
            $Insert = "INSERT INTO sympo_data (teamname,memberone,membertwo,memberthree,youremail,collegename,phoneno,knowledgeblow,quizardry,techecho,cyberethnicity,techvein,websitedesign)VALUES(?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?,?)";
            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $Email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("sssssssssssss", $teamname , $memberone , $membertwo , $memberthree , $Email , $colg , $Phone , $KnowledgeBowl , $quizardry , $techecho , $cyberethnicity , $techvein , $websitedesign);
                if ($stmt->execute()) {
               
                    header('location:Successfull.html');
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                header('location:someone.html');
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
   header('location:Error.html');
}
?>