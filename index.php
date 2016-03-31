<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WebMobile</title>
    <link rel="stylesheet" type="text/css" href="css.css">
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <?php session_start();?>
</head>
<body>

<h1>WebMobile</h1>
<!-- Display php log data -->
<?php if(isset($_SESSION['log'])){
    echo $_SESSION['log'];
}
    ?>

<div id="container">
<div id="thumbnails"></div>
    <div id="largeImg">
        <img src="img/large/b.jpg">
    </div>
</div>

<script src="thumbs.js"></script>
</body>
</html>