<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $captcha_text = $_GET['text'];
    $im = imagecreatetruecolor(200, 50); // Adjust dimensions as needed
    $bg = imagecolorallocate($im, 22, 86, 165); // Blue background
    $fg = imagecolorallocate($im, 255, 255, 255); // White text
    imagefill($im, 0, 0, $bg);
    imagestring($im, 5, rand(10, 30), rand(10, 30), $captcha_text, $fg);
    header('Content-Type: image/png');
    imagepng($im);
    imagedestroy($im);
}
?>