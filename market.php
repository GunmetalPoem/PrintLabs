
<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrintLabs</title>
    <link rel="icon" type="image/x-icon" href="img/printing-device.png">
</head>
<style>
 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Silkscreen&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Lexend&display=swap');

main {
    font-family: 'Poppins', sans-serif;
    
}

main, body {
    background: linear-gradient(#c1dad9 39%, #cdf5dc);
    background-color: #c5d6a6;
    background-attachment: fixed;
    overflow-x: hidden;
}

.gallery-links a div{
width: 235px;
height: 235px;
background-position: center;
background-repeat: no-repeat;
background-size: cover;
}

.gallery-links{
max-width: 90%;
}

.gallery-links .gallery-container{
display: flex;
max-width: 80%;
flex-wrap: wrap; 
flex-direction: row;
justify-content: space-around;
white-space: nowrap;
z-index: 100;


}

.tile {
position: relative;
z-index: 200;
padding: 1%;
border: 3px solid white;
border-radius: 5%;
text-decoration: none;
color: #7D387D;
margin-right: 50px;
margin-bottom: 100px;

}

.gallery-container a h3{
    font-size: 20px;
    font-weight: 700;
    color: #111;
    font-family: 'Poppins', sans-serif;

}

input, button {
    font-family: 'Poppins', sans-serif;
    display: flex;
    text-align: center;
    margin: auto;
    margin-top: 10px;

}

.gallery-upload{
    position: fixed;
    text-align: center;
    z-index: 20;
    top: 7%;
  right: 5%;
    color: #cc6108;
   
}

video{
  position: fixed;
  width: 40%;
  bottom: -2%;
  right: -5%;
  z-index: 0;
}

#logotitle{
    color: #ffffff;
    left: 3%;
    top: 3.5%;
    font-family: 'Silkscreen', cursive;
    font-size: 15px;
    position: relative;
    width: fit-content;
text-decoration: none;
  }



    </style>

<main>
<img id="icon" src="img/printing-device.png" alt="icon" width="32" height="32" style="position: absolute;  top: 3%;left: 1%;">

<?php
if (isset($_SESSION["badgecheck"])) {

    
    
 if ($_SESSION["badgecheck"] == 'creator'){
          echo "<a id='logotitle' href='cdashboard.php'><h2>PrintLabs Market</h2></a>";
     
        }

if ($_SESSION["badgecheck"] == 'printor'){
            echo "<a id='logotitle' href='pdashboard.php'><h2>PrintLabs Market</h2></a>";
          }

       


  }
?>
<section class="gallery-links">
    <div class="wrapper">
  <div class = "gallery-container">
 <?php
include_once 'includes/dbh2.inc.php';
$sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)){
    echo "SQL statement failed!";
} else{
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)){
        echo '<a class="tile" href="#">
<div style="background-image: url(img/gallery/'.$row["imgFullNameGallery"].');"></div>
<h3>'.$row["titleGallery"].'</h3>
<p>'.$row["descGallery"].'</p>
</a>';
    }
}


?>


</div>
</div>
</section>

<?php
if (isset($_SESSION["userid"])) {
echo '<div class="gallery-upload">
<h2>Upload.</h2>
<form action="includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
    <input type="text" name="filename" placeholder="File name">
    <input type="text" name="filetitle" placeholder="Printer/Creation title">
    <input type="text" name="filedesc" placeholder="Printlabs Username">
    <input type="file" name="file">
    <button type="submit" name="submit">Upload.</button>
    </form>';
}



?>
</div>
<video autoplay muted loop id="myVideo">
              <source src="img/market.mp4" type="video/mp4">
            </video> 
</main>

</html>