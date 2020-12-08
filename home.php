<?php
session_start();
require_once 'Dao.php';
?>

<?php include_once("header.php"); ?>

  <body>
  
    <div id="wrapper">
      <div id="game" class="chesstext">
          chess match here
      </div>
     
      <div id="chat" class="chesstext">
          chat here
      </div>
    </div>

    <?php
    include_once("footer.php");
    ?>
    </div>
  </body>
</html>
