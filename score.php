<?php
if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['sub'])) {
	$marks = 0;
	$solution = array("q1" => $_GET['q1'] ?? null, "q2" => $_GET['q2'] ?? null, "q3" => $_GET['q3'] ?? null, "q4" => $_GET['q4'] ?? null, "q5" => $_GET['q5'] ?? null, "q6" => $_GET['q6'] ?? null, "q7" => $_GET['q7'] ?? null, "q8" => $_GET['q8'] ?? null, "q9" => $_GET['q9'] ?? null, "q10" => $_GET['q10'] ?? null);

	$answer = array("q1" => 'a', "q2" => 'b', "q3" => 'a', "q4" => 'd', "q5" => 'c', "q6" => 'b', "q7" => 'b', "q8" => 'a', "q9" => 'd', "q10" => 'a', "q11" => 'c', "q12" => 'b', "q13" => 'd', "q14" => 'a', "q15" => 'b', "q16" => 'c', "q17" => 'b', "q18" => 'd', "q19" => 'a', "q20" => 'c');
	$correct = 0;
	$attempt = 0;
	for ($i = 1; $i <= 10; $i++) {

		if ($solution["q" . "$i"] == $answer["q" . "$i"]) {
			$GLOBALS['marks'] += 10;
			$correct++;
		}

		if ($solution["q" . "$i"] != null) {
			$attempt++;
		}
	}
	include '_dbconnect.php';
	$roll = $_COOKIE['roll'];
	$candidate_name = $_COOKIE['name'];
	$sql = "update student set marks={$marks}, submit='Y' where roll='{$roll}'";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	include 'sms.php';
	message("Your marks: {$marks}", $_COOKIE['phoneno']);
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Score</title>
	<link rel="stylesheet" href="assets/score.css" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/score.css">
</head>

<body>
	<div class="containerindex">
		<br>
		<br>
		<h2 class="h2index"> Thank You <span class="h2spanindex"><?php echo $_COOKIE['name'] ?></span></h2>
		<br>
		<p class="pindex"><span class="pspanindex"> Your score</span><?php echo $marks ?><br><span class="pspanindex">Questions attempted</span><?php echo $attempt ?><br><span class="pspanindex">Correct answers</span><?php echo $correct ?></p>
		<p class="pindex">You can download your certificate from the link below</p>
		<br>
		<a class="cert" href='<?php echo "certificate.php?file=$candidate_name.jpeg"?>'>Download Certificate</a>
		<br>
	</div>
	<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
			</script>

</body>

</html>