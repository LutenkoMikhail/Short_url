<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Short Url</title>
    <meta charset='utf-8'>
    <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous">
    </script>
    <link href="css/main.css" rel="stylesheet">
</head>

<body>
<?php
$uri = trim($_SERVER['REQUEST_URI'], '/');
if (strlen($uri) > 0) {
    require_once dirname(__DIR__) . '/public/redirect.php';
}
?>

<div class="form_container">
    <form id="myform" action="" method="POST">
        <h2>Please, enter URL.</h2>
        <label for="url">URL:</label>
        <input id="text" type="text" name="url" pattern="^(http(s)?:\/\/)+[\w\-\._~:\/?#[\]@!\$&'\(\)\*\+,;=.]+$"
               required>
        <input type="submit" name="submit" value="Create Short Url">
        <br>
        <output id="short_url" name="result"></output>
    </form>
</div>

<script src="js/main.js"></script>
</body>
</html>
