<?php
require 'db.php';
$id = $_GET['id'];

$sql = 'SELECT * FROM clients WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id]);
$client = $statement->fetch(PDO::FETCH_OBJ);


$sql = 'DELETE FROM clients WHERE id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
    header('Location: /crudpdo/?message=Data deleted successfully');
}
