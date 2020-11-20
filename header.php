<?php session_start();?>
<link rel="stylesheet" href="style.css" />
<link rel="icon" type="image/png" href="favicon.png">
<div id="PageHeader">
        <a href="index.php" id="logo">ChessItUp</a>
      <ul id="HorizontalList">
        
        <?php
        if (isset($_SESSION['username'])){?>
        <li><span class="HeaderButton">Welcomeback,</span><a href="userinfo.php" id="user_info" class="HeaderButton"><?php echo $_SESSION['username']?></a></li>
        <li><a href="logout.php" class="HeaderButton">Logout</a></li>
        }

        <?php } ?> 
        
      </ul>
    </div>