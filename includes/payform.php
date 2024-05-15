<?php
    print_r($_POST);
    $ch="";
    $test=true;
    session_start();
    if (isset($_SESSION['numc']) && isset($_POST['class'])) {
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
        $stmt->bindParam(':class',$_POST['class'] );
        if ($stmt->execute()) {
            $count = $stmt->rowCount();
            if ($count == 0) {
                echo 'class not found';
                $test=false;
            }else {
                $class=$_POST['class'];
            }
        } else{
            header('location: ../index.php');
        }
    }
    $periodarr=array('year', 'month', 'week');
    if (in_array( $_POST['period'],$periodarr)) {
        $period= $_POST['period'];
    } else {
        $ch=$ch.'state not entered correctly\n';
        $test=false;
    }
    switch ($period) {
        case 'month':
            $date = new DateTime();
            $date->modify('+1 month');
            $period = $date->format('Y-m-d');
            break;
        
        case 'year':
            $date = new DateTime();
            $date->modify('+1 year');
            $period = $date->format('Y-m-d');
            break;
        case 'week':
            $date = new DateTime();
            $date->modify('+7 days');
            $period = $date->format('Y-m-d');
            break;
        default:
            $test=false;
            break;
    }
    if (!empty($_POST['full_name'])) {
        $fullName=$_POST['full_name'];
    } else {
        $ch=$ch. 'enter your full name\n';
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
        $test=false;
    }
    if (!empty($_POST['address'])) {
        $address=$_POST['address'];
    } else {
        $ch=$ch. 'enter your address\n';
        $test=false;
    }
    if (!empty($_POST['city'])) {
        $city=$_POST['city'];
    } else {
        $ch=$ch. 'enter your city\n';
        $test=false;
    }
    if (!empty($_POST['postal_code'])) {
        $postalCode = $_POST['postal_code'];
        if (preg_match("/^[0-9]{4}$/", $postalCode)) {
            $postalCode = $_POST['postal_code'];
        } else {
            $ch = $ch . 'Invalid postal code\n';
            $test = false;
        }
    } else {
        $ch = $ch . 'enter your postal code\n';
        $test = false;
    }
    if (!empty($_POST['cardholder_name'])) {
        $cardholder_name=$_POST['cardholder_name'];
    } else {
        $ch=$ch. 'enter the cardholder name\n';
        $test=false;
    }
    if (!empty($_POST['credit_card_number'])) {
        $credit_card_number = $_POST['credit_card_number'];
        if (preg_match("/^[0-9]{16}$/", $credit_card_number)) {
            $credit_card_number = $_POST['credit_card_number'];
        } else {
            $ch = $ch . 'Invalid credit card number code\n';
            $test = false;
        }
    } else {
        $ch = $ch . 'enter your credit card number code\n';
        $test = false;
    }
    if (!empty($_POST['mounth']) && !empty($_POST['year'])) {
        $mounth=$_POST['mounth'];
        $year=$_POST['year'];        
        $date = date('Y-m-d', strtotime('01-'.$mounth.'-'.$year));
        if (strtotime($date) < strtotime(date('m/d/Y', time()))) {
            $ch=$ch.'card expiration date cannot be in the future';
            $test=false;
        }
    } else {
        $ch=$ch.'enter your exp mounth and year';
        $test=false;
    }
    if (!empty($_POST['cvv'])) {
        $cvv = $_POST['cvv'];
        if (preg_match("/^[0-9]{3}$/", $cvv)) {
            $cvv = $_POST['cvv'];
        } else {
            $ch = $ch . 'Invalid cvv\n';
            $test = false;
        }
    } else {
        $ch = $ch . 'enter your credit card cvv\n';
        $test = false;
    }
    if ($test) {
        require_once "db_connect.php";
        $stmt = $pdo->prepare("INSERT INTO payment_info (full_name, email, address, city, state, postal_code, cardholder_name, credit_card_number, expiration_month, expiration_year, cvv, payment_period, class, numc, free) 
        VALUES (:full_name, :email, :address, :city, :state, :postal_code, :cardholder_name, :credit_card_number, :expiration_month, :expiration_year, :cvv, :payment_period, :class, :numc, :free)");
        $free=0;
        $stmt->bindParam(':full_name', $fullName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':postal_code', $postalCode);
        $stmt->bindParam(':cardholder_name', $cardholder_name);
        $stmt->bindParam(':credit_card_number', $credit_card_number);
        $stmt->bindParam(':expiration_month', $mounth);
        $stmt->bindParam(':expiration_year', $year);
        $stmt->bindParam(':cvv', $cvv);
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