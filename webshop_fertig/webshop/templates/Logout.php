<?php
    session_start();

    unset($_SESSION['id']);

    echo "<script> alert('Sie haben sich abgemeldet')
           window.location.href='../index.php';
    </script>";