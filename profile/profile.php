<?php 
     function form() : void {
        error_reporting(0);
    require "../includes/db_connect.php";
    session_start();
    if (isset($_SESSION['numc'])) {
    
    $sql = "SELECT user ,email FROM compte WHERE numc = :numc";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':numc',$_SESSION['numc']);
    $stmt->execute();
    $count = $stmt->rowCount();
    $row = $stmt->fetch();
        if($count == 1) {
       
        echo '<div class="form-group">';
        echo '<label class="form-label">Username</label>';
        echo '<input type="text" class="input" name="user" value="'.$row['user'].'">';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label class="form-label">E-mail</label>';
        echo '<input type="text" class="input" name="email" value="'.$row['email'].'">';
        echo '</div>';
    }
}
     }

?>
<?php
function form1() : void {
    require "../includes/db_connect.php";
    session_start();
    if (isset($_SESSION['numc']) && ($_SESSION['numc']==5) ) {
    
        $sql = "SELECT user, email FROM compte";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        echo '<div class="form-group">';
        echo '<label class="form-label">Select User</label>';
        echo '<select name="selectedUser" class="input" onchange="showUser(this.value)">';
        echo '<option ></option>';
        while ($row = $stmt->fetch()) {
            echo '<option value="'.$row['user'].'">'.$row['user'].'</option>';
        }
        
        echo '</select>';
        echo '</div>';
        echo '<div id="user_info"></div>';
    }
}
?>
<script>
function showUser(str) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("user_info").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "../includes/user.php?username=" + str, true);
    xmlhttp.send();
}
</script>
<?php 
function img() : void {
    require "../includes/db_connect.php";
    session_start();
    if (isset($_SESSION['numc'])) {
    
    $sql = "SELECT profileimg FROM compte WHERE numc = :numc";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':numc',$_SESSION['numc']);
    $stmt->execute();
    $count = $stmt->rowCount();
    $row = $stmt->fetch();
        if($count == 1) {
            if(!empty($row['profileimg'])){
                echo '<img src="'.$row['profileimg'].'"  class="pic" id="profileImg">';
            }else{
                echo '<img src="pic2.jpeg"  class="pic" id="profileImg">';
            }
    }
}
     }
?>
<?php
     function paid(){
     session_start();
     if (isset($_SESSION['numc'])) {        
       require "../includes/db_connect.php";
       $sql = "SELECT class FROM payment_info WHERE (numc = :numc AND payment_period > CURDATE()) ";
       $stmt = $pdo->prepare($sql);
       $stmt->bindParam(':numc', $_SESSION['numc']);
       $stmt->execute();
       while($row = $stmt->fetch()) {
           echo '<h3 class="form-label">' . $row['class'] . '</h3>';
       }
    }}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>account</title>
    <link rel="stylesheet" href="profile.css">
    <script>
        function previewImage() {
            var preview = document.getElementById('profileImg');
            var file    = document.querySelector('input[type=file]').files[0];
            var reader  = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }
    </script>
</head>
<body>
    <div class="account">     
        <div class="box-container">
            <div>
                <h4 class="title">YOUR PROFILE</h4>
            </div>
            <div class="container">
                <div class="column">
                    <div class="pic">
                        <?php img(); ?>
                    </div> 
                    <br/>
                    <form action="profile1.php" method="post" enctype="multipart/form-data">
                        <div class="photo">
                            <label class="upload-btn">
                                Upload new photo
                                <input type="file" class="file-input" name='fileToUpload' onchange="previewImage()">
                            </label>
                        </div>
                        <br/>
                        <div class="column">
                        <?php form(); ?>
                        <div class="submit" >
                        <button type="submit" class="upload-btn">Save changes</button>
                        <button type="reset" class="upload-btn">Cancel</button>
                        </div>      
                        </div>
                    </form>               
                    
                </div>
            </div>   
            <div>
            <h1 class="form-label" style="font-size:50px;">paid:</h1>
            <?php paid(); ?>
            <?php form1(); ?>
        </div>  
        </div>
    </div>
</body>
</html>