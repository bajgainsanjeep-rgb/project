<?php
require_once 'header.php';
require_once 'connection.php';

$sql="SELECT * FROM products";
$result=mysqli_query($conn,$sql);
?>


<h1>product list </h1>

<ul>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <li>
            <img src="uploads/<?php echo $row['image']?>" width="200" height="200" alt="">
            <h2><?php echo $row['title']; ?></h2>
            <p><?php echo $row['description']; ?></p>
            <p>Price: $<?php echo $row['price']; ?></p>
        

        <p>
                <a href="product_detail.php?id=<?php echo $row['pid']; ?>">
                    Product Details
                </a> 
            </p>
        </li>
    <?php endwhile; ?>
</ul>


<?php
require_once 'footer.php';
?>