<?php
 $host = "localhost";
 $dbUsername = "root";
 $dbPassword = "";
 $dbName = "wardrobe";

 $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
 if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>