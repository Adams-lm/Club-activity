<?php
  
  session_start();

  // Set some important CAPTCHA constants
  define('CAPTCHA_NUMCHARS', 4);  // number of characters in pass-phrase
  define('CAPTCHA_WIDTH', 70);   // width of image
  define('CAPTCHA_HEIGHT', 25);   // height of image

  // Generate the random pass-phrase
  $pass_phrase = "";
  for ($i = 0; $i < CAPTCHA_NUMCHARS; $i++) {
    $pass_phrase .= chr(rand(97, 122));
  }

  // Store the encrypted pass-phrase in a session variable
  $_SESSION['pass_phrase'] = SHA1($pass_phrase);
  

  // Create the image
  $img = imagecreatetruecolor(CAPTCHA_WIDTH, CAPTCHA_HEIGHT);

  // Set a white background with black text and gray graphics
  $bg_color = imagecolorallocate($img, 255, 255, 255);     // white
  $text_color = imagecolorallocate($img, 0, 0, 0);         // black
  $graphic_color = imagecolorallocate($img, 64, 64, 64);   // dark gray

  // Fill the background
  imagefilledrectangle($img, 0, 0, CAPTCHA_WIDTH, CAPTCHA_HEIGHT, $bg_color);
  // Draw some random lines
  for ($i = 0; $i < 3; $i++) {
    imageline($img, 0, rand() % CAPTCHA_HEIGHT, CAPTCHA_WIDTH, rand() % CAPTCHA_HEIGHT, $graphic_color);
  }

  // Sprinkle in some random dots
  for ($i = 0; $i < 50; $i++) {
    imagesetpixel($img, rand() % CAPTCHA_WIDTH, rand() % CAPTCHA_HEIGHT, $graphic_color);
  }
  // Draw the pass-phrase string
  $font = dirname(__FILE__) ."/my_font.ttf";
  imagettftext($img, 18, 0, 5, CAPTCHA_HEIGHT - 5, $text_color,  $font, $pass_phrase);

  // Output the image as a PNG using a header
  // header("Content-type: image/png");
  // imagepng($img);
  imagepng($img, "passPhrase.png");
  echo "../php/passPhrase.png";

  // Clean up
  imagedestroy($img);
?>
