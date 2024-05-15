<?php
require "../includes/db_connect.php";
print_r($_FILES);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo $_FILES["fileToUpload"]["error"];
    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
        $target_dir = "";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry your file is too large.";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                require '../includes/db_connect.php';
                session_start();
                $file_path = $target_file;
                $sql = "UPDATE compte SET profileimg = :img WHERE numc= :numc";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':numc', $_SESSION['numc']);
                $stmt->bindParam(':img', $file_path);
                if ($stmt->execute()) {
                    echo "File uploaded successfully.";
                } else {
                    echo "Error updating database.";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No file uploaded.";
    }
    $test=true;
    $ch='';
    if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
        $email= $_POST['email'];
    } else {
        $ch=$ch.'non valid email\n';
    }
    if (!empty($_POST['user'])) {
        $user1=$_POST['user'];
    } else {
        $ch=$ch."enter a valid user\n";
        $test=false;
    }
    if ($test) {
        require '../includes/db_connect.php';
                session_start();
                $sql = "UPDATE compte SET user = :user, email = :email WHERE numc= :numc";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':numc', $_SESSION['numc']);
                $stmt->bindParam(':user', $user1);
                $stmt->bindParam(':email', $email);
                if ($stmt->execute()) {
                    echo "User and email updated successfully.";
                } else {
                    echo "Error updating user and email.";
                }
    }
}
header('location: profile.php');