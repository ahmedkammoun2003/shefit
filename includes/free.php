<?php
    print_r($_POST);
    $ch="";
    $test=true;
    session_start();
    if (isset($_SESSION['numc']) && isset($_GET['class'])) {
        require_once "db_connect.php";
        $sql = "SELECT * FROM compte WHERE numc = :numc ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':numc', $_SESSION['numc']);
        if ($stmt->execute()) {
            $count = $stmt->rowCount();
            if ($count == 0) {
                echo 'User not found';
                $test=false;
            }else {
                $numc=$_SESSION['numc'];
            }
        }
        $sql = "SELECT * FROM pay WHERE class = :class ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':class',$_GET['class'] );
        if ($stmt->execute()) {
            $count = $stmt->rowCount();
            if ($count == 0) {
                echo 'class not found';
                $test=false;
            }else {
                $class=$_GET['class'];
            }
        } else{
            header('location: ../index.php');
        }
    }
    if ($test) {
        require_once "db_connect.php";
        $stmt = $pdo->prepare("INSERT INTO payment_info ( payment_period, class, numc, free) 
        VALUES ( :payment_period, :class, :numc, :free)");
        $date = new DateTime();
        $date->modify('+14 days');
        $period = $date->format('Y-m-d');
        $free=1;
        $stmt->bindParam(':payment_period', $period);
        $stmt->bindParam(':class', $class);
        $stmt->bindParam(':numc', $numc);
        $stmt->bindParam(':free', $free);
        $stmt->execute();
        echo 'success';
        switch ($_GET['class']) {
            case 'yoga':
                header('location:../html/yoga.php');
                break;
            
            case 'gymnastic':
                header('location:../html/gymnastique.php');
                break;
            case 'pilates':
                header('location:../html/pilates.php');
                break;
            case 'meditation':
                header('location:../html/meditation.php');
                break;
            default:
                break;
        }
    } else {
        switch ($_GET['class']) {
            case 'yoga':
                header('location:../html/yoga.php');
                break;
            
            case 'gymnastic':
                header('location:../html/gymnastique.php');
                break;
            case 'pilates':
                header('location:../html/pilates.php');
                break;
            case 'meditation':
                header('location:../html/meditation.php');
                break;
            default:
                break;
        }
        echo $ch;
    }