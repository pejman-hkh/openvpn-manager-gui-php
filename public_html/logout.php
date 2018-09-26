<?
include '../login_header.php';

include '../bootstrap.php';
?>
  <body>
    <br />

    <div class="container">
<?
unset( $_SESSION['id'] );
unset( $_SESSION['agent'] );
?>
  <div class="alert alert-success">
    Logouted successfully
    <a href="<?=site_url?>login.php">Login again</a>
  </div>

<?
include '../login_footer.php';
?>

