<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['in_den_Warenkorb'])) {
        $hiddenid = $_POST['hidden_id'];
        if (isset($_SESSION['cart'])) {

            $meinItem = array_column($_SESSION['cart'], 'hidden_name');
            if (in_array($_POST['hidden_name'], $meinItem)) {
                echo "<script>

                alert('Parfüm ist bereits im Warenkorb');
                window.location.href='ProductPage.php?product=$hiddenid';

                </script>";
            } else {

                $count = count($_SESSION['cart']);

                $_SESSION['cart'][$count] = array('id' => $_POST['hidden_id'] ,'hidden_name' => $_POST['hidden_name'], 'hidden_price' => $_POST['hidden_price'], 'quantity' => $_POST['menge']);

                echo "<script>

                   alert('Parfüm ist nun im Warenkorb');
                   window.location.href='ProductPage.php?product=$hiddenid';

                </script>";
            }

        } else {
            $_SESSION['cart'][0] = array('id' => $_POST['hidden_id'], 'hidden_name' => $_POST['hidden_name'], 'hidden_price' => $_POST['hidden_price'], 'quantity' => $_POST['menge']);

            echo "<script>

               alert('Parfüm ist nun im Warenkorb');
               window.location.href='ProductPage.php?product=$hiddenid';

            </script>";
        }
    }

    if (isset($_POST['RemoveItem'])) {

        foreach ($_SESSION['cart'] as $key => $value) {

            if ($value['hidden_name']==$_POST['hidden_name']) {

                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo"<script> alert('Parfüm wurde entfernt')
                window.location.href='./warenkorb.php';
                </script>";
            }
        }
    }
    if (isset($_POST['Mod_quantity'])){

        foreach ($_SESSION['cart'] as $key => $value) {

            if ($value['hidden_name']==$_POST['hidden_name']) {

                $_SESSION['cart'][$key]['quantity']=$_POST['Mod_quantity'];
                
               echo"<script>
               window.location.href='./warenkorb.php';
               </script>";
            }
        }
    }
}
