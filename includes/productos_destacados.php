<?php
require_once "db.php";

$sql = "SELECT * FROM productos 
        WHERE is_new = 1 OR is_best_seller = 1
        LIMIT 4";

$result = $conn->query($sql);
?>