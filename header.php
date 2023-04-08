
<?php
require_once './dbConnect.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100" rel="stylesheet" />

        <link rel="stylesheet" href="./Css/style.css"/>
        <title>FitCyclos</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-sm navbar-dark">
                <div class="container-fluid col-auto">
                    <a class="navbar-brand active" href="./index.php">
                        <img src="./Assets/Logo/logo.png" alt="Avatar Logo" style="width:12rem;" class="rounded-pill"> 
                    </a>
                </div>
                <div class="container-fluid d-flex justify-content-center">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="./index.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">BIKES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">ACCESSORIES</a>
                        </li>
                    </ul>

                </div>
                <div class="container-fluid col-auto">
                    <?php
                    session_start();
                    if (isset($_SESSION['loggedIn'])) {
                        if ($_SESSION['loggedIn']) {
                            ?>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="nav-item"><a class="nav-link active">Hello, <?php echo $_SESSION['firstName']; ?></a></li>
                                <li class="nav-item"><a class="nav-link active" href="./logout.php">Log Out</a></li>
                            </ul>
                            <?php
                        }
                    } else {
                        ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item"><a class="nav-link active" href="./signUp.php">Sign Up</a></li>
                            <li class="nav-item"><a class="nav-link active" href="./login.php">Log In</a></li>
                        </ul>
    <?php
}
?>
                </div>
            </nav>
        </header>





