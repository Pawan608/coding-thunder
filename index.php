<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Year Project IT</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body style="overflow: hidden;">
    <div class="container">
        <span class="text first-text">Welcome to</span>
        <span class="text sec-text"></span>
    </div>
    <div class="button">
        <br>
        <a href="login.php">Login/register</a>
        <a href="quiz.php">Take Test</a>
        <a href="result.php">Result</a>
        <a href="verify_cert.php">Verify certificate</a>
    </div>
    <script>
        const text = document.querySelector(".sec-text")
        const textLoad = () => {
            setTimeout(() => {
                text.textContent = "Coding Thunder 4.0";
            }, 0)

            setTimeout(() => {
                text.textContent = "a Quiz application";
            }, 4000)

            setTimeout(() => {
                text.textContent = "our Final Year Project";
            }, 8000)
        }
        textLoad();
        setInterval(textLoad, 12000);
    </script>
</body>

</html>