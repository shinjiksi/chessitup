<?php include_once("header2.php"); ?>

<!-- <?php 
echo "connection check: ";

$host ='us-cdbr-east-02.cleardb.com';
$username = 'b2a49fd4defe3e';
$password = '56b54dd3';
$dbname = 'heroku_b9ac03e16c44415';
$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()){
    echo" cannot";
    exit();
}else echo"connected";
?> -->

  <body>
    <?php
    include_once("header.php");
    ?>

    <div id="wrapper">
        <a href="loginsignup.php" class="doubledivs">login or signup here</a>
      </div>
    </div>

    <?php
    include_once("footer.php");
    ?>
  </body>
</html>
