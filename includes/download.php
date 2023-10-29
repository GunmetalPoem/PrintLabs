<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "printlabslogin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET["file"]) && $_GET["file"] === "stl") {
    if (isset($_SESSION["useruid"])) {
        $usersUID = $_SESSION["useruid"];
        
        $stmt = $conn->prepare("SELECT stl FROM users WHERE usersUID = ?");
        $stmt->bind_param("s", $usersUID);
        $stmt->execute();
        $stmt->bind_result($stlData);
        $stmt->fetch();
        
        if ($stlData) {
            header("Content-Type: application/octet-stream");
            header("Content-Disposition: attachment; filename=file.stl");
            echo $stlData;
        } else {
            echo "STL file not found.";
        }
        
        $stmt->close();
    } else {
        echo "You need to log in to download the STL file.";
    }
}

$conn->close();
?>
