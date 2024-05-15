<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in || Sign up </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/signup.css">
</head>

<body>
    <div class="container">
        <div class="form">
            <form name="signupForm" action="../includes/signupform.php" method="POST" onsubmit="return validateForm()">
                <h2 class="title">sign up</h2>
                <div class="input-box">
                    <span>username :</span>
                    <input class="input" type="text" name="user" placeholder="your username">
                </div>
                <div class="input-box">
                    <span>email :</span>
                    <input class="input" type="email" name="email">
                </div>
                <div class="input-box">
                    <span>password :</span>
                    <input class="input" type="password" name='pass1'>
                </div>
                <div class="input-box">
                    <span>confirm password :</span>
                    <input class="input" type="password" name="pass2">
                </div>

                <div class="gender">
                    <span>Gender:</span>
                    <div style="display: flex; flex-direction: row;">
                        <input id="choice1" class="radio" type="radio" name="choice1">
                        <label>Female</label>
                    </div>
                    <div style="display: flex; flex-direction: row;">
                        <input id="choice2" class="radio" type="radio" name="choice2">
                        <label>male</label>
                    </div>
                </div>


                <div class="input-box">
                    <span>date of birth :</span>
                    <input class="input" type="date" name='date'>
                </div>
                <div class="input-box">
                    <span>state :</span>
                    <select class="input" name="state">
                        <option></option>
                        <option>Ariana</option>
                        <option>Beja</option>
                        <option>Ben Arous</option>
                        <option>Bizerte</option>
                        <option>Gabes</option>
                        <option>Gafsa</option>
                        <option>Jendouba</option>
                        <option>Kairouan</option>
                        <option>Kasserine</option>
                        <option>Kebili</option>
                        <option>Kef</option>
                        <option>Mahdia</option>
                        <option>Manouba</option>
                        <option>Medenine</option>
                        <option>Monastir</option>
                        <option>Nabeul</option>
                        <option>Sfax</option>
                        <option>Sidi Bouzid</option>
                        <option>Siliana</option>
                        <option>Sousse</option>
                        <option>Tataouine</option>
                        <option>Touzeur</option>
                        <option>Tunis</option>
                        <option>Zaghouan</option>
                    </select>
                </div>
                <div class="btn-container">
                    <button type="submit" class="btn">SIGN UP</button>
                    <button type="reset" class="btn">RESET</button>
                </div>
                <div class="login">
                    <p>already have an account?<a href="signin.php">log in to your account</a></p>
                </div>
            </form>
        </div>
    </div>
    <script>
        function validateForm() {
            var username = document.forms["signupForm"]["user"].value;
            var email = document.forms["signupForm"]["email"].value;
            var password1 = document.forms["signupForm"]["pass1"].value;
            var password2 = document.forms["signupForm"]["pass2"].value;
            var gender1 = document.getElementById("choice1").checked;
            var gender2 = document.getElementById("choice2").checked;
            var dateOfBirth = document.forms["signupForm"]["date"].value;
            var state = document.forms["signupForm"]["state"].value;

            if (!gender1 && !gender2) {
                alert("Please choose a gender");
                return false;
            }
            if (password1 !== password2) {
                alert("Passwords do not match");
                return false;
            }
            if (dateOfBirth === "" || !isDateValid(dateOfBirth)) {
                alert("Invalid date of birth or date is not at least three years before the current date");
                return false;
            }
            if (state === "") {
                alert("Please select a state");
                return false;
            }
            if (!validateEmail(email)) {
                alert("Please enter a valid email");
                return false;
            }
            return true;
        }

        function validateEmail(email) {
            var re = /\S+@\S+\.\S+/;
            return re.test(email);
        }

        function isDateValid(dateString) {
            var today = new Date();
            var inputDate = new Date(dateString);
            var threeYearsAgo = new Date(today.getFullYear() - 3, today.getMonth(), today.getDate());
            return inputDate <= threeYearsAgo;
        }
    </script>

</body>

</html>