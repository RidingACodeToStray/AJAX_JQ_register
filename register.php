<?php
//连接数据库
$conn = mysqli_connect("localhost","root","","html5-7");
$conn->query("set names utf8");
//获取数据处理类型
$type = $_POST['type'];
//根据不同的数据处理类型返回数据或将数据添加给数据库
switch($type){
    case 'check':
        $name = $_POST['name'];
        $sql = "SELECT * FROM user WHERE  name = '{$name}'";
        $ret = $conn->query($sql);
        if(mysqli_affected_rows($conn)>0){
            echo '{"bol":false}';
        }else{
            echo '{"bol":true}';
        }
        break;
    case 'add':
        $name = $_POST['name'];
        $pwd = $_POST['pwd'];
        $sql = "INSERT INTO user (name,pwd) VALUES ('$name','$pwd')";
        $ret = $conn->query($sql);
        if(mysqli_affected_rows($conn)>0){
            echo '{"bol":true}';
        }else{
            echo '{"bol":false}';
        }
}

