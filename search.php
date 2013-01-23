<?php
/*
 *  Prochains departs sur le web
 *  Copyright (C) 2010 Richard Genoud
 *
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or (at
 *  your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful, but
 *  WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 *  General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License along
 *  with this program; if not, write to the Free Software Foundation, Inc.,
 *  59 Temple Place, Suite 330, Boston, MA 02111-1307 USA.
 *
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 */

if(!isset($_POST['nom']))
    header('Location: menu.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
	<meta http-equiv="Content-Script-Type" content="text/javascript"/>
	<meta name="description" content="clone du widget prochains departs de la sncf"/>
	<meta name="keywords" content="sncf,horaires,prochains departs,gare en mouvement,retard,train"/>
<title>Prochains D&eacute;parts - Recherche</title>
</head>
<body>
<?php
    $ret = file_get_contents('http://widget.canaltp.fr/Prochains_departs_15122009/dev/gare.php?txtrech=' . $_POST['nom']);
    $ret = preg_replace('#^&#', '', $ret);
    $liste = explode('&', $ret);
    /*
    echo '<pre>';
    echo $_POST['nom'] . "\n";
    echo $ret . "\n";
    print_r($liste);
    echo '</pre>';
    */
?><a href="menu.php">Retour</a>
<h3>Résultats</h3>
<ul>
<?php
    foreach($liste as $elem) {
        list($gid, $station) = explode('=', $elem);
        echo '<li><a target="right" href="./prochains_departs.php?station=' . $station . '&gid=' . $gid . '&nb=10">' . $station . '</a></li>';
    }
?>
</ul>
</body>
</html>