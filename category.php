<?php
require_once 'header.php';
require_once 'connection.php';

if(!isset($_SESSION['auth'])){
    header('Location: login.php');
}
if(!empty($_POST)){
    $name = $_POST['name'];
    $sql = "INSERT INTO category (name) VALUES ('$name')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "Category added successfully";
    }else{
        echo "Error: category not added "; 
    }
}
?>


<h1>category</h1>
<form action="" method="post">
    Name: <input type="text" name="name" required><br><br>
    <button>Add Category</button>
</form>



<?php
require_once 'footer.php';
?>