<?php
    #setcookie('RSail', '0', time() + 3600 * 24, 'admin/');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>

    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="css/admin.css"/>
    <link rel="icon" href="img/ico/favicon.png" type="image/png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body>
    <?php if ($_COOKIE['RSail'] == '0'):?>
        <?php
            require "Authorize.php"            
        ?>
    <?php else:
        
        ?>
    <?php endif?>

    <!-- <script>
        const output = document.cookie;
        const parts = output.split(`RSail=`)[1];
        window.location.replace('/admin/Authorize.php');
    </script> -->
</body>

</html>