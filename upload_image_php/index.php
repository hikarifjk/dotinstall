<<<<<<< HEAD
<?php

ini_set('display_errors', 1);
define('MAX_FILE_SIZE', 1 * 1024 * 1024);
define('THUMBNAIL_WIDTH', 400);
define('IMAGES_DIR', __DIR__ . '/images');
define('THUMBNAIL_DIR', __DIR__ . '/thumbs');

if (!function_exists('imagecreatetruecolor')) {
  echo 'GO not installed';
  exit;
}

function h($s) {
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

require 'ImageUploader.php';
$uploader = new \MyApp\ImageUploader();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $uploader->upload();
}



?>

<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Image Uploader</title>
  <style>
  body {
    text-align: center;
    font-family: Arial, sans-serif;
  }
  </style>
</head>
<body>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php h(MAX_FILE_SIZE) ?>">
    <input type="file" name="image">
    <input type="submit" value="upload">

  </form>
</body>
</htlm>
=======
<?php

ini_set('display_errors', 1);
define('MAX_FILE_SIZE', 1 * 1024 * 1024);
define('THUMBNAIL_WIDTH', 400);
define('IMAGES_DIR', __DIR__ . '/images');
define('THUMBNAIL_DIR', __DIR__ . '/thumbs');

if (!function_exists('imagecreatetruecolor')) {
  echo 'GO not installed';
  exit;
}

function h($s) {
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

require 'ImageUploader.php';
$uploader = new \MyApp\ImageUploader();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $uploader->upload();
}

list($success, $error) = $uploader->getResults();

$images = $uploader->getImages();

?>

<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Image Uploader</title>
  <style>
  body {
    text-align: center;
    font-family: Arial, sans-serif;
  }
  ul {
    list-style: none;
    margin: 0;
    padding: 0;
  }
  li {
    margin-bottom: 5px;
  }
  </style>
</head>
<body>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo h(MAX_FILE_SIZE) ?>">
    <input type="file" name="image">
    <input type="submit" value="upload">

  </form>
  <?php if(isset($success)) : ?>
    <div class="msg success"><?php echo h($success); ?></div>
  <?php endif; ?>
  <?php if(isset($error)) : ?>
    <div class="msg error"><?php echo h($error); ?></div>
  <?php endif; ?>



  <ul>
    <?php foreach ($images as $image) : ?>
      <li>
        <a href="<?php echo h(basename(IMAGES_DIR)) . '/' . basename($image); ?>">
          <img src="<?php echo h($image); ?>">
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script>
    $(function(){
      $('.msg').fadeOut(3000);
    });
  </script>
</body>
</htlm>
>>>>>>> 72dc08876f901b0369aa24217b6652dc68d58604
