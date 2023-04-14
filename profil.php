<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">

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
    <link rel="stylesheet" href="css/profil.css">
    <link rel="stylesheet" href="css/responsive/responsive-profil.css">
</head>

<body>
    <?php
    require_once 'employee.php';
    require_once 'registerEmployee.php';
    $id = $_GET['id'];
    foreach ($employees as $emp) {
        if ($emp->getId() == $id) {
            $employee = $emp;
        }
    }
    ?>
    <header>
        <a href="./index.php" id="logoWrap">
            <img id="logo" src="./assets/img/branding/FunFactory(Alpha).png" alt="logo">
        </a>
        <h1><?php
            echo $employee->getName() . " " . $employee->getLastName();
            ?></h1>
        <?php
        if (isset($_SESSION['loggedin'])) {
            if ($_SESSION['loggedin'] == 0)
                echo '<button id="headerBtn" onclick="kwindow.location.href=\'./login.php\';">Connexion</button>';
            else
                echo '<button id="headerBtn" onclick="window.location.href=\'./deconnexion.php\';">Deconnexion</button>';
        } else echo '<button id="headerBtn" onclick="window.location.href=\'./login.php\';">Connexion</button>';
        ?>
    </header>
    <main>
        <?php
        if (isset($_SESSION['login'])) {
            if ($_SESSION['login'] == $employee->getLogin() || $employee->getAdmin() == true) {
                echo "
        <div id='contentWrap'>
            <div>
                <div class='left'>
                    <h2>Informations :</h2>
                    <a>Prénom : " . $employee->getName() . "</a>
                    <a>Nom : " . $employee->getLastName() . "</a>
                    <a>Login : " . $employee->getLogin() . "</a>
                </div>
                <div class='right'>
                    <h2>Contact :</h2>
                    <span>E-mail : <a href='#'>" . $employee->getMail() . "</a></span>
                    <span>Tél (Pro.) : <a href='#'>" . $employee->getPhonePro() . "</a></span>
                    <span>Tél (Perso.) : <a href='#'>" . $employee->getPhonePerso() . "</a></span>
                    <a>Adresse : " . $employee->getAddress() . "</a>
                </div>
            </div>
            <div>
                <div class='left'>
                    <h2>Poste :</h2>
                    <a>Niveau : " . $employee->getWorkplace() . "</a>";

                if ($employee->getWorkplace() != "PDG") {
                    echo "<a>Secteur : " . $employee->getDepartment() . "</a>";
                }

                echo "</div>";


                if ($employee->getWorkplace() != "PDG") {
                    if ($employee->getWorkplace() == "Managers") {
                        echo "
                    <div class='right'>
                    <h2>Hiérarchie :</h2>
                    <ul>
                        <li>Directeur Général : <a href='#'>" . $employee->getSuperior()->getName() . " " . $employee->getSuperior()->getLastName() . "</a></li>
                    </ul>
                </div>";
                    } else if ($employee->getWorkplace() == "Cadres") {
                        echo "
                    <div class='right'>
                    <h2>Hiérarchie :</h2>
                    <ul>
                    <li>Directeur Général : <a href='#'>" . $employee->getSuperior()->getSuperior()->getName() . " " . $employee->getSuperior()->getSuperior()->getLastName() . "</a></li>
                    <li>Manager du secteur : <a href='#'>" . $employee->getSuperior()->getName() . " " . $employee->getSuperior()->getLastName() . "</a></li>
                    </ul>
                    </div>";
                    } else {
                        if ($employee->getDepartment() == "Gestion" || $employee->getDepartment() == "PromoEtCom") {
                            echo "
                    <div class='right'>
                    <h2>Hiérarchie :</h2>
                    <ul>
                    <li>Directeur Général : <a href='#'>" . $employee->getSuperior()->getSuperior()->getSuperior()->getName() . " " . $employee->getSuperior()->getSuperior()->getSuperior()->getLastName() . "</a></li>
                    <li>Manager du secteur : <a href='#'>" . $employee->getSuperior()->getSuperior()->getName() . " " . $employee->getSuperior()->getSuperior()->getLastName() . "</a></li>
                    <li>Cadre du secteur : <a href='#'>" . $employee->getSuperior()->getName() . " " . $employee->getSuperior()->getLastName() . "</a></li>
                    </ul>
                    </div>";
                        } else {
                            echo "
                    <div class='right'>
                    <h2>Hiérarchie :</h2>
                    <ul>
                    <li>Directeur Général : <a href='#'>" . $employee->getSuperior()->getSuperior()->getName() . " " . $employee->getSuperior()->getSuperior()->getLastName() . "</a></li>
                    <li>Manager du secteur : <a href='#'>" . $employee->getSuperior()->getName() . " " . $employee->getSuperior()->getLastName() . "</a></li>
                    </ul>
                    </div>";
                        }
                    }

                    echo "
            </div>
        </div>";
                }
            } else {
                echo "
            <div id='contentWrap'>
                <div>
                    <div class='left'>
                        <h2>Informations :</h2>
                        <a>Prénom : " . $employee->getName() . "</a>
                        <a>Nom : " . $employee->getLastName() . "</a>
                    </div>
                    <div class='right'>
                        <h2>Contact :</h2>
                        <span>E-mail : <a href='#'>" . $employee->getMail() . "</a></span>
                        <span>Tél (Pro.) : <a href='#'>" . $employee->getPhonePro() . "</a></span>
                    </div>
                </div>
                <div>
                    <div class='left'>
                        <h2>Poste :</h2>
                        <a>Niveau : " . $employee->getWorkplace() . "</a>";

                if ($employee->getWorkplace() != "PDG") {
                    echo "<a>Secteur : " . $employee->getDepartment() . "</a>";
                }
                echo "
                    </div>
                </div>
            </div>";
            }
        } else {
            echo "
            <div id='contentWrap'>
                <div>
                    <div class='left'>
                        <h2>Informations :</h2>
                        <a>Prénom : " . $employee->getName() . "</a>
                        <a>Nom : " . $employee->getLastName() . "</a>
                    </div>
                    <div class='right'>
                        <h2>Contact :</h2>
                        <span>E-mail : <a href='#'>" . $employee->getMail() . "</a></span>
                        <span>Tél (Pro.) : <a href='#'>" . $employee->getPhonePro() . "</a></span>
                    </div>
                </div>
                <div>
                    <div class='left'>
                        <h2>Poste :</h2>
                        <a>Niveau : " . $employee->getWorkplace() . "</a>";

            if ($employee->getWorkplace() != "PDG") {
                echo "<a>Secteur : " . $employee->getDepartment() . "</a>";
            }
            echo "
                    </div>
                </div>
            </div>";
        }
        ?>
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