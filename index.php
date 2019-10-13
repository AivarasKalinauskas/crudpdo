<?php
require 'db.php';
$sql = 'SELECT * FROM clients';
$statement = $connection->prepare($sql);
$statement->execute();
$clients = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require 'header.php'; ?>
<?php include 'db.php' ?>
<div class="container mt-5">
    <div class="card text-center">
        <div class="card-header">
            Contacts list
        </div>
        <div class="card-body">
            <?php if (!empty($_GET['message'])): ?>
                <div class="alert alert-success">
                    <?php
                    $message = $_GET['message'];
                    echo $message ?>
                </div>
            <?php endif; ?>
            <table class="table table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?= $client->id ?></td>
                    <td><?= $client->name ?></td>
                    <td><?= $client->surname ?></td>
                    <td><?= $client->email ?></td>
                    <td>
                        <a class="btn btn-primary" href="update.php?id=<?= $client->id ?>">Edit</a>
                        <a class="btn btn-danger" href="delete.php?id=<?= $client->id ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>
