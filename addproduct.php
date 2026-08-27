<?php
require_once 'header.php';
require_once 'connection.php';
if(!isset($_SESSION['auth'])){
    header('location:login.php');
}

$query="SELECT * FROM category";
$data=mysqli_query($conn,$query);


if(!empty($_POST)){
    $userId=$_SESSION['auth']['uid'];
    $category_id = $_POST['category_id'];
$title = $_POST['title'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$description = $_POST['description'];
$image=$_FILES['image']['name'];
$tmp_name=$_FILES['image']['tmp_name'];
if(!move_uploaded_file($tmp_name, "uploads/$image")){
    echo "error uploading image";
}


$querry = "INSERT INTO products (user_id, category_id,title, quantity, price, image, description) VALUES ('$userId', '$category_id','$title', '$quantity', '$price', '$image', '$description')";
$result=mysqli_query($conn,$querry);
if(mysqli_query($conn, $querry)){
    echo "product added successfully";
}
else{
    echo "error adding product";
}
}

?>



<h1>products</h1>
<form action=""method="post" enctype="multipart/form-data">
Category: <select name="category_id" required>
    <option value="">Select Category</option>
    <?php foreach($data as $cat){ ?>
    <option value="<?php echo $cat['cid']; ?>">
        <?php echo $cat['name']; ?>
    </option>
    <?php } ?>
</select> <br> <br>
Title: <input type="text" name="title" required> <br> <br>
Quantity: <input type="number" name="quantity" required> <br> <br>
Price: <input type="number" name="price" required><br><br>

IMAGE: <input type="file" name="image" required><br><br>
  
Description: <textarea name="description" required> </textarea> <br><br>
<button>ADD product</button>
</form>


<?php
require_once 'footer.php';
?>