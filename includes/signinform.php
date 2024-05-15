<?php
    require_once "db_connect.php";
    if(isset($_POST['user'])&&isset($_POST['pass'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $sql = "SELECT * FROM compte WHERE user = :user AND pass = :pass";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':pass', $pass);
        $stmt->execute();
        $count = $stmt->rowCount();
        $row = $stmt->fetch();
        print_r($row);
        if($count > 0) {
            session_start();
            $_SESSION['numc'] = $row['numc'];
            echo $row['numc'];
        }else if(isset($_POST['forget']) && isset($_POST['user'])){
        $user = $_POST['user'];
        $sql = "SELECT * FROM compte WHERE user = :user";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user', $user);
        $stmt->execute();
        $count = $stmt->rowCount();
        $row = $stmt->fetch();
        print_r($row);
        if(mail($row['email'],'forgot password on shefit','your password is '.$row['pass'],'FROM: chouikhchaima2002@gmail.com')){
            echo 'email sent';
        }else{
            echo 'email not sent';
        }
    }
}
header('location: ../index.php');