<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */



require './header.php';
require_once 'dbConnect.php';

$sql = "SELECT products.product_id,products.name, products.price,products.product_image, category.category_name FROM products LEFT JOIN category ON products.category_id = category.category_id;";

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
                                    <p class="text-muted mb-4"><?php echo $row["category_name"] ?></p>
                                    <p><span>$<?php echo $row["price"] ?></span></p>
                                    <button type="button" onClick="addToCart(<?php echo $row["product_id"] ?>)" class="btn btn-primary text-white col-11"><i class="fa fa-shopping-cart m-3"></i>Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
    <?php
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
<script type="text/javascript">
    function addToCart(productId) {
        console.log(productId);
        $.ajax({
            url: 'addToCart.php',
            type: 'post',
            data: {"product_id": productId}
        });
    }



</script>




<?php
require './footer.php';
