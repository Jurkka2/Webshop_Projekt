<?php
include 'header.php';
include 'Navbar.php';

$mysqli = getDB();

if ($mysqli->connect_error) {
    echo "Fehler bei der Verbindung: " . $mysqli->connect_error;
    exit();
}

$id = $_SESSION["id"][0];

$name = $_SESSION["id"][1];

$user = $mysqli->prepare("SELECT * FROM  client WHERE id = ? limit 1;");
$user->bind_param('i', $id);
$user->execute();
$result = $user->get_result();
$password = '';

if ($row = $result->fetch_assoc()) {

    $password = $row['password'];
}

try {
        if (isset($_SESSION['cart'])) {

                $order = $mysqli->prepare("INSERT INTO orders(client_id, timestamp) VALUES(?, NOW())");
                $order->bind_param('i', $id);
                $items = [];

                foreach ($_SESSION['cart'] as $item) {
                   
                    $insertItem = $mysqli->prepare("INSERT INTO 
						ordered_items(order_id, product_id, quantity) VALUES
						((SELECT id 
						  FROM orders 
						  WHERE id = (SELECT id 
									  FROM orders 
									  GROUP BY id 
									  DESC limit 1) 
						  ORDER BY id 
						  desc LIMIT 1), ?, ?)
					");
				
                    $insertItem->bind_param('ii',$item['id'], $item['quantity']);
                    array_push($items, $insertItem);
					
                }

                $mysqli->begin_transaction();

                try {
                    $order->execute();

                    foreach ($items as $item) {
                        $item->execute();
                        
                    }
                } catch (mysqli_sql_exception $exception) {
                    $mysqli->rollback();

                    throw $exception;
                }

                $mysqli->commit();
				unset($_SESSION['cart']);
				echo"<script> alert('Bestellung wurde aufgegeben');
                window.location.href='./Bestelluebersicht.php';
                </script>";
				
        } else {
			
            throw new Exception("Cart not set");
			
        }
		
} catch (Exception $ex) {
	
    echo $ex;
}
