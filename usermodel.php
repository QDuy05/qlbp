<?php
function checkuser($username, $password){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq[0]['role'];
}
?>