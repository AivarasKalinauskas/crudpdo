<?php
require 'db.php';
$message = '';
if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];

    $sql = 'INSERT INTO clients(name, surname, email) VALUES (:name, :surname,:email)';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':name' => $name, ':surname' => $surname, ':email' => $email])) {
        header('Location: /crudpdo/?message=Data inserted successfully');
    }

}
?>

<?php require 'header.php'; ?>
<div class="container mt-5">
    <div class="card text-center">
        <div class="card-header">
            Insert contact
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
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="surname">Surname</label>
                    <input class="form-control" type="text" name="surname" id="surname">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Insert">
                </div>
            </form>
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>
