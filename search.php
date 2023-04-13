<!DOCTYPE html>
<html lang="fr">

<?php
require_once 'employee.php';
?>

<head>
    <!--Primary Meta Tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunFactory | Annuaire</title>
    <meta name="title" content="FunFactory | Annuaire">
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
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/responsive/responsive-search.css">
</head>

<body>
    <header>
        <a href="./index.html" id="logoWrap">
            <img id="logo" src="./assets/img/branding/FunFactory(Alpha).png" alt="logo">
        </a>
        <h1>Recherche</h1>
        <button id="headerBtn" onclick="window.location.href='./login.html';">Connexion</button>
    </header>
    <main>
        <?php
        // Create a new Employee object
        require_once "test.php";
        ?>
        <table>
            <thead>
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Courriel</th>
                    <th>Poste</th>
                    <th>Département</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $firstname = $_POST["firstname"];
                $lastname = $_POST["lastname"];
                if (isset($_POST["ceo"])) {
                    $ceo = "ceo";
                } else {
                    $ceo = null;
                }
                if (isset($_POST["director"])) {
                    $director = "director";
                } else {
                    $director = null;
                }
                if (isset($_POST["chief"])) {
                    $chief = "chief";
                } else {
                    $chief = null;
                }
                if (isset($_POST["employee"])) {
                    $employee = "employee";
                } else {
                    $employee = null;
                }
                foreach ($employees as $emp) {
                    if (($firstname == null || $emp->getName() == $firstname) && ($lastname == null || $emp->getLastName() == $lastname)
                        && (($emp->getWorkplace() == $ceo || $emp->getWorkplace() == $director || $emp->getWorkplace() == $chief || $emp->getWorkplace() == $employee)
                            || ($ceo == null && $director == null && $chief == null && $employee == null))
                    ) {
                        $onclick = './profil.html';
                        $onclick2 = "window.location=" . $onclick . ";";
                        $onclick3 = "<tr onclick='" . $onclick . "'>";
                        echo "<tr <a href='./profil.html'>>";
                        echo "<td>" . $emp->getName() . "</td>\n";
                        echo "<td>" . $emp->getLastName() . "</td>\n";
                        echo "<td>" . $emp->getMail() . "</td>\n";
                        echo "<td>" . $emp->getWorkplace() . "</td>\n";
                        echo "<td>" . $emp->getDepartment() . "</td>\n";
                        echo "</tr>\n";
                    }
                }
                ?>
            </tbody>
        </table>
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
                <a href="./help.html">aide à la recherche</a>
                <a href="./legal.html">mentions légales</a>
                <a href="./sitemap.xml">plan du site</a>
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
