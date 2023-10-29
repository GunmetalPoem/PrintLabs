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
        $recipientUID = $_SESSION["useruid"]; // Set recipient UID to logged-in user's UID

        if (isset($_POST["button1"])) {
            $message = "printor"; // Set message to "printer" if button 1 is clicked
        } elseif (isset($_POST["button2"])) {
            $message = "creator"; // Set message to "creator" if button 2 is clicked
        }

        // Update the message for the logged-in user
        $stmt = $conn->prepare("UPDATE users SET badge = ? WHERE usersUID = ?");
        $stmt->bind_param("ss", $message, $recipientUID);
        $stmt->execute();
        $stmt->close();
        header("location: ../login.php");
       
    } else {
        echo "You need to log in to choose your account type.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="./css/main.css" />
    <link
      href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css"
      rel="stylesheet"
    />
    <link rel="icon" type="image/x-icon" href="img/printing-device.png">
    <head>
    <title>PrintLabs</title>
</head>

    <style>
      /* FONTS */
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Silkscreen&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Lexend&display=swap');

  


body{
    background-color: #231632;
    overflow: hidden;   

}

.dash2{
display: flex;
justify-content: space-around;
/* border: 1px solid red; */
height: 40%;
z-index: -50;
}


.tile{
width: 25%;
height: 100%;
border: 2px solid #ffffff;
border-radius: 20%;;
backdrop-filter: blur(10px);
box-shadow: 0 0 40px rgba(255, 255, 255, 0.3);
background-color: #beada500;
padding: 10%;
box-shadow: #fff 40px;
color: #fff;

}

.text{
    font-size: 30px;
    font-family: 'Poppins', sans-serif;
    color: white;
    background-color: #23163200;
    border-style: none;
}
input{
 
  box-shadow: inset 0 0 0 0 #fc8b65;
  color: #ffffff;
  margin: 0 -.25rem;
  padding: 0 .25rem;
  transition: color .3s ease-in-out, box-shadow .3s ease-in-out;
  border-radius: 10%;
  padding: 10%;

}

input:hover{
    box-shadow: inset 300px 0 0 0 #ffffff;
  color: #231632;

}

#wizard{
    width: 20%;
    transform: translate(105%, 10%);
}

h1{
  
    text-align: center;
    font-size: 50px;
    color: #fff;    
    font-family: 'Poppins', sans-serif;
}

p{
    text-align: center;
    margin-bottom: 2%;
    font-weight: 100;
    margin-bottom: 3%;
    color: #fff;
    font-family: 'Poppins', sans-serif;

}

#logotitle{
    color: #ffffff;
    left: 3.5%;
margin-top: .5%;
    font-family: 'Silkscreen', cursive;
    font-size: 13px;
    position: absolute;
    width: fit-content;
    text-decoration: none;
  }

  h2{
    width: fit-content;
    margin-top: 0%;

  }

  #icon{
 position: relative;
  }

a:hover{
    background-color: red;
}

#quote{
    position: relative;
    transform: translate(118%, -170%);
    color: #bebebe;
    font-style: italic;
    width: 30%;
    font-weight: 100;
    text-align: center;
    font-family: 'Poppins', sans-serif;
}
</style>

<body>
 
    <h1>Choose Account Type.</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
 <p>*Once you choose your account type, you will be prompted to login one more time for verification*</p>
    <div class="dash2"> 
        <button class="tile"><input class="text" type="submit" name="button1" value="Printor"></button>
        
        <button class="tile"><input class="text" type="submit" name="button2" value="Creator"></button>
    </div>
    </form>
    <img src="../img/wizard.png" alt="wizard" id="wizard">
    <div id="quote">
       <blockquote>
        "Choose wisely, as there is no going back. I tried to make these buttons as far apart as possible."
        <br>
        <br>
        -Random Wizard
       </blockquote>
    
    </div>

</body>

</html>
