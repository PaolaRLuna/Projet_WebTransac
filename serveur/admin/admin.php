<?php
    session_start();
    if(!isset($_SESSION['role'])){
         header('Location: ../../index.php');
         exit();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>Page admin</h1>
</body>
</html>