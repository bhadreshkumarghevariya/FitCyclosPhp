
<?php
require './header.php';
//session_start();
$firstName = $lastName = $email = $password = "";
$user_id = $_SESSION['user_id'];
$total = $_SESSION['total'];
$totalQuantity = $_SESSION['totalQuantity'];

$sql = "SELECT * from user where user_id=$user_id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
$firstName = $row['firstname'];
$lastName = $row['lastname'];
$email = $row['email'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = test_input($_POST["firstName"]);
    $lastName = test_input($_POST["lastName"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);

//    $sql = "INSERT INTO user (firstname, lastname, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
?>

<div class="container my-4">


    <div  class="d-flex justify-content-center" style="elevation: 0.5rem;">
        <div class="card col-4 shadow p-3 mb-5 bg-white rounded">

            <div class="card-body">
                <h5 class="card-title">Checkout Form</h5>

                <form method="POST" name="signUpForm" id="signUpForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="row">
                        <div class="form-floating my-2 col">
                            <input type="=text" class="form-control" id="firstName" name="firstName"  value="<?php echo $firstName; ?>" placeholder="First Name" disabled="true">
                            <label for="floatingInput" class="ms-2">First Name</label>
                        </div>
                        <div class="form-floating my-2 col">
                            <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName; ?>" placeholder="Last Name" disabled="true">
                            <label for="floatingInput" class="ms-2">Last Name</label>
                        </div>
                    </div>
                    <div class="form-floating py-2">
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="name@example.com" disabled="true">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="text-center">
                        <h5 class="card-title">Total:<?php echo $total ?> </h5>
                        <p><span>Quantity: <?php echo $totalQuantity ?></span></p>
                    </div>
                    <div class="d-grid col-6 form-floating py-2 mx-auto">
                        <button type="submit" class="btn btn-primary">Check Out</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

