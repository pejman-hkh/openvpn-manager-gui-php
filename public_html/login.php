<?
include '../login_header.php';

include '../bootstrap.php';
?>
  <body>
    <br />

    <div class="container">

    <?php
    function action() {
      global $db;


      $fetch = $db->sql("SELECT id FROM user WHERE username = ? AND password = ? AND main = '1' ")->find_one([ $_POST['username'], md5($_POST['password']) ]);

      if( count( $fetch ) > 0 ) {

        $_SESSION['id'] = $fetch['id'];
        $_SESSION['agent'] = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

        flash( "Logined", 1 );
        header('Location: index.php');
        return;
      }
    
      return flash( "Login faild" );      
    }

    if( count( $_POST ) > 0 ) {
  
      action();
    }
    ?>

      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label  class="sr-only">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        <label class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
       <?/* <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>*/?>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

<?
include '../login_footer.php';
?>