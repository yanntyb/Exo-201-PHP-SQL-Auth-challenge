<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./css/formulaire.css">
</head>
<body>
    <?php include "./parts/nav.php" ?>
    <div id="cont">
        <div id="form">
            <form action="checkLogin.php" method="post">
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name">
                </div>
                <div>
                    <label for="pass">Password</label>
                    <input type="password" name="pass">
                </div>
                <div>
                    <input type="submit">
                </div>
            </form>
        </div>
    </div>
</body>
</html>