<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $message = "";
        require_once 'conn_db.php';
        if(isset($_POST['name']) && isset($_POST['email']) ){
            //echo "enter!!";
            // $name = $_POST['name'];
            // $email = $_POST['email'];
            // 以下是第二種寫法
            // $sql = "insert into people(name, email) values(:name, :email)";
            // $statement = $connection -> prepare($sql);
            // if($statement -> execute([':name' => $name, ':email' => $email])){
            //     $message = "Data inserted successfully";
            // };   
            try{
                $name = $_POST['name'];
                $email = $_POST['email'];
                $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "insert into people(name, email) values('$name', '$email')";
                if($connection -> exec($sql)){
                    $message = "Data inserted successfully";
                }
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            $connection = null;
        }
    
    ?>
    <?php require 'header.php' ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Create a Person</h2>
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
                        <input type="text" name='name' id='name' class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name='email' id='email' class="form-control" required>
                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-info">Create a person</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>