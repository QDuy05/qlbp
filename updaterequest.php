<?php 
include_once 'connectdb.php';
$soPT = "";
$chuPT = "";
$sdt = "";
$noiDKTT = ""; 


$errorMessage = "";
$successMessage = "";

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if (!isset($_GET["soPT"])){
        header("location: /qlbp/index.php");
        exit;
    }
    $soPT = $_GET["soPT"];
    
    $sql = "SELECT * FROM tauinfo WHERE soPT = '$soPT'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if(!$row){
        header("location: /qlbp/index.php");
        exit;
    }
    $chuPT = $row["chuPT"];
    $sdt=$row["sdt"];
    $noiDKTT=$row["noiDKTT"];

}else{
    $soPT = $_POST["soPT"];
    $chuPT = $_POST["chuPT"];
    $sdt = $_POST["sdt"];
    $noiDKTT = $_POST["noiDKTT"];
    $soPTCheck="";
    $check="";

    do{
        if(empty($soPT) || empty($chuPT) || empty($sdt) || empty($noiDKTT)){
            $errorMessage = "Thông tin không được trống";
            break;
        }
        //add data
        $soPTCheck = "SELECT soPT FROM tauinfoupdate WHERE soPT = '$soPT'" ;
        $check = mysqli_query($conn,$soPTCheck);

        if(mysqli_num_rows($check)>0){
            $sql = "UPDATE tauinfoupdate ".
        " SET chuPT = N'$chuPT', sdt = '$sdt',noiDKTT = N'$noiDKTT'".
        " WHERE soPT = '$soPT'";
        }else{
            $sql = "INSERT INTO tauinfoupdate (soPT,chuPT,sdt,noiDKTT)".
            "VALUES('$soPT','$chuPT','$sdt','$noiDKTT')";
        }

        $result = $conn->query($sql);
        if(!$result){
            die("Invlaid query: ".$conn->error);
            break;
        }

        $successMessage = "Gửi yêu cầu thành công";

        header("location: /qlbp/index.php");
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
<body>
    <div class="container-fluid">
    <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>Thêm tàu</h2>
                
            </div>
            <div class="panel-body">
            <?php
                if(!empty($errorMessage)){
                   echo "
                        <div class = 'alert alert-danger fade in' role='alert'>
                        <a href='#' class='close' data-dismiss='alert'>&times;</a>
                        <strong>Lỗi: $errorMessage</strong>
                    </div>
                   " ;
                }
                ?> 
            <form method="post">
                <input type="hidden" name="soPT" value="<?php echo $soPT; ?>">
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Số phương tiện</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name=soPT value="<?php echo $soPT ?>">
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Chủ phương tiện</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name=chuPT value="<?php echo $chuPT ?>">
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Số điện thoại</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name=sdt value="<?php echo $sdt ?>">
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Nơi ĐKTT</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name=noiDKTT value="<?php echo $noiDKTT ?>">
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
                        <button type="submit" class="btn btn-primary btn-block">Gửi yêu cầu cập nhật</button>
                    </div>
                    <div class="col-sm-3 d-grid">
                        <a href="/qlbp/index.php" class="btn btn-default btn-block">Trở lại</a>
                    </div>
                </div>
                
            </form>
            </div>           
        </div> 
    </div>
</body>
</html>