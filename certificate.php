<?php
session_start();
if(isset($_SESSION['player'])){
    header('content-type:image/jpeg');
    $font = "Poppins-Regular.ttf";
    $image = imagecreatefromjpeg("cert.jpeg");
    $color = imagecolorallocate($image, 34, 34, 34);
    $name = $_COOKIE['name'];
    $examroll = $_COOKIE['roll'];
    date_default_timezone_set('Asia/Kolkata');
    $date = date('d F, Y (H:i:s a)');
    $certno = rand(11111111, 99999999);
    include '_dbconnect.php';
    $sql = "update student set certno={$certno} where roll='{$examroll}'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    imagettftext($image, 24, 0, 190, 545, $color, $font, $name);
    imagettftext($image, 24, 0, 366, 595, $color, $font, $examroll);
    imagettftext($image, 24, 0, 165, 646, $color, $font, $date);
    imagettftext($image, 24, 0, 288, 695, $color, $font, $certno);
    imagejpeg($image, "Certificates/{$name}.jpeg");
    imagedestroy($image);
    // header("location:Certificates/{$name}.jpeg");
    if(!empty($_GET['file']))
    {
        $filename = basename($_GET['file']);
        $filepath = 'Certificates/'.$filename;
        if(!empty($filename) && file_exists($filepath))
        {
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename= $filename");
            header("Content-Type: application/zip");
            header("Content-Transfer-Encoding: binary");
            readfile($filepath);
        }
        else echo "Certificate can't be downloaded";
    }
    session_unset();
    session_destroy();
    setcookie("name", "", time() - 3600, "/");
    setcookie("roll", "", time() - 3600, "/");
    setcookie("phoneno", "", time() - 3600, "/");
    setcookie("password", "", time() - 3600, "/");
    
}
else{
    header("location: login.php");
}
?>