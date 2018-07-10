<?php

$servername = "eagle";
$username = "wipsys";
$password = "wipsys";
$dbname = "QuoSys";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//
//  change to desired criteria for number of quote files to dump
//
$sql = "SELECT id, filename , filetype FROM tbl_quoteinfo WHERE id > 4000";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. "\n\r";
        $id = $row["id"];
        $filename = $row["filename"];
        $filetype = $row["filetype"];
        if (strpos($filetype, 'pdf')) {
            $newname = $id.'.pdf';
        } elseif (strpos($filetype, 'tif')) {
            $newname = $id.'.tif';
        } elseif (strpos($filetype, 'jp')) {
            $newname = $id.'.jpeg';            
        } else {
            $newname = $id;
        }
        $sql = "SELECT filename, filecontent, filetype FROM tbl_quoteinfo WHERE id=$id";
        $image = $conn->query($sql)->fetch_assoc();
        // echo $image['filecontent'];
        file_put_contents ( $newname, substr($image['filecontent'],0));
    }
    $conn->close();
    exit(0);
} else {
    echo "0 results";
}

$conn->close();
