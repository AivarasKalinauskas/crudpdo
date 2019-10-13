<?php
require 'db.php';
$id = $_GET['id'];

$sql = 'SELECT * FROM clients WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id]);
$client = $statement->fetch(PDO::FETCH_OBJ);

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];

    $sql = 'UPDATE clients SET name=:name, surname=:surname, email=:email WHERE id=:id';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':name' => $name, ':surname' => $surname, ':email' => $email, ':id' => $id])) {
        header('Location: /crudpdo/?message=Data updated successfully');
    }

}
?>

<?php require 'header.php'; ?>
<div class="container mt-5">
    <div class="card text-center">
        <div class="card-header">
            Edit contact
        </div>
        <div class="card-body">
            <?php if (!empty($message)): ?>
                <div class="alert alert-success">
                    <?php echo $message ?>
                </div>
            <?php endif; ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="<?= $client->name ?>">
                </div>
                <div class="form-group">
                    <label for="surname">Surname</label>
                    <input class="form-control" type="text" name="surname" id="surname" value="<?= $client->surname ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email" value="<?= $client->email ?>">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Edit">
                </div>
            </form>
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>
