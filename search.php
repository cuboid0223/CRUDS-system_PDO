<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
require_once "conn_db.php";
if(isset($_POST['q'])){
    $q = $_POST['q'];
    $sql = "select * from people where name like '%$q%' or email like '%$q%'; " ;
    $statement = $connection -> prepare($sql);
    $statement -> execute();

};


?>
<body>
<?php require 'header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>RESULT</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                <?php while ($people = $statement -> fetch()): ?>
                    <tr>
                        <td><?= $people['id']; ?></td>
                        <td><?= $people['name'];  ?></td>
                        <td><?= $people['email']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
</body>
</html>



<?php //endif; ?>