<?php
    include 'header.php';
    include 'Navbar.php';

    $con = getDB();
                ?>
<div class="container order-container">  
<section class=" gradient-custom">
<div class="container pb-5">
<div class="row d-flex justify-content-center align-items-center">
  <div class="col-lg-10 col-xl-8">
    <div class="card" style="border-radius: 10px; height: auto;">
    <div class="card-header px-4 py-5">
        <h5 class="text-muted mb-0">Vielen Dank für Ihre Bestellung</h5>
      </div>
        <?php
        // Orders aus der Datenbank 
        $userid = $_SESSION["id"][0];
        $query = "SELECT * FROM orders o WHERE o.client_id = '$userid' ORDER BY timestamp DESC LIMIT 1";
        $order = mysqli_query($con, $query)->fetch_array();
        ?>
        <div class="card-body p-4">
            
            <div class="card shadow-0 border mb-4" style="height: auto;">
            <div class="card-body card-body-orders">
          <?php
        // Orders aus der Datenbank 
        $query = "SELECT * FROM orders o JOIN ordered_items oi ON oi.order_id=o.id WHERE o.client_id = '$userid' ORDER BY timestamp DESC ";
        $result = mysqli_query($con, $query);
        $fullprice=0;
        
        while ($row = mysqli_fetch_array($result))
        {
            if($row["order_id"]==$order["id"])
            {
                $query = "SELECT * FROM product p WHERE p.id = '$row[product_id]'";
                $product = mysqli_query($con, $query)->fetch_array();
        ?>

            <div class="row order-product">
              <div class="col-md-2 d-flex justify-content-center align-items-center">
                <img src="http://localhost/webshop/assets/media/img/products/<?php echo $product["image_url"]; ?>" class="img-fluid" alt="Phone">
              </div>
              <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                <p class="text-muted mb-0"> <?php echo $product["brand"];?></p>
              </div>
              <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                <p class="text-muted mb-0 small"><?php echo $product["name"];?></p>
              </div>
              <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                <p class="text-muted mb-0 small">100ml</p>
              </div>
              <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                <p class="text-muted mb-0 small"><?php echo $row["quantity"];?>x</p>
              </div>
              <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                <p class="text-muted mb-0 small"><?php echo $product["price"];?>€</p>
              </div>
            </div>
              <?php
              $fullprice=$fullprice + $product["price"] * $row["quantity"];
            }
        }
        ?>
            </div>
            <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
            <div class="row d-flex align-items-center">
              <div class="col">
                <p class="text-muted mb-0 small text-right mr-5">Gesamt Betrag: <?php echo $fullprice;?>€</p>
              </div>
            </div>
          </div>
        </div>
    </div>

  </div>
</div>
</div>
</section>
    </div>
            <?php





    include 'Footer.php' ?> 
