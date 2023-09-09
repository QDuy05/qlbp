
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
                Thông tin chung
            </div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td ng-repeat="col in columns" class="text-center">{{col}}</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once 'connectdb.php';
                        $sql = "SELECT * FROM tauinfo;";
                        $result = $conn->query($sql);
                        if(!$result){
                            die("Invlaid query: ".$conn->error);
                        }
                        while ($row = $result->fetch_assoc()){                        
                            echo '<tr><td class="text-center">' .$row["soPT"].'</td>
                            <td class="text-center">' .$row["chuPT"].'</td>
                            <td class="text-center">' .$row["sdt"].'</td>
                            <td class="text-center">' .$row["noiDKTT"].'</td>
                            <td class="text-center">
                                    <a class="btn btn-primary btn-sm" href="/qlbp/updaterequest.php?soPT='.$row["soPT"].'">Cập nhật</a>
                                </td>
                            </tr>';
                            
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">Today: {{ today | date : "dd/MM/y"}}</div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                Duyệt cập nhật
            </div>
            <div class="panel-body">
            <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Mã phương tiện</th>
                            <th class="text-center">Chủ phương tiện</th>
                            <th class="text-center">SDT</th>
                            <th class="text-center">Nơi DKTT</th>
                            <th class="text-center">Cập nhật</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once 'connectdb.php';

                        $sql = "SELECT *  FROM tauinfoupdate;";
                        $result = $conn->query($sql);
                        if(!$result){
                            die("Invlaid query: ".$conn->error);
                        }
                        while ($row = $result->fetch_assoc()){                        
                            echo '<tr>
                            <td class="text-center">' .$row["soPT"].'</td>
                            <td class="text-center">' .$row["chuPT"].'</td>
                            <td class="text-center">' .$row["sdt"].'</td>
                            <td class="text-center">' .$row["noiDKTT"].'</td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" href="/qlbp/edit.php?soPT='.$row["soPT"].'">Cập nhật</a>
                                </td>
                            </tr>';
                            
                        }
                        ?>
                        
                    </tbody>
                </table>
            </div>           
        </div>     
        <div class="panel panel-primary">
            <div class="panel-heading">
                Tạo mới/Xóa
            </div>
            <div class="panel-body">
            <div class="row">
                    <div class="col-sm-offset-3 col-sm-3 d-grid">
                            <a class="btn btn-primary btn-block" href="/qlbp/addnew.php">Tạo mới tàu</a>
                    </div>
                    <div class="col-sm-3 d-grid">
                        <a href="/qlbp/index.php" class="btn btn-danger btn-block">Xóa tàu</a>
                    </div>
                </div>
            </div>           
        </div>

    </div>
    <script src="js/main.js"></script>
</body>

</html>