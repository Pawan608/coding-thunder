<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap');

    body {
        user-select: none;
        padding: 0;
        margin: 0;
        font-family: 'Poppins', sans-serif;
    }

    table {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        border-collapse: collapse;
        width: 800px;
        height: 200px;
        border: 2px solid #4070f4;
        box-shadow: 20px 20px 20px grey;
        border-radius: 20px;
    }

    tr {
        transition: all .2s ease-in;
    }

    th,
    td {
        padding: 12px;
        text-align: center;
        border-bottom: 2px solid #4070f4;
    }

    thead {
        background-color: #4070f4;
        color: whitesmoke;
    }

    tbody {
        background-color: #444;
        color: whitesmoke;
    }

    .h2index {
        font-family: 'Poppins';
        text-align: center;
        font-size: 30px;
        font-weight: 600;
        color: #222;
        margin-top: 40px;
        text-shadow: 2px 10px 15px grey;
        user-select: none;
    }


    .h2spanindex {
        font-family: 'Poppins';
        text-align: center;
        font-size: 30px;
        color: #4070f4;
        margin-top: 80px;
        text-shadow: 2px 10px 15px #4070f4;
        user-select: none;
    }
</style>

<body>
    <br>
    <br>
    <h2 class="h2index"> View your <span class="h2spanindex">result</span></h2>
    <table id="header">
        <thead>
            <th>Roll Number</th>
            <th>Name</th>
            <th>Marks</th>
        </thead>
        <tbody>
            <?php
            include '_dbconnect.php';
            $sql = "select roll,name,marks from student order by marks desc";
            mysqli_query($conn, $sql);
            $result = mysqli_fetch_all(mysqli_query($conn, $sql));
            for ($i = 0; $i < count($result); $i++) {
                echo "<tr>";
                for ($j = 0; $j < count($result[$i]); $j++) {
                    echo "<td>";
                    print_r($result[$i][$j]);
                    echo "</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>