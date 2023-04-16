
<?php
require './header.php';
if (isset($_SESSION['loggedIn'])) {
    if ($_SESSION['loggedIn']) {
        header('location:./index.php');
        exit();
    }
}
$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);

    $sql = "SELECT * FROM `user` where email='$email'&& password='$password'";

    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) == 0) {
        $_SESSION['message'] = "Login Failed. User not Found!";
    } else {
        $row = mysqli_fetch_array($query);
        // Start the session
        echo session_id();
        $_SESSION['user_id']=$row['user_id'];
        $_SESSION['userEmail'] = $row['email'];
        $_SESSION['firstName'] = $row['firstname'];
        $_SESSION['loggedIn'] = true;
        echo $_SESSION['loggedIn'];
        echo $_SESSION['firstName'];
        header('location:./index.php');
        exit();
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
                <h5 class="card-title">Login Form</h5>
                <form method="POST" name="signUpForm" id="signUpForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                    <div class="form-floating py-2">
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating py-2">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="d-grid col-6 form-floating py-2 mx-auto">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

