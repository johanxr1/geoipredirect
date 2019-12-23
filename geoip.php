<?php
//Links
$link1 = "www.mb102.com/lnk.asp?o=4619&c=918277&a=403214&k=C81FCC0D45098C724252A693625423B6&l=9986&s1=id1&s2=id2/";
$link2 = "";
$link3 = ""; //agregar la direccion SIN el hhtps//, si se deja vacia no abra ninguna redireccion en ese LINK
$linkerror = "www.occuponsquebec.org/error-country/"; //Link de error, este se rediccionara cuando sea CUALQUIER pais menos los que esten asignados en las variables country
//country - Code in ESO code Nº3

$country1 = "CA";
$country2 = "";
$country3 = ""; // dejando en blanco sera CUALQUIER pais MENOS, los que este asignado en alguna otra variable, dejando un solo pais y los otros dos en blanco, habra solo una redirecciona ese pais y todos los demas paises iran a linkerror

//Dependencias
require_once('geoplugin.class.php');
$geoplugin = new geoPlugin();

//locate the IP
$geoplugin->locate();
$country = $geoplugin->countryCode;

//Seccion de analisis y redireccion por pais
if ($country == $country1 && $country != $country2 && $country != $country3 && !empty($link1)) {
	header('Location: https://'.$link1);
	exit();
}elseif ($country == $country2 && $country != $country1 && $country != $country3 && !empty($link2)) {
	header('Location: https://'.$link2);
	exit();
}elseif ($country == $country3 && $country != $country1 && $country != $country2 && !empty($link3)) {
	header('Location: https://'.$link3);
	exit();
}
else{
	header('Location: https://'.$linkerror);
	exit();
}

?>