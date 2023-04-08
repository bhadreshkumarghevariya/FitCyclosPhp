
<?php
require_once './dbConnect.php';
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
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
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <div class="container-fluid col-auto">
                    <a class="navbar-brand" href="./index.php">
                        <img src="./Assets/Logo/logo.png" alt="Avatar Logo" style="width:12rem;" class="rounded-pill"> 
                    </a>
                </div>
                <div class="container-fluid d-flex justify-content-center">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
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
                                <li class="nav-item"><a class="nav-link">Hello, <?php echo $_SESSION['firstName']; ?></a></li>
                                <li class="nav-item"><a class="nav-link" href="./logout.php">Log Out</a></li>
                            </ul>
                            <?php
                        }
                    } else {
                        ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item"><a class="nav-link" href="./signUp.php">Sign Up</a></li>
                            <li class="nav-item"><a class="nav-link" href="./login.php">Log In</a></li>
                        </ul>
    <?php
}
?>
                </div>
            </nav>
        </header>


<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

