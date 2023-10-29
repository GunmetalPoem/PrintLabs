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
$printerLink = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_SESSION["username"])) {
        $userUID = $_SESSION["useruid"];
        $printerName = $_POST["printerName"]; // Get the printer name from the form

        // Update the printerName column for the current user
        $stmt = $conn->prepare("UPDATE users SET printerName = ? WHERE usersUID = ?");
        $stmt->bind_param("ss", $printerName, $userUID);
        
        if ($stmt->execute()) {
            // Successfully updated printer name
            $printerLink = "https://" . $printerName . ".octoeverywhere.com/?#temp";
        } else {
            // Failed to update printer name
            echo "<p class='error'>Failed to update printer name: " . $conn->error . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p class='error'>You need to log in to update your printer name.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./css/main.css" />
    <link
      href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css"
      rel="stylesheet"
    />
    <title>PrintLabs</title>
    <link rel="icon" type="image/x-icon" href="img/printing-device.png">
    <style>
      /* FONTS */
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Silkscreen&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Lexend&display=swap');

    </style>
  </head>
  <style>


html,body {
    scroll-behavior:smooth;
    background-color: #acd3e6;
    overflow-y: hidden;
    overflow-x: hidden;
   }


.iFrameContent{
  position: absolute;
  width:75%;
  height:900px;
  top: -50px;
}

.iFrameContainer{
  position:relative;
  margin-left: 20%;
}

#linkInput{
  position:absolute;
  top: 20%;
  left:6%;
  font-family: 'Poppins', sans-serif;
}

#linker{
  position:absolute;
  top: 20%;
  left:1%;
  font-family: 'Poppins', sans-serif;
}

form{
  text-align: center;
  margin-top: 20%;
}

p{
  text-align: center;
}

#printerName{
font-size: large;
}

input{
  font-family: 'Poppins', sans-serif;
  text-align: center;
}


#ele{
  margin-left: 70%;
  margin-top: -10%;
}


/* CSS */
.button-74 {
  background-color: #fbeee0;
  border: 2px solid #422800;
  border-radius: 30px;
  box-shadow: #422800 4px 4px 0 0;
  color: #422800;
  cursor: pointer;
  display: inline-block;
  font-weight: 600;
  font-size: 18px;
  padding: 0 18px;
  line-height: 50px;
  text-align: center;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-74:hover {
  background-color: #fff;
}

.button-74:active {
  box-shadow: #422800 2px 2px 0 0;
  transform: translate(2px, 2px);
}

@media (min-width: 768px) {
  .button-74 {
    min-width: 120px;
    padding: 0 25px;
  }
}

#logotitle{
    color: #ffffff;
    left: 3%;
    top: 2%;
    font-family: 'Silkscreen', cursive;
    font-size: 15px;
    position: relative;
    width: fit-content;
text-decoration: none;
  }
/* INCLUD JAVA SCRIPT TO ASK PRINTOR FOR THE NAME OF THEIR PRINTER ON OCTOEVERYWHERE AND GENERATE THIS LINK FOR THEM TO CLICK https://PRINTERNAME.octoeverywhere.com/?#temp */
  </style>
  <img id="icon" src="img/printing-device.png" alt="icon" width="32" height="32" style="position: absolute;  top: 2%;left: 1%;">
  <a id='logotitle' href='pdashboard.php'><h2>PrintLabs Print Controls</h2></a>
  <body>
    


   <!-- Form for updating printer name -->
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

   
    <input type="text" id="printerName" name="printerName" placeholder="Your Printer Name" required>
    <br>
    <input style="margin-top: 1%;"  class="button-74" type="submit" value="Update Printer Name">
</form>
<?php if ($printerLink): ?>
    
    <p> <a style="margin-top: 1%;" target="_blank" class="button-74" href="<?php echo htmlspecialchars($printerLink); ?>">Click Here To View Controls.</a></p>
    
<?php endif; ?>
<img src="img/ele.gif" id="ele" alt="ele" width="30%">
  </body>
</html>