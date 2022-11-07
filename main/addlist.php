<?php
    session_start();
    require_once "../Database/Database.php";
    if($_SESSION['username'] == null){
    echo "<script>alert('Please login.')</script>";
    header("Refresh:0 , url = ../index.html");
    exit();

    }

    if($_POST['name'] != null && $_POST['amount'] != null ){
        $sql = "INSERT INTO product (proname,amount) VALUES ('". trim($_POST['name']). "','". trim($_POST['amount']). "')";
        if($conn->query($sql)){
            echo "<script>alert('La agregacion se completo exitosaminte.')</script>";
            header("Refresh:0 , url = ../php/list.php");
            exit();

        }
        else{
            echo "<script>alert('No se pudo agregar.')</script>";
            header("Refresh:0 , url = ../php/list.php");
            exit();

        }
    }
    else{
        echo "<script>alert('Por favor complete la información.')</script>";
        header("Refresh:0 , url = ../php/list.php");
        exit();

    }
    mysqli_close($conn);
?>