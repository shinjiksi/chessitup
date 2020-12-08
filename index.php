<?php include_once("header.php"); ?>

<?php
if (isset($_SESSION['username'])){
header("Location: home.php");

        }else{
        } ?>

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
