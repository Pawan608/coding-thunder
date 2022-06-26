<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
    include '_dbconnect.php';
    function filter($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $roll = filter(strtoupper($_POST['roll']));
    $password = filter($_POST['password']);
    $sql1 = "select * from student where roll='$roll' and password='$password'";
    if (mysqli_num_rows(mysqli_query($conn, $sql1)) == 1) {
        $_SESSION['player'] = true;
        $sql2 = "select submit from student where roll='{$roll}'";
        $sub = mysqli_query($conn, $sql2);
        $submit = mysqli_fetch_assoc($sub);
        if ($submit['submit'] == 'Y') {
            header('location:already_played.php');
        }

        } elseif (!isset($_SESSION['player'])) {
        header("location: login.php");
    } else {
        header('location:check_cred.php');
    }
} 
else {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/quiz.css">
    <title>Quiz</title>
</head>

<body>
    <form action="score.php" method="GET">
        <div class="quiz-container" id="quiz">
            <div class="quiz-header">
                <h2 id="question">Q1. Which format specifier will take integer as input ?</h2>
                <ul>
                    <li>
                        <label><input type="radio" name="q1" value="a" class="answer">&nbsp;%d</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q1" value="b" class="answer">&nbsp;%f</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q1" value="c" class="answer">&nbsp;%u</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q1" value="d" class="answer">&nbsp;None of the Above</label>
                    </li>

                </ul>
                <br>
                <h2 id="question">Q2. Who is the founder of C Programming Language ?</h2>
                <ul>
                    <li>
                        <label><input type="radio" name="q2" value="a" class="answer">&nbsp;James Gosling</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q2" value="b" class="answer">&nbsp;Dennis Ritchie</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q2" value="c" class="answer">&nbsp;Tim Berners Lee</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q2" value="d" class="answer">&nbsp;Brendan Eich</label>
                    </li>

                </ul>
                <br>
                <h2 id="question">Q3. Can a pointer access an array ?</h2>
                <ul>
                    <li>
                        <label><input type="radio" name="q3" value="a" class="answer">&nbsp;Yes</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q3" value="b" class="answer">&nbsp;No</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q3" value="c" class="answer">&nbsp;Can't Say</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q3" value="d" class="answer">&nbsp;Data Insufficient</label>
                    </li>

                </ul>
                <br>
                <h2 id="question">Q4. Input from the user is taken by ?</h2>
                <ul>
                    <li>
                        <label><input type="radio" name="q4" value="a" class="answer">&nbsp;printf( )</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q4" value="b" class="answer">&nbsp;getch( )</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q4" value="c" class="answer">&nbsp;clrscr( )</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q4" value="d" class="answer">&nbsp;scanf( )</label>
                    </li>

                </ul>
                <br>
                <h2 id="question">Q5. Variable declared outside the function is called ?</h2>
                <ul>
                    <li>
                        <label><input type="radio" name="q5" value="a" class="answer">&nbsp;Temporary variable</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q5" value="b" class="answer">&nbsp;Local variable</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q5" value="c" class="answer">&nbsp;Global variable</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q5" value="d" class="answer">&nbsp;Pointer variable</label>
                    </li>

                </ul>
                <br>
                <h2 id="question">Q6. Size of int on a 64-bit machine ?</h2>
                <ul>
                    <li>
                        <label><input type="radio" name="q6" value="a" class="answer">&nbsp;1 Byte</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q6" value="b" class="answer">&nbsp;4 Bytes</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q6" value="c" class="answer">&nbsp;8 Bytes</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q6" value="d" class="answer">&nbsp;2 Bytes</label>
                    </li>

                </ul>
                <br>
                <h2 id="question">Q7. How many arguments does for( ) loop take ?</h2>
                <ul>
                    <li>
                        <label><input type="radio" name="q7" value="a" class="answer">&nbsp;0 arguments</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q7" value="b" class="answer">&nbsp;3 arguments</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q7" value="c" class="answer">&nbsp;2 arguments</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q7" value="d" class="answer">&nbsp;1 argument</label>
                    </li>

                </ul>
                <br>
                <h2 id="question">Q8. Which of the operators have higher precedence ?</h2>
                <ul>
                    <li>
                        <label><input type="radio" name="q8" value="a" class="answer">&nbsp;Logical AND</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q8" value="b" class="answer">&nbsp;Logical OR</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q8" value="c" class="answer">&nbsp;Same precedence</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q8" value="d" class="answer">&nbsp;None of the above</label>
                    </li>

                </ul>
                <br>
                <h2 id="question">Q9. Which of the following is not a valid declaration ?</h2>
                <ul>
                    <li>
                        <label><input type="radio" name="q9" value="a" class="answer">&nbsp;short int x;</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q9" value="b" class="answer">&nbsp;signed short x;</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q9" value="c" class="answer">&nbsp;short x;</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q9" value="d" class="answer">&nbsp;short 0x_;</label>
                    </li>

                </ul>
                <br>
                <h2 id="question">Q10. Which function converts 1.98 to 1 ?</h2>
                <ul>
                    <li>
                        <label><input type="radio" name="q10" value="a" class="answer">&nbsp;floor( )</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q10" value="b" class="answer">&nbsp;abs( )</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q10" value="c" class="answer">&nbsp;ceil( )</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q10" value="d" class="answer">&nbsp;fabs( )</label>
                    </li>

                </ul>
                <br>
                <!-- <h2 id="question">Q11. What is the default return type of getchar( ) ?</h2>
                <ul>
                    <li>
                        <label><input type="radio" name="q11" value="a" class="answer">&nbsp;Character</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q11" value="b" class="answer">&nbsp;Character *</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q11" value="c" class="answer">&nbsp;Integer</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q11" value="d" class="answer">&nbsp;No return type</label>
                    </li>

                </ul>
                <br>
                <h2 id="question">Q12. Which header file has variable argument function ?</h2>
                <ul>
                    <li>
                        <label><input type="radio" name="q12" value="a" class="answer">&nbsp;stdlib.h</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q12" value="b" class="answer">&nbsp;stdargs.h</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q12" value="c" class="answer">&nbsp;ctype.h</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q12" value="d" class="answer">&nbsp;Both A and B</label>
                    </li>

                </ul>
                <br>
                <h2 id="question">Q13. What will be the output of the following code ?<br><br>j=10;<br>printf("%d\n", j++);<br>getch( );</h2>
                <ul>
                    <li>
                        <label><input type="radio" name="q13" value="a" class="answer">&nbsp;10</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q13" value="b" class="answer">&nbsp;0</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q13" value="c" class="answer">&nbsp;11</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q13" value="d" class="answer">&nbsp;Compile time error</label>
                    </li>

                </ul>
                <br>
                <h2 id="question">Q14. What is mandatory in function declaration ?</h2>
                <ul>
                    <li>
                        <label><input type="radio" name="q14" value="a" class="answer">&nbsp;return type, function name</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q14" value="b" class="answer">&nbsp;return type, function name, parameters</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q14" value="c" class="answer">&nbsp;function name, parameters</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q14" value="d" class="answer">&nbsp;parameters, variables</label>
                    </li>

                </ul>
                <br>
                <h2 id="question">Q15. Which datatype has variable size ?</h2>
                <ul>
                    <li>
                        <label><input type="radio" name="q15" value="a" class="answer">&nbsp;int</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q15" value="b" class="answer">&nbsp;struct</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q15" value="c" class="answer">&nbsp;double</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q15" value="d" class="answer">&nbsp;float</label>
                    </li>

                </ul>
                <br>
                <h2 id="question">Q16. Find error in the code ?<br><br>int i=10, j=15;<br>if(i%2 = j%3)<br>printf("IT Project");<br>getch( );</h2>
                <ul>
                    <li>
                        <label><input type="radio" name="q16" value="a" class="answer">&nbsp;Comppiles successfully</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q16" value="b" class="answer">&nbsp;Expression value syntax</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q16" value="c" class="answer">&nbsp;LValue required</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q16" value="d" class="answer">&nbsp;RValue required</label>
                    </li>

                </ul>
                <br>
                <h2 id="question">Q17. What will be the output of the following program ? <br><br>int x= 24, y= 39, z= 45;<br>z = x+y;<br>y = z-y;<br>x= z-y;<br>printf("%d %d %d", x,y,z);</h2>
                <ul>
                    <li>
                        <label><input type="radio" name="q17" value="a" class="answer">&nbsp;24, 39, 63</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q17" value="b" class="answer">&nbsp;39, 24, 63</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q17" value="c" class="answer">&nbsp;24, 39, 45</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q17" value="d" class="answer">&nbsp;39, 24, 45</label>
                    </li>
                </ul>
                <br>
                <h2 id="question">Q18. What will be the output of the following program ?<br><br>int x=12,y=7,z;<br>z= x!=4 ||y==2;<br>printf("z = %d\n", z);<br>getch( );</h2>
                <ul>
                    <li>
                        <label><input type="radio" name="q18" value="a" class="answer">&nbsp;z = 0</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q18" value="b" class="answer">&nbsp;z = 2</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q18" value="c" class="answer">&nbsp;z = 4</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q18" value="d" class="answer">&nbsp;z = 1</label>
                    </li>
                </ul>
                <br>
                <h2 id="question">Q19. What will be the output of the following program ?<br><br>int k, num=30;<br>k = (num<10) ? 100 : 200;<br> printf("%d \n", num);</h2>
                <ul>
                    <li>
                        <label><input type="radio" name="q19" value="a" class="answer">&nbsp;30</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q19" value="b" class="answer">&nbsp;500</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q19" value="c" class="answer">&nbsp;100</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q19" value="d" class="answer">&nbsp;200</label>
                    </li>
                </ul>
                <br>
                <h2 id="question">Q20. What will be the output of the following program ?<br><br>int a = 10, b = 25; <br>a = b++ + a++;<br>b = ++b + ++a;<br>printf("%d %d",a,b);</h2>
                <ul>
                    <li>
                        <label><input type="radio" name="q20" value="a" class="answer">&nbsp;36, 64</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q20" value="b" class="answer">&nbsp;35, 63</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q20" value="c" class="answer">&nbsp;37, 64</label>
                    </li>

                    <li>
                        <label><input type="radio" name="q20" value="d" class="answer">&nbsp;35, 62</label>
                    </li>
                </ul> -->
            </div>

            <input type="submit" class="hogaya" value="Submit" name="sub"/>

        </div>
    </form>
</body>

</html>