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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_SESSION["username"])) {
        $senderUID = $_SESSION["username"];
        $recipientUID = $_POST["recipientUID"];
        $message = $_POST["message"];

        // Check if the recipient exists in the table
        $stmt = $conn->prepare("SELECT message FROM users WHERE usersUID = ?");
        $stmt->bind_param("s", $recipientUID);
        $stmt->execute();
        $stmt->bind_result($recipientMessage);
        $stmt->fetch();
        $stmt->close();

        if ($recipientMessage === "Nothing here") {
            // Recipient exists and their message is "Nothing here", update the message
            $stmt = $conn->prepare("UPDATE users SET message = ? WHERE usersUID = ?");
            $stmt->bind_param("ss", $message, $recipientUID);
            $stmt->execute();
            $stmt->close();

            // Handle uploaded STL file
            if (isset($_FILES["stlFile"]) && $_FILES["stlFile"]["error"] === UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["stlFile"]["tmp_name"];

                if (is_uploaded_file($tmp_name)) {
                    $stl_data = file_get_contents($tmp_name);

                    if ($stl_data) {
                        $stmt = $conn->prepare("UPDATE users SET stl = ? WHERE usersUID = ?");
                        $stmt->bind_param("ss", $stl_data, $recipientUID);
                        $stmt->execute();
                        $stmt->close();
                        echo "<p class='error'>STL file saved and message sent successfully.</p>";
                    } else {
                        echo "<p class='error'>Failed to read the STL file data.</p>";
                    }
                } else {
                    echo "<p class='error'>Invalid file upload.</p>";
                }
            } else {
                echo "<p class='error'>No STL file uploaded but text message has been sent.</p>";
            }
        } else {
            // Recipient does not have the message set to "Nothing here", handle the error
            echo "<p class='error'>Recipient is not available for messaging.</p>";
        }
    } else {
        echo "<p class='error'>You need to log in to send messages.</p>";
    }
}
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
    background-color: #ded5cd;
    overflow: hidden;
  }

  .error {
    font-family: 'Poppins', sans-serif;
    color: #2350c2;
    position: fixed;
    z-index: -100;
    top: 90%;
    width: 100%;
text-align:center;
  }

form {
 
  color: aliceblue;
  position: relative;
  width: fit-content;
margin: auto;
}

h1{
  color: aliceblue;
}

a{
  text-decoration: none;
}

h2 {
  color: #ffffff;
 position: relative;
 left: 2.5%;
 margin-top: 1.8%;
 width: fit-content;
 z-index: 400;
 font-size: 20px;
font-family: 'Silkscreen', cursive;
}

form{
    height: 65%;
    width: 700px;
    background-color: rgba(255, 255, 255, 0.02);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.6);

    padding: 50px 35px;
}

form *{
    font-family: 'Poppins',sans-serif;
    color: #46312b;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    margin: 0;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
    font-family: 'Poppins', sans-serif;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 14px;
    font-weight: 500;
    margin-bottom: 2%;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: -10px;
    font-size: 12px;
    font-weight: 300;
    background-color: rgba(0, 0, 0, 0.123);
    color: #000000;

}

.button{
    margin-top: 10px;
    width: 100%;
    background-color: #f17147;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}

textarea {
  width: 100%;
  justify-content:center ;
  height: 40%;
  color: #f9f9f9;
  resize: none;
  background-color: rgba(0, 0, 0, 0.123);

  margin-bottom: -2%;
 
}

::placeholder {
    color: #a09a95;
    
}


video{
  margin-top: 20%;
  width: 40%;
  transform: translate(175%,-10%);
}

</style>

<head>
    <title>Messaging System</title>
</head>

<body>
 
<img id="icon" src="../img/printing-device.png" alt="icon" width="32" height="32" style="position: absolute; z-index: -1; top: 3%;left: 1%;" >

<?php
if (isset($_SESSION["badgecheck"])) {

    
    
 if ($_SESSION["badgecheck"] == 'creator'){
          echo "<a id='logotitle' href='../cdashboard.php'><h2>PrintLabs Creator</h2></a>";
     
        }

if ($_SESSION["badgecheck"] == 'printor'){
            echo "<a id='logotitle' href='../pdashboard.php'><h2>PrintLabs Printor</h2></a>";
          }

       


  }
?>



    

    <video autoplay muted loop id="myVideo">
      <source src="../img/Astro.mp4" type="video/mp4">
    </video> 
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
      <h3>Message.</h3>
        <label for="recipientUID">Recipient's Username</label>
        <input type="text" name="recipientUID" placeholder="Type in their username, CASE SENSITIVE">
        <br>
        <textarea name="message" placeholder="Type your message to the creator, regarding problems, updates, anything!"></textarea>
        <br>
        <label for="stlFile">STL File (In case you want to send something back):</label>
        <input type="file" name="stlFile" id="stlFile">
        <br>
        <input class="button" type="submit" value="Send">
    </form>

</body>

</html>

<?php
$conn->close();
?>

