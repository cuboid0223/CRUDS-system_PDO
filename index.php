<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require 'conn_db.php';
    $sql = "select * from people";
    $statement = $connection -> prepare($sql);// ???
    $statement -> execute();// ???
    $people = $statement -> fetchAll(PDO::FETCH_OBJ);// ???
    // print_r($people);
?>
<?php require 'header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>ALL PEOPLE</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                <?php forEach($people as $person): ?>
                <tr>
                    <td><?= $person -> id; ?></td>
                    <td><?= $person -> name; ?></td>
                    <td><?= $person -> email; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $person -> id; ?>" class="btn btn-info">Edit</a>
                        <a 
                        href="delete.php?id=<?= $person -> id; ?>" 
                        class="btn btn-danger" 
                        onclick="return confirm('Are you sure you want to delete this entry?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

</div>
<?php require 'footer.php'; ?>

</body>
</html>