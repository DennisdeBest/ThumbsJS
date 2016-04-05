<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ThumsbJS - city</title>
    <link rel="stylesheet" type="text/css" href="thumbs/css.css">
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <?php session_start();
    $_SESSION['dir']=ucfirst(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME));
    $_SESSION['width'] = 150; ?>
</head>
<body>
<h1>ThumbsJS</h1>
<!-- Display php log data -->
<?php if(isset($_SESSION['log'])){
    echo $_SESSION['log'];
}
?>

<div id="container">
    <nav><?php require_once('nav.php'); ?></nav>
    <div id="thumbnails"></div>
    <div id="largeImg">
    </div>
</div>

<script src="thumbs/thumbs.js"></script>
</body>
</html>