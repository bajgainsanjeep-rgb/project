<?php
require_once 'header.php';
require_once 'connection.php';
if(!isset($_SESSION['auth'])){
    header('location:login.php');
}
if(!empty($_POST)){
$title = $_POST['title'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$image = $_POST['image'];
$description = $_POST['description'];

$sql = "INSERT INTO products (title, quantity, price, image, description) VALUES ('$title', '$quantity', '$price', '$image', '$description')";
if(mysqli_query($conn, $sql)){
    echo "product added successfully";
}
else{
    echo "error adding product";
}
}

?>



<h1>products</h1>
<form action=""method="post" enctype="multipart/form-data">
Title: <input type="text" name="title" required> <br> <br>
Quantity: <input type="number" name="quantity" required> <br> <br>
Price: <input type="number" name="price" required><br><br>

<!-- IMAGE: <input type="file" name="image" required><br><br> -->
  
Description: <input type="text" name="description" required> <br><br>
<button>ADD product</button>
</form>


<?php
require_once 'footer.php';
?>