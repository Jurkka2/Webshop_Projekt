<?php
    include 'header.php';
    include 'Navbar.php';

    $con = getDB();

    // Produkte aus der Datenbank Ziehen
    $query = "SELECT * FROM product p JOIN product_categories pc ON p.id = pc.product_id WHERE pc.category_id = $_GET[category]";

    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {

    ?>
        <div class="container product-container">  
            <div class="row text-center py-5 ">
                <?php

                while ($row = mysqli_fetch_array($result)) { // SLUG 
                ?>

                    <div class="col-md-3 co-sm-6">
                        <a href="/webshop/templates/productPage.php?product=<?php echo $row["product_id"]; ?>">
                            <div class="card shadow">
                                <div class="card-img">
                                        <img src="http://localhost/webshop/assets/media/img/products/<?php echo $row["image_url"]; ?>" class="img-fluid card-img-top"><br />
                                </div>
                                <div class="card-name">
                                    <p><?php echo $row["name"]; ?></p>
                                </div>
                                <div class="card-price">
                                    <p><?php echo $row["price"]; ?>€/100ml</p>
                                </div>

                            </div>
                        </a>
                    </div>

                <?php

                }
?>
            </div>
        </div>
<?php

    }

?>

    <?php include 'Footer.php' ?> 

<!--TODO´s: 
     -Footer: unten aber nicht sticky 
     -Login: wenn ich angemeldet bin soll mein name im Login Button stehen (Header meine first_name Session wird scheinbar nicht übergeben)
     -Register: funktion machen
     -ProduktDetails: SLUG
     -Suchfunktion im Header
     -Bestellfuntktion 
-->

</html>