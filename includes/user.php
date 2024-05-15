<?php
    require "../includes/db_connect.php";
    $username = $_GET['username'];
    echo "<h1 class='form-label'>User Information</h1>";
    echo "<h2 class='form-label'>User: ". $username. "</h2>";
    $sql = "SELECT * FROM compte WHERE user = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $count = $stmt->rowCount();
    $row = $stmt->fetch();
    if($count == 1) {
        echo "<h5 class='form-label'>"."User ID: " . $row['numc'] . "</h5>"."<br>";
        echo "<h5 class='form-label'>"."Username: " . $row['user']. "</h5>" . "<br>";
        echo "<h5 class='form-label'>"."Email: " . $row['email']. "</h5>" . "<br>";
    } else {
        echo "User not found.";
    }
    
    $sql = "SELECT class, payment_period FROM payment_info WHERE numc = :numc";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':numc', $row['numc']);
    $stmt->execute();
    while($row = $stmt->fetch()) {
        echo "<h5 class='form-label'>"."Class: " . $row['class'] . ", Payment Period: " . $row['payment_period']. "</h5>" . "<br>";
    }