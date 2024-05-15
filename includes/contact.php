<?php
    print_r($_POST);
    if (!empty($_POST['username'])&&!empty($_POST['email'])&&!empty($_POST['message'])) {
        $username=$_POST['username'].' review';
        $email=$_POST['email'];
        $message=wordwrap($_POST['message'],70);
        $headers='FROM: <chouikhchaima2002@gmail.com>';
        mail($email,$username,$message,$headers);
        header('location: ../index.php');
    }