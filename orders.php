<?php 
require_once 'header.php';
require_once 'connection.php';

if(!isset($_SESSION['auth'])){
    header("Location:login.php");
}

if(empty($_GET['product_id'])){
    header("Location:index.php");
}

$pid = $_GET['product_id'];
$sql="SELECT * FROM products WHERE pid='$pid'";
$result=mysqli_query($conn,$sql);
$product = mysqli_fetch_assoc($result);

if(!empty($_POST)){
    $userId=$_SESSION['auth']['uid'];
    $quantity=$_POST['quantity'];
    $query="INSERT INTO orders(user_id, product_id, quantity) 
    VALUES ('$userId', '$pid', '$quantity')";
    $result =mysqli_query($conn, $query);
    if($result){
        echo "Order placed successfully!";
    }else{
        echo "Error placing order: " . mysqli_error($conn);
    }
}

?>

<h1>Order Product</h1>
<form method="post" action="">
    <p>Product: <?php echo $product['title']; ?></p>
    <p>Price: $<?php echo $product['price']; ?></p>
    <p>Quantity: <input type="number" name="quantity" min="1"
     max="<?php echo $product['quantity']; ?>" required></p>
    <button>Place Order</button>
</form>