<?php
    include 'header.php';
    include 'Navbar.php';

    $con = getDB();
    
    // Produkte aus der Datenbank Ziehen
    $query = "SELECT * FROM product p WHERE p.name LIKE '%$_GET[search]%' || p.brand LIKE '%$_GET[search]%'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) 
    {
                ?>
                    <div class="container product-container">  
                    <p class="suchergebnisse">Produkte die "<?php echo $_GET["search"]; ?>" enthalten::</p>
                        <div class="row text-center py-5 ">
                            <?php
            
                            while ($row = mysqli_fetch_array($result)) 
                            {
                            ?>
            
                                <div class="col-md-3 co-sm-6">
                                    <a href="/webshop/templates/productPage.php?product=<?php echo $row["id"]; ?>">
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




    include 'Footer.php' ?> 
