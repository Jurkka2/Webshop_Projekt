<?php

include 'header.php';
include 'Navbar.php';
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded my-5" style="background-color: #585858;">

                <h1 style="color:white">Mein Warenkorb</h1>

            </div>

            <div class="col-lg-9">

                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name des Parfüms</th>
                            <th scope="col">Preis</th>
                            <th scope="col">Menge</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                        <?php

                        $total = 0;
                        $number = 0;

                        if (isset($_SESSION['cart'])) {

                            foreach ($_SESSION['cart'] as $key => $value) {

                                $number++;
                                echo "
                             <tr>

                                <th scope='row'>$number</td>
                                <td>$value[hidden_name]</td>
                                <td>$value[hidden_price]<input type='hidden' class='i_price' value='$value[hidden_price]'>€</td>
                                <td>
                                    <form action='M_warenkorb.php' method='POST'>
                                        <input class='text-center i_quantity' name='Mod_quantity' onchange='this.form.submit();' type='number' value='$value[quantity]' min='1' max='10'>
                                        <input type='hidden' name='hidden_name' value='$value[hidden_name]'>
                                    </form>

                                </td>

                                <td class='i_total'></td>
                                <td>
                                    <form action='M_warenkorb.php' method='POST'>
                                        <button name='RemoveItem' class='btn btn-sm btn-outline-danger'>Entfernen</button>
                                        <input type='hidden' name='hidden_name' value='$value[hidden_name]'>
                                    </form>
                                </td>

                             </tr>


                             ";
                            }
                        }

                        ?>

                    </tbody>
                </table>

            </div>
            <div class="col-lg-3">
                <div class="boder rounded p-4" style="background-color: #585858;">

                    <h4 class="side-cart" >Total:</h4>
                    <div class="row">
                        <div class="col text-right">
                            <h5 class="side-cart" id="g_total"></h5>
                        </div>
                        <div class="col text-left">
                            <h5 class="side-cart" >€</h5>
                        </div>
                    </div>

                    <br />

                    <?php
                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {

                        if (isset($_SESSION['id'])) {
                    ?>
                            <form action="Bestellung.php" method="POST">

                                <div class="mb-4">


                                    <label class="form-label">Sie sind angemeldet als:

                                    
                                        <?php

                                        $name = $_SESSION["id"][1];
                                        echo $name;

                                        ?>
                                        </label>

                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked="checked">

                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Paypal
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">

                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Andere Zahlungs Methode
                                    </label>
                                </div>

                                <br />

                                <button class="btn btn-light btn-block" name="purchase">Bestellung aufgeben</button>

                            </form>

                        <?php
                        } else {
                        ?>
                            <p class="side-cart">Sie sind nicht angemeldet.</p>
                            <a class="btn btn-light" href="./login.php" role="button">Login</a>
                            <a class="btn btn-light" href="./register.php" role="button">Register</a>

                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

    <br />
    <script>
        var gt = 0;
        var i_price = document.getElementsByClassName('i_price');
        var i_quantity = document.getElementsByClassName('i_quantity');
        var i_total = document.getElementsByClassName('i_total');
        var g_total = document.getElementById('g_total');

        function subTotal() {

            gt = 0;
            for (i = 0; i < i_price.length; i++) {

                i_total[i].innerText = (i_price[i].value) * (i_quantity[i].value);

                gt = gt + (i_price[i].value) * (i_quantity[i].value);

            }
            g_total.innerText = gt;
        }

        subTotal();
    </script>

    
    


</body>
<?php include 'Footer.php' ?>

</html>