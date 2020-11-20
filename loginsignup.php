<?php
  session_start();
  require_once 'Dao.php';
?>

<?php include_once("header2.php"); ?>

  <body>
    <?php include_once("header.php"); ?>
    <div id="wrapper">
      <div id="inner-div">
        <div id="login" class="doubledivs">
          <label>Login</label>
          <?php
          //Error iteration for Signup
          foreach ($_SESSION['bad-login'] as $message) {
            echo "<div class='error'>{$message}</div>";
          }
          ?>
          
          <?php
          //Form Preset for Login
          $log_name = '';
          $log_pass = '';

          if(isset($_SESSION['login_attempt'])) {
          $log_name = $_SESSION['login_attempt']['login-username'];
          $log_pass = $_SESSION['login_attempt']['login-password'];
          }
          ?>
            
          <form method="POST" id="loginform" action="login_handler.php">
          <input type="text" value="<?php echo $log_name; ?>" id="login-username" name="login-username" placeholder="username. For test, enter 12345678">
          <input type="password" value="<?php echo $log_pass; ?>" id="login-password" name="login-password" placeholder="password. For test, enter 12345678">
          <input type="submit" value="Submit">
          </form>
        </div>

        <div id="signup" class="doubledivs">
          <label>Sign Up</label>
          <?php
          //Error iteration for Signup
          foreach ($_SESSION['bad-signup'] as $message) {
            echo "<div class='error'>{$message}</div>";
          }
          if(isset($_GET['signup_success'])){
          ?>
          <p class="success"><?php echo $_GET['signup_success'];
          ?>
          </p>
          <?php }
          ?>
          
          <?php
          //Form Preset for Signup
          $sign_email = '';
          $sign_name = '';
          $sign_pass = '';

          if(isset($_SESSION['submit_attempt'])) {
          $sign_email = $_SESSION['submit_attempt']['email'];
          $sign_name = $_SESSION['submit_attempt']['signup-username'];
          $sign_pass = $_SESSION['submit_attempt']['signup-password'];
          }
?>
          <form method="POST" id="signupform" action="signup_handler.php">
          <input type="text"     value="<?php echo $sign_name;   ?>" id="signup-username" name="signup-username" placeholder="username" value=<?php ?>>
          <input type="text"     value="<?php echo $sign_email;  ?>" id="email"           name="email"           placeholder="email address" value=<?php?>>
          <input type="password" value="<?php echo $sign_pass;   ?>" id="signup-password" name="signup-password" placeholder="password" value=<?php?>>
          <input type="submit" value="Submit" name="submit_attempt">
          </form>
        </div>
      </div>
    </div>
    
    <?php
    include_once("footer.php");
    ?>
  </body>
</html>
