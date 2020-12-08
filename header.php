<?php session_start();?>
<link rel="stylesheet" href="style.css" />
<link rel="icon" type="image/png" href="favicon.png">
<div id="PageHeader">
        <a href="index.php" id="logo">ChessItUp

<img src="https://cdn.pixabay.com/photo/2013/07/12/12/03/chess-145184__480.png" width="280" height="125" title="Logo of a company" alt="Logo of a company" />

</a>
      <ul id="HorizontalList">
        
        <?php
        if (isset($_SESSION['username'])){?>
          <li><span class="HeaderButton">Welcomeback,</span>
            <a href="userinfo.php" id="user_info" class="HeaderButton">
              <?php echo $_SESSION['username']?>
            </a>
          </li>
        <li><a href="logout.php" class="HeaderButton">Logout</a></li>
        

        <?php } ?> 
        
      </ul>
    </div>

<html>
  <head>
    <title>ChessItUp</title>
     <script   src="https://code.jquery.com/jquery-3.5.1.min.js"   
                    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="   
                    crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    
 <script > 
 $(document).ready(function(){
   $("#log").click(function(){
  alert("welcomeback!"); });});
</script>

 <script > 
 $(document).ready(function(){
   $("#sign").click(function(){
  alert("Register now!"); });});
</script>

  </head>