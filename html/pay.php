<?php
    function spawn(){
        if (!empty($_GET['class']) && !empty($_GET['period'])) {           
            echo '<input style="display:none" type="text" placeholder="full name" name="class" value='.$_GET['class'].'>';
            echo '<input style="display:none" type="text" placeholder="full name" name="period" value='.$_GET['period'].'>';
        } else {
            header('location: ../index.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
    <link rel="stylesheet" href="../css/pay.css">
</head>
<body>
    <div class="box-home">
      
        </nav>

        <div class="container">
            <form class="form" method='POST' action='../includes/payform.php' >
                <?php spawn(); ?>
                <div class="row">
                    <div class="column">
                        <h3 class="title">billing address</h3>
                        <div class="input-box">
                            <span>Full Name :</span>
                            <input class="input" type="text" placeholder="full name" name="full_name">
                        </div>
                        <div class="input-box">
                            <span>E-mail :</span>
                            <input class="input" type="email" placeholder="example@gmail.com" name="email">
                        </div>
                        <div class="input-box">
                            <span>address :</span>
                            <input class="input" type="text" placeholder="street city state " name="address">
                        </div>
                        <div class="input-box">
                            <span>City :</span>
                            <input class="input" type="text" placeholder="Tunis" name="city">
                        </div>
                        
                        <div class="flex">
                            <div class="input-box">
                                <span>State :</span>
                                <input class="input" type="text" placeholder="tunis" name="state">
                            </div>
                            <div class="input-box">
                                <span>postal code :</span>
                                <input class="input" type="number" placeholder="1111" name="postal_code">
                            </div>
                        </div>
                        
                    </div>
    
                    <div class="column">
                        <h3 class="title">Payment</h3>
                        <div class="input-box">
                            <span>Cards accepted</span>
                            <img src="../photos/imgcards.png" alt="cards">
                        </div>
                        <div class="input-box">
                            <span>cardholder name:</span>
                            <input class="input" type="text" placeholder="cardholder name" name="cardholder_name">
                        </div>
                        <div class="input-box">
                            <span>Credit Card Number:</span>
                            <input class="input" type="number" placeholder="1111 1111 1111 1111" name="credit_card_number">
                        </div>
                        <div class="input-box">
                            <span>exp. month :</span>
                            <select name="mounth" class="input">
                                <option></option>
                                <option>January</option>
                                <option>February</option>
                                <option>march</option>
                                <option>april</option>
                                <option>may</option>
                                <option>june</option>
                                <option>july</option>
                                <option>august</option>
                                <option>september</option>
                                <option>october</option>
                                <option>november</option>
                                <option>december</option>
                            </select>
                            
                        </div>
                        
                        
                        <div class="flex">
                            <div class="input-box">
                                <span>exp.year :</span>
                                <input type="number" placeholder="2024" class="input" name="year">
                            </div>
                            <div class="input-box">
                                <span>CVV :</span>
                                <input type="number" placeholder="111" class="input" name="cvv">
                            </div>   
                        </div>
                    </div>  
                </div>
                <div><button type="submit" class="btn">Submit</button></div>
            </form>     
        </div>  
    </div>
    
</body>
</html>