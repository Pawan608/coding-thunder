<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="assets/login.css">
    <title>Login/Register</title>
</head>

<body>
    <?php
    if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $roll = strtoupper($_POST['roll']);
        $phoneno = $_POST['phoneno'];
        $password = $_POST['password'];
        include '_dbconnect.php';
        $sql = "insert into student(roll, name, phoneno, password) values('$roll', '$name', '$phoneno', '$password')";
        try {
            if (mysqli_query($conn, $sql)) {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Success</strong> You are registered successfully.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
                setcookie("name",$name,time()+86400,"/");
                setcookie("phoneno", $phoneno, time()+86400, "/");
                setcookie("roll", $roll, time()+86400, "/");
                setcookie("password", $password, time()+86400, "/");

                include 'sms.php';
                message("{$roll} and {$password}", $phoneno);
            }
        } catch (Exception $e) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Warning!</strong> You are already registered.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
        }
    }
    ?>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form action="quiz.php" method="POST">
                    <div class="input-field">
                        <input type="text" placeholder="Exam Roll Number" name="roll" required>
                        <i class="uil uil-books"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Password" name="password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>

                    </div>
                    <div class="input-field button">
                        <input type="submit" name="login" value="Login Now">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not yet registered ?
                        <a href="#" class="text signup-link">Signup now</a>
                    </span>
                </div>
            </div>

            <div class="form signup">
                <span class="title">Registration</span>

                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                    <div class="input-field">
                        <input type="text" placeholder="Name" name="name" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Exam Roll Number" name="roll" required>
                        <i class="uil uil-books"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Phone No" name="phoneno" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Password" name="password" required>
                        <i class="uil uil-lock icon"></i>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Register" name="register">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already registered?
                        <a href="#" class="text login-link">Login</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script>
        const container = document.querySelector(".container"),
            pwShowHide = document.querySelectorAll(".showHidePw"),
            pwFields = document.querySelectorAll(".password"),
            signUp = document.querySelector(".signup-link"),
            login = document.querySelector(".login-link");

        //   js code to show/hide password and change icon
        pwShowHide.forEach(eyeIcon => {
            eyeIcon.addEventListener("click", () => {
                pwFields.forEach(pwField => {
                    if (pwField.type === "password") {
                        pwField.type = "text";

                        pwShowHide.forEach(icon => {
                            icon.classList.replace("uil-eye-slash", "uil-eye");
                        })
                    } else {
                        pwField.type = "password";

                        pwShowHide.forEach(icon => {
                            icon.classList.replace("uil-eye", "uil-eye-slash");
                        })
                    }
                })
            })
        })

        // js code to appear signup and login form
        signUp.addEventListener("click", () => {
            container.classList.add("active");
        });
        login.addEventListener("click", () => {
            container.classList.remove("active");
        });
    </script>

</body>

</html>