<!DOCTYPE html>
<html lang="fr">

<head>
    <!--Primary Meta Tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunFactory | Mentions légales</title>
    <meta name="title" content="FunFactory | Mentions légales">
    <meta name="description" content="FunFactory - Développement de jeux vidéos">
    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/responsive/responsive-stylesheet.css">
</head>

<body>
    <header>
        <a href="./index.php" id="logoWrap">
            <img id="logo" src="./assets/img/branding/FunFactory(Alpha).png" alt="logo">
        </a>
        <h1>Mentions légales</h1>
        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['loggedin'])) {
            if ($_SESSION['loggedin'] == 0)
                echo '<button id="headerBtn" onclick="window.location.href=\'./login.php\';">Connexion</button>';
            else
                echo '<button id="headerBtn" onclick="window.location.href=\'./deconnexion.php\';">Deconnexion</button>';
        } else echo '<button id="headerBtn" onclick="window.location.href=\'./login.php\';">Connexion</button>';
        ?>
    </header>
    <main>
    </main>
    <footer>
        <div>
            <h2>Information législative :</h2>
            <a>La constitution et l'utilisation de cet annuaire professionnel sont soumises
                aux dispositions légales françaises en vigueur concernant les traitements
                nominatifs (Loi 78-17). La capture des informations nominatives aux fins de
                création d'un autre traitement (par exemple usage commercial ou publicitaire)
                est strictement interdite pour tous pays (directive 95/46/CE du parlement européen)</a>
        </div>
        <div>
            <div>
                <h2>Liens :</h2>
                <a href="./assets/Document d'aide.pdf" target="_blank">aide à la recherche</a>
                <a href="./legal.php">mentions légales</a>
                <a href="./sitemap.xml" target="_blank">plan du site</a>
            </div>
            <div>
                <h2>Contact :</h2>
                <a href="mailto:contact@funfactory.com?subject=Demande... web&body=Détail :   ...%0ALiens :   ...">contact@funfactory.com</a>
                <a href="sms:0793298654?body=Détail de la demande :">07 93 29 86 54</a>
            </div>
        </div>
    </footer>
</body>

</html>