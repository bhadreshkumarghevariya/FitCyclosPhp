<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */



require './header.php';
require_once 'dbConnect.php';

$user_id = $_SESSION['user_id'];
$total = 0;
$totalQuantity=0;

$sql = "SELECT products.product_id,products.name, products.price,products.product_image,tbl_cart_items.quantity  FROM tbl_cart_items JOIN products ON products.product_id = tbl_cart_items.product_id where user_id=$user_id;";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo $_SESSION['user_id'];
    ?>
    <section style="background-color: #eee;">
        <div class="text-center container py-5">

            <div class="row">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="card text-black">
                            <img src="<?php echo $row["product_image"] ?>"
                                 class="card-img-top p-3" alt="<?php echo $row["name"] ?>" />
                            <div class="card-body">
                                <div class="text-center">
                                    <h5 class="card-title"><?php echo $row["name"] ?></h5>

                                    <p><span>$<?php echo $row["price"] ?></span></p>
                                </div>
                                <div class="row">
                                    <button type="button" class="btn btn-outline-primary">-</button>
                                    <p class="text-muted my-4"><?php echo $row["quantity"] ?></p>
                                    <button type="button" class="btn btn-outline-primary">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $total = $total + $row["quantity"]*$row["price"];
                    $totalQuantity = $totalQuantity + $row["quantity"];
                    $_SESSION['total'] = $total;
                    $_SESSION['totalQuantity'] = $totalQuantity;
                }
                ?>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-4"></div>
        <div class="card text-black col-4 m-2">
            <div class="card-body">
                <div class="text-center">
                    <h5 class="card-title">Total:<?php echo $total ?> </h5>
                    <p><span>Quantity: <?php echo $totalQuantity ?></span></p>
                    <a href="./checkOut.php"><button class="btn btn-primary col-10">Buy Now</button></a>
                </div>
                <div>
                    
                </div>
            </div>
        </div>
            <div class="col-4"></div>
        </div>
    </section>
    <?php
} else {
    echo "0 results";
}

mysqli_close($conn);
?>

<?php
require './footer.php';
