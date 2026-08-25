<?php
require_once 'header.php';
require_once 'connection.php';

if(!isset($_SESSION['auth'])){
    header('location:login.php');
}
?>

<h1>welcome: <?php echo $_SESSION['auth']['name']; ?></h1>
<hr>
<a href="logout.php">logout</a>














<?php
require_once 'footer.php';
?>