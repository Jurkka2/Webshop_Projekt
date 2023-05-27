<?php

  $con = getDB();
  $query = "SELECT * FROM category ORDER BY id ASC";

    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
    ?>
<Navbar>
  <div class="navbar mb-5">
    <div class="nav-scroller container">
      <nav class="nav col d-flex justify-content-between mx-3">

      <?php

      while ($row = mysqli_fetch_array($result)) {
      ?>

        <a class="p-2 navitems " href="/webshop/templates/productDetails.php?category=<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></a>
        
      <?php
      }
      ?>
      </nav>
    </div>
  </div>
</Navbar>
<?php

  }

?>