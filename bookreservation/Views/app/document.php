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
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="stylesheet" href="css/form.css" />
    <link rel="stylesheet" href="css/main.css" />
    <title>bookreservation</title>
</head>
<body>
    <header>
        <nav class="nav">
            <div class="mask">
                <ul class="list">
                    <?php if ($_SESSION['is_authenticated'] ?? '') { ?>
                        <div class="dropdown" style="float:right;">
                            <button class="dropbtn">
                                <?php echo 'Sveiki prisijungę, '.$_SESSION['user']['first_name'].' '.$_SESSION['user']['last_name'] ?>
                            </button>
                            <div class="dropdown-content">
                                <a href="login.php?reset=1">Atsijungti</a>
                            </div>
                        </div>
                        <li><a href="statistic.php">Statistika</a></li>
                        <li><a href="create.php">Įdėti naują knygą</a></li>
                        <li><a href="index.php">Pagrindinis puslapis</a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>
<main>
        <?= $content ?? '' ?>
</main>
<script src="js/main.js"></script>
    <footer>
        <div>
            <p>&copy Copyright2022 Book reservation</p>
        </div>
    </footer>
</body>
</html>