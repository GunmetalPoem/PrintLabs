
<?php 
session_start();
?>

<!DOCTYPE html>

<link
      href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css"
      rel="stylesheet"
    />
    <title>PrintLabs</title>
    <link rel="icon" type="image/x-icon" href="../img/printing-device.png">
<html>

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Silkscreen&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Lexend&display=swap');

  
body{
    background-color: black;
    overflow: hidden;
}

video{
    transform: translate(110%, 40%);
    width: 50%;
    z-index: 0;
    margin-top: 5%;
}

.mail{
    position: absolute;
    border: #AB2346 8px dotted;
    width: 50%;
    height: 70%;
    z-index: 100;
    margin-left: 8%;
    margin-top:-39%;
    transform: rotate(4deg);
    background-color:#FFFBEB;
    border-radius: 10%;
}
.mail2{
    position: absolute;
    border: #BFBCB0 8px solid;
    width: 50%;
    height: 70%;
    z-index: 90;
    margin-left: 8%;
    margin-top:-38%;
    transform: rotate(8deg);
    background-color:#D5D1C4;
    border-radius: 10%;
}

p{
    z-index:200;
    color: black;
    margin-top: -30%;
    margin-left: 12%;
    position:fixed;
    transform: rotate(4deg);
    font-family: 'Poppins', sans-serif;
    
}

.title{
    font-size: 20px;
    color: #333753;
   width: 45%;
   height: 30%;
   
}

.button{
    margin-top: 29%;
    margin-left: -38%;
 position: fixed;
 z-index:210;
 transform: rotate(4deg);
 text-decoration: none;
    font-family: 'Poppins', sans-serif;
    color:  #533E2D;
    border: 1.5px solid #533E2D;
  border-radius: 0.75rem;
  padding: 0.75rem 1.25rem;
  transition: all 0.3s ease-in-out;

}

.clear{
    margin-top: -12%;
    margin-left: 22%;
 position: fixed;
 z-index:110;
 transform: rotate(4deg);
    font-family: 'Poppins', sans-serif;

}

#logotitle{
    color: #ffffff;
    left: 3%;
    top: -3.5%;
    font-family: 'Silkscreen', cursive;
    font-size: 15px;
    position: relative;
    width: fit-content;
text-decoration: none;
}
</style>
<head>
    <title>Messaging System</title>
</head>
<img id="icon" src="../img/printing-device.png" alt="icon" width="32" height="32" style="position: fixed; z-index: 600; top: 2%;left: 1%;" >
<?php
if (isset($_SESSION["badgecheck"])) {

    
    
 if ($_SESSION["badgecheck"] == 'creator'){
          echo "<a id='logotitle' href='../cdashboard.php'><h2>PrintLabs Inbox</h2></a>";
     
        }

if ($_SESSION["badgecheck"] == 'printor'){
            echo "<a id='logotitle' href='../pdashboard.php'><h2>PrintLabs Inbox</h2></a>";
          }

       


  }
?>

<body>
<div class="mail">

    
</div>
<div class="mail2">
    
</div>
<video autoplay muted loop id="myVideo">
              <source src="../img/airplane.mp4" type="video/mp4">
            </video> 
        

            <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "printlabslogin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION["useruid"])) {
    $usersUID = $_SESSION["useruid"];

    $stmt = $conn->prepare("SELECT message, stl FROM users WHERE usersUID = ?");
    $stmt->bind_param("s", $usersUID);
    $stmt->execute();
    $stmt->bind_result($message, $stl_data);
    $stmt->fetch();

    if ($message) {
        echo "<p class='title'>Order Info: <br> " . $message . "</p>";
    } 
    
    else {
        echo "<p>Nothing here.</p>";
    }

    if ($stl_data) {
        
        echo "<a class='button' href='data:application/octet-stream;base64," . base64_encode($stl_data) . "' download='file.stl'>Download STL</a>";
    } else {
        echo "<p>No STL file available.</p>";
    }

    $stmt->close();

    echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>";
    echo "<input type='hidden' name='changeMessage' value='true'>";
    echo "<button class='clear' type='submit'>Clear Requests</button>";
    echo "</form>";

    // Handle changing the message to "null"
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["changeMessage"])) {
        $stmt = $conn->prepare("UPDATE users SET message = 'Nothing here' WHERE usersUID = ?");
        $stmt->bind_param("s", $usersUID);
        $stmt->execute();
        $stmt->close();

        // Redirect to the current page to update the displayed message

        exit();
    }
} else {
    echo "You need to log in to view messages.";
}

$conn->close();
?>

</body>

</html>


