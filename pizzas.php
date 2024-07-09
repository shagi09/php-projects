<?php
session_start();
echo $_SESSION['email'];
echo $_SESSION['title'];
echo $_SESSION['ingredients'];
require "vendor/autoload.php";
$client = new \MongoDB\Client("mongodb://localhost:27017");
$pizzadb = $client->pizzadb;
$result1 = $pizzadb->createCollection('pizzacollection');
var_dump($result1);

?>
<!DOCTYPE html>
<html lang="en">
<?php include('layout/header.php')?>
<h2 style='margin-left:590px;'>your orders are:</h2>
<div style='margin-left:450px;width: 400px;background-color:#D1B89E; padding:40px; border-radius:20px;color:white;font-size:30px;'>
    <div>title:</div>
    <div>ingredients:</div>
</div>

<?php include('layout/footer.php')?>
</html>