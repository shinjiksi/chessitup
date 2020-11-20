<?php include_once("header2.php"); ?>

  <body>
    <?php
    include_once("header.php");
    ?>

    <div id="wrapper">
      <div id="inner-div">
        <div>You will be Logged out</div>
      </div>
    </div>

    <?php
    include_once("footer.php");
    ?>
  </body>
</html>
<?php header("Location: logouthandler.php"); exit(); ?>