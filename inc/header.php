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
	
	$opacity_hexa = strtoupper(dechex(round(($_POST['rgba_opacity']/100)*255)));
	$color_hexa = $_POST['rgba_color'];
	$col_argb = $opacity_hexa.$color_hexa;
	$col_rgba = hexdec(substr($color_hexa,0,2)).','.hexdec(substr($color_hexa,2,2)).','.hexdec(substr($color_hexa,4,2)).','.($_POST['rgba_opacity']/100);

	$content .= 'background:none;'."\n";
	$content .= 'background-color:rgba('.$col_rgba.');'."\n";
	$content .= '-ms-filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#'.$col_argb.',endColorstr=#'.$col_argb.');'."\n";
	$content .= 'filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#'.$col_argb.',endColorstr=#'.$col_argb.');'."\n";
	$content .= 'zoom: 1;'."\n";
	
	$color = $_POST['rgba_color'];
	$opacity = $_POST['rgba_opacity'];
	
}

