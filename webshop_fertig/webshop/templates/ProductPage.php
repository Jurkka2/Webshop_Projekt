<?php
include 'header.php';
include 'Navbar.php';

$con = getDB();

$query = "SELECT * FROM product WHERE id = $_GET[product]";

$result = mysqli_query($con, $query);

$row = mysqli_fetch_array($result)

?>
<body>
<div class="container product-detail-container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="col-md-6">
						<div class="preview">
						
							<div class="preview-pic tab-content">
							<div class="tab-pane active" id="pic-1"><img src="http://localhost/webshop/assets/media/img/products/<?php echo $row["image_url"]; ?>" /></div>
							<div class="tab-pane" id="pic-2"><img src="http://localhost/webshop/assets/media/img/products/<?php echo $row["image_url"]; ?>"/></div>
							<div class="tab-pane" id="pic-3"><img src="http://localhost/webshop/assets/media/img/products/<?php echo $row["image_url"]; ?>"/></div>
							<div class="tab-pane" id="pic-4"><img src="http://localhost/webshop/assets/media/img/products/<?php echo $row["image_url"]; ?>"/></div>
							<div class="tab-pane" id="pic-5"><img src="http://localhost/webshop/assets/media/img/products/<?php echo $row["image_url"]; ?>"/></div>
							</div>
						</div>
					</div>
					<div class="details col-md-6">
                        <h3 class="product-title"><?php echo $row["brand"]; ?></h3>
						<h3 class="product-title"><?php echo $row["name"]; ?></h3>
						<h4 class="price">current price: <span><?php echo $row["price"]; ?>€ / 100ml</span></h4>
						<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
						</h5>
						<div class="action">
							<form method="POST" action="M_warenkorb.php">
							<input class="text-center" type="number"  name="menge" value="1" min='1' max='10'>
							<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
							<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
							<input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>">
							<input type="submit" name="in_den_Warenkorb" style="margin: top 5px;" class="btn btn-light" value="in den Warenkorb">

							</form>
						</div>
					</div>
					<div class="description">
						<p class="product-description"><?php echo $row["description"]; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php include 'Footer.php' ?> 

</html>