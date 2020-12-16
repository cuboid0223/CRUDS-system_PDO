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
        $id = $_GET['id'];
        $sql = "select * from people where id=:id";
        $statement = $connection -> prepare($sql);
        $statement -> execute([ ":id" => $id ]);
        $person = $statement -> fetch(PDO::FETCH_OBJ);

        if(isset($_POST['name']) && isset($_POST['email']) ){
            //echo "enter!!";
            $name = $_POST['name'];
            $email = $_POST['email'];
            $sql = "update people set name=:name, email=:email where id=:id;";
            $statement = $connection -> prepare($sql);
            if($statement -> execute([':name' => $name, ':email' => $email, ':id' => $id])){
               header("Location:/cruds-system-pdo");
            };
            

        }
    
    ?>
    <?php require 'header.php' ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Update A Person</h2>
            </div>
            <div class="card-body">
                <?php if(!empty($message)): ?>
                    <div class="alert alert-success">
                        <!-- ???? -->
                        <?= $message; ?>  
                    </div>
                <?php endif; ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input 
                            type="text" 
                            name='name' 
                            id='name' 
                            class="form-control" 
                            value="<?= $person -> name;?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input 
                            type="email" 
                            name='email' 
                            id='email' 
                            class="form-control" 
                            value="<?= $person -> email;?>">
                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>