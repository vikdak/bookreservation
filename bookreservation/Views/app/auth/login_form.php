<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet"
          href=https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css
          integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="css/form.css" />
    <title>bookreservation</title>
</head>
<body>
<main>
    <div class="container">
        <div class="left">
            <div class="message-wrapper">
                <?php
                if(($_SESSION['message'] ?? '')){
                    $color = (isset($_SESSION['user_found']) &&
                        $_SESSION['user_found'] === 0) ? 'success' : 'danger' ;

                    echo (new Message('Klaida', $_SESSION['message'], $color))->message();
                }
                ?>

            </div>
            <div class="header">
                <h2 class="animation a1">Knygų rezervacija</h2>
                <h4 class="animation a2">Prisijunkite prie savo paskyros naudodami elektroninio pašto adresą ir slaptažodį</h4>
            </div>
            <form  class="form" action="login.php" method="POST">
                <input type="email" class="form-field animation a3" name="email" placeholder="Elektroninis paštas">
                <input type="password" class="form-field animation a4" name="password" placeholder="Slaptažodis">
                <input type="submit" class="button animation a5" value="PRISIJUNGTI">
            </form>
        </div>
        <div class="right"></div>
    </div>
</main>
</body>
</html>


