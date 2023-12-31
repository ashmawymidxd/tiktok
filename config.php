<?php
$conn = new mysqli('localhost', 'root', '', 'tiktok');
if(isset($_SESSION['user_id'])){
    header('location:index.php');
}
?>