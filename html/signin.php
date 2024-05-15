<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in || Sign up </title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
    <link rel="stylesheet" href="../css/signin.css">
</head>
<body>
    <div class="container">
        <form action="../includes/signinform.php" method="POST" class="form">              
            <h3 class="title">log in</h3>
            <div class="data">
                <div class="input-box">
                    <span>username :</span>
                    <input class="input" type="text" placeholder="your username" name='user'  required>
                </div>
                <div class="input-box">
                    <span>password :</span>
                    <input class="input" type="password" required name='pass'>
                    <input type="checkbox" value="forgot password?" name="forget" id="forget-password">
                    <label for="forget-password"><a href="#">Forget Password?</a></label>
                </div>
            </div>         
            <button type="submit" class="btn">LOG IN</button> 
            <div class="register">
                <p >don't have an account?<a href="signup.php">create your account</a></p>
            </div>                
</form>
    </div>
</body>
</html>