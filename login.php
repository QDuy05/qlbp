<?php

include_once 'connectdb.php';
$username = "";
$password = "";
$role = "";

$errorMessage = "";
$successMessage = "";

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $username = $_POST["username"];
    $password = $_POST["password"];
    do{
        if(empty($username) || empty($password)){
            $errorMessage = "Thông tin không được trống";
            break;
        }
        $sql= "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result)===1){
            $row = mysqli_fetch_assoc($result);
            print_r($row);
        }

        exit;
    }while(false);
}
?>
<!doctype html >
<html ng-app="my_app" >
<meta charset="UTF-8">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-route/1.8.3/angular-route.min.js"></script>
</head>

<body ng-controller="my_controller">
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Đăng nhập
            </div>
            <div class="panel-body">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Tài khoản</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name= "username" value="">
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Mật khẩu</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="password" value="">
                    </div>
                </div>
                <br>
                <?php
                if(!empty($successMessage)){
                    echo "
                        <div class = 'alert alert-success fade in col-sm-offset-3 col-sm-6' role='alert'>
                        <a href='#' class='close' data-dismiss='alert'>&times;</a>
                        <strong>$successMessage</strong>
                    </div>
                   " ;
                }
                ?>
                <div class="row">
                    <div class="col-sm-offset-3 col-sm-3 d-grid">
                        <button type="submit" class="btn btn-primary btn-block" name='login'>Đăng nhập</button>
                    </div>
                    <div class="col-sm-3 d-grid">
                        <a href="/qlbp/index.php" class="btn btn-default btn-block">Trở lại</a>
                    </div>
                </div>
                
            </form>
            </div>
        </div>
    </div>
    <script src="js/main.js"></script>
</body>

</html>