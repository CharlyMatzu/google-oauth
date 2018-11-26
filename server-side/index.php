<?php include_once "config.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h2><a href="auth.php">Sign in</a></h2>

    <!-- TODO: Add popup oauth -->
<!--    <h2><button onclick="popup()">Sign in PopUp</button></h2>-->
    <!-- <script>
        function popup() {
            let pop = window.open('<?= $authURL; ?>', "Goolge Oauth2", "width=600,height=500");
            if (window.focus) {
                pop.focus();
            }
        }
    </script> -->

</body>
</html>