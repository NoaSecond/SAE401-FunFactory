<?php

require_once "employee.php";
$serveur_ad_ip = "10.22.32.6";
$serveur_ad_port = "389";
$ldap_dn = "CN=Administrateur,CN=Users,DC=FUNFACTORY,DC=local";
$passeadmin = "IUT!2023";

$con = ldap_connect("ldap://" . $serveur_ad_ip . ":" . $serveur_ad_port);
ldap_set_option($con, LDAP_OPT_PROTOCOL_VERSION, 3);
#$ldap_con = ldap_connect("ldap.forumsys.com");

$employees = [];

if (ldap_bind($con, $ldap_dn, $passeadmin)) {
    $filter = "primaryGroupId=" . 513;
    $result = ldap_search($con, "dc=FUNFACTORY,dc=local", $filter);
    if (!$result) {
        die("ldap_search() failed: " . ldap_error($con));
    }
    $entries = ldap_get_entries($con, $result);

    for ($i = 2; $i < count($entries) - 1; $i++) {
        $prenom = $entries[$i]["givenname"]["0"];
        $nom = $entries[$i]["cn"]["0"];
        $mail = $entries[$i]["mail"]["0"];
        $login = $entries[$i]["samaccountname"]["0"];
        $phonePro = 0 . $entries[$i]["telephonenumber"]["0"];
        $phonePerso = 0 . $entries[$i]["homephone"]["0"];
        $password = $login . "@2023";
        $address = $entries[$i]["streetaddress"]["0"];
        $dn = $entries[$i]["dn"];
        $dn_array = explode(',', $dn);
        $dnRole = substr($dn_array[1], 3);
        if ($dnRole != "Managers" && $dnRole != "PDG" && $dnRole != "Cadres") {
            $dnRole = "Employe";
        }
        $departement = substr($dn_array[1], 3);
        if ($dnRole == "PDG") {
            $departement = null;
        } else if ($dnRole == "Managers" || $dnRole == "Cadres") {
            $d = $entries[$i]["managedobjects"]["0"];
            $dn_array = explode(',', $d);
            $departement = substr($dn_array[0], 3);
            if ($departement == "Cadres") {
                $d = $entries[$i]["managedobjects"]["1"];
                $dn_array = explode(',', $d);
                $departement = substr($dn_array[0], 3);
            }
        }

        $adm = false;
        if (isset($entries[$i]["memberof"])) {
            try {
                $admin = $entries[$i]["memberof"]["0"];
                $admin_array = explode(',', $admin);
                $adminGroup = substr($admin_array[0], 3);

                if ($adminGroup == "Grp_AdmAD") {
                    $adm = true;
                }
            } catch (Exception $e) {
                // Gérer l'exception ici, si nécessaire
            }
        }
        $employees[$i - 2] =  new Employee($i, $prenom, $nom, $mail, $password, $login, $phonePro, $phonePerso, $address, $dnRole, $departement, $admin);
    }
    ldap_unbind($con);

    $pdg = $employees[0];
    $mMF = $employees[1];
    $mP = $employees[2];
    $mRH = $employees[3];
    $mDA = $employees[4];
    $mC = $employees[5];
    $cM = $employees[6];
    $cF = $employees[7];
    for ($i = 0; $i < count($employees); $i++) {
        $superior = $pdg;
        $wp = $employees[$i]->getWorkplace();
        $dp = $employees[$i]->getDepartment();
        if ($wp == "Managers") {
            $superior = $pdg;
        } else if ($wp == "Cadres") {
            if ($departement == "PromoEtCom" || $departement == "Gestion") {
                $superior = $mMF;
            }
        } else if ($wp == "Employe") {
            if ($dp == "PromoEtCom") {
                $superior = $cM;
            } else if ($dp == "Gestion") {
                $superior = $cF;
            } else if ($dp == "RH") {
                $superior = $mRH;
            } else if ($dp == "Production") {
                $superior = $mP;
            } else if ($dp == "Conception") {
                $superior = $mC;
            } else if ($dp == "Artistique") {
                $superior = $mDA;
            }
        }
        $employees[$i]->setSuperior($superior);
    }
} else {
    echo "Invalid user";
}

$_SESSION['employees'] = $employees;
