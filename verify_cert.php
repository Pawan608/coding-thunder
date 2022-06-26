<?php
    if(isset($_POST['verify']))
    {
        include '_dbconnect.php';
        $sql = "select certno,name,roll,marks from student where certno={$_POST['cert']}";
        if(mysqli_num_rows(mysqli_query($conn, $sql))==1){
            $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
            $candidate_name = $result['name'];
            $candidate_roll = $result['roll'];
            $candidate_marks = $result['marks'];
            $candidate_cert = $result['certno'];
            if($candidate_cert!=0)
            {
                echo "<div class='container'>
    <div class='forms'>
        <div class='form login'>
            <span class='title'>Verified</span>
            <br><br>
            <p>Name : $candidate_name</p>
            <p>Roll : $candidate_roll</p>
            <p>Marks : $candidate_marks</p>
            <p>Cerificate number : $candidate_cert</p>
        </div>
    </div>
</div>";
            }
            else{
                echo "<div class='container'>
    <div class='forms'>
        <div class='form login'>
            <span class='title'>No certificate found</span>
        </div>
    </div>
</div>";
            }
        }
        else
        {
        echo "<div class='container'>
    <div class='forms'>
        <div class='form login'>
            <span class='title'>No certificate found</span>
        </div>
    </div>
</div>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="assets/login.css">
    <title>Verify certificate</title>
</head>

<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Verify certificate</span>

                <form action="verify_cert.php" method="POST">
                    <div class="input-field">
                        <input type="text" placeholder="Certificate number" name="cert" required>
                        <i class="uil uil-books"></i>
                    </div>
                    <div class="input-field button">
                        <input type="submit" name="verify" value="Verify">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
