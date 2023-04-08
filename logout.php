<?php

session_start();
session_destroy();

unset($_SESSION['loggedIn']);
header('location:./login.php');

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

