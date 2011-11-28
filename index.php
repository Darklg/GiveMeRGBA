<?php
define('TITLE','Give Me (Cross-Browser) RGBA !');

$content='';
$color='';
$opacity='';
include dirname(__FILE__).'/inc/header.php';

?><!DOCTYPE HTML>
<html lang="fr-FR">
    <head>
	<meta charset="UTF-8" />
	<title><?php echo TITLE; ?></title>
	<link rel="stylesheet" href="style/style.css" type="text/css" />
    </head>
    <body>
		<div id="wrapper">
			<h1><?php echo TITLE; ?></h1>
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
		</div>
		<a href="http://github.com/darklg/GiveMeRGBA"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://a248.e.akamai.net/assets.github.com/img/7afbc8b248c68eb468279e8c17986ad46549fb71/687474703a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6461726b626c75655f3132313632312e706e67" alt="Fork me on GitHub" /></a>
		
    </body>
</html>