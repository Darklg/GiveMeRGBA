<?php
$content='';
$color = '';
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


?><!DOCTYPE HTML>
<html lang="fr-FR">
    <head>
	<meta charset="UTF-8" />
	<title>Give Me RGBA !</title>
	<style>
	body {
		position:relative;
	}
	body,
	h1 {
		margin:0;
		padding:0;
	}
	a img {
		border:none;
	}
	</style>
    </head>
    <body>
		<h1>Give Me RGBA !</h1>
		<form action="" method="post">
			<ul>
				<?php if(!empty($content)) : ?>
				<li>
					<label for="rgba_content"></label>
					<textarea rows="8" cols="100" name="rgba_content" id="rgba_content"><?php echo $content; ?></textarea>
				</li>
				<?php endif; ?>
			    <li>
			    	<label for="rgba_color">Color ( Hexa : x6)</label>
				    <input name="rgba_color" id="rgba_color" type="text" value="<?php echo $color; ?>" />
			    </li>
				<li>
					<label for="rgba_opacity">Opacity ( % )</label>
				    <input name="rgba_opacity" id="rgba_opacity" type="text" value="<?php echo $opacity; ?>" />
				</li>
				<li>
					<button>Give me RGBA !</button>
				</li>
			</ul>
		</form>
		<a href="http://github.com/darklg/GiveMeRGBA"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://a248.e.akamai.net/assets.github.com/img/7afbc8b248c68eb468279e8c17986ad46549fb71/687474703a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6461726b626c75655f3132313632312e706e67" alt="Fork me on GitHub" /></a>
		
    </body>
</html>