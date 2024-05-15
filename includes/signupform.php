<?php
    require_once "db_connect.php";
    $test=true;
    $ch='';
    if ((!empty($_POST['choice2'])||!empty($_POST['choice1']))&&(!(!empty($_POST['choice2'])&&!empty($_POST['choice1'])))) {
        if (!empty($_POST['choice2'])) {
            $sexe='male';
        }
        if (!empty($_POST['choice1'])) {
            $sexe='female';
        }
    } else {
        $ch=$ch. 'choose a gender\n';
        $test=false;
    }
    if (isset($_POST['pass1'])&&isset($_POST['pass2'])) {
        if (strlen($_POST['pass1'])>=8) {
            if ($_POST['pass1']===$_POST['pass2']) {
                $pass=$_POST['pass1'];
            }else{
                $ch=$ch.'password and confirm password are not the same\n';
                $test=false;
            }
            
        } else {
            $ch=$ch."password too short\n";
            $test=false;
        }
    } else {
        $ch=$ch."enter a password and confirm it\n";
        $test=false;
    }
    if (!empty($_POST['user'])) {
        $sql = "SELECT * FROM compte WHERE user = :user";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user', $user);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count > 0) {
            $ch=$ch."user already exists\n";
            $test=false;
        }else{
            $user=$_POST['user'];
        }
    } else {
        $ch=$ch."enter a valid user\n";
        $test=false;
    }
    if (isset($_POST['date'])) {
        $date = $_POST['date'];
        $threeYearsAgo = date('Y-m-d', strtotime('-3 years'));
        if (strtotime($date)&& $date <= $threeYearsAgo) {
            $birth = $date;
        } else {
            $ch=$ch."Invalid date or date is not at least three years before the current date\n";
            $test=false;
        }
    } else {
        $ch=$ch."Enter a valid date\n";
        $test=false;
    }
    $statearr=array('Ariana','Beja','Ben Arous','Bizerte','Gabes','Gafsa','Jendouba','Kairouan','Kasserine','Kebili','Kef','Mahdia','Manouba','Medenine',
                    'Monastir','Nabeul','Sfax','Sidi Bouzid','Siliana','Sousse','Tataouine','Touzeur','Tunis','Zaghouan');
    if (in_array( $_POST['state'],$statearr)) {
        $state= $_POST['state'];
    } else {
        $ch=$ch.'state not entered correctly\n';
        $test=false;
    }
    if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
        $email= $_POST['email'];
    } else {
        $ch=$ch.'non valid email\n';
    }
    if ($test) {
        $sql = "INSERT INTO compte (pass,user,gender,birth,state,email) VALUES (:pass, :user,:sexe, :birth, :state, :email)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':pass', $pass);
        $stmt->bindParam(':sexe', $sexe);
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':birth', $birth);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        header('location: ../html/signin.php');
    }else{
        echo $ch;
        header('location: ../html/signup.php');
    }