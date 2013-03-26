<?php

if(
	isset($_POST['rgba_color'],$_POST['rgba_opacity'])
	&& !empty($_POST['rgba_color'])
	&& !empty($_POST['rgba_opacity'])
	&& preg_match('#^([0-9a-fA-F]{6})$#',$_POST['rgba_color'])
	&& ctype_digit($_POST['rgba_opacity'])
	&& $_POST['rgba_opacity'] <= 100
	&& $_POST['rgba_opacity'] >= 0
){

	// Valeurs de retour
	$opacity_dec = $_POST['rgba_opacity'];
	$color_hexa = $_POST['rgba_color'];

	// Opacité en hexa : x/255
	$opacity_hexa = strtoupper(dechex(round(($opacity_dec/100)*255)));
	// aRGB = Opacity+Color
	$col_argb = $opacity_hexa.$color_hexa;

	// rgba classique
	$col_rgba = hexdec(substr($color_hexa,0,2)).','.hexdec(substr($color_hexa,2,2)).','.hexdec(substr($color_hexa,4,2)).','.($opacity_dec/100);

	// = Création du retour CSS

	// On reset le background, sinon bug d'IE
	$content_css = 'background:none;'."\n";
	$content_css .= 'background-color:rgba('.$col_rgba.');'."\n";

	// Filters pour IE & rgba : Appliqué via gradient
	// Merci @ http://bricss.net/post/12423845540/working-with-8-digit-hex-colors-argb-in-internet
	$content_css .= '-ms-filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#'.$col_argb.',endColorstr=#'.$col_argb.');'."\n";
	$content_css .= 'filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#'.$col_argb.',endColorstr=#'.$col_argb.');'."\n";
	$content_css .= 'zoom:1;';

}

