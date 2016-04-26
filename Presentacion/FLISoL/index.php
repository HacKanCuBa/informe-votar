<?php
/* vim: set tabstop=2 softtabstop=2 shiftwidth=2 noexpandtab fenc=utf-8 ff=unix ft=sh : */
/*
        ¿Podemos votar con computadoras?
        FLISoL CABA 2016
        by Javier Smaldone (@mis2centavos) and Iván (@hackancuba) 
        Licence CC BY-SA v4.0: http://creativecommons.org/licenses/by-sa/4.0/
        Feel free to share!!
*/

/**
 * Default language
 */
define('LANG_DEFAULT', 'es');

/**
 * Global to set the language
 */
$lang;

// functions

function get_opt($opt)
{
        return (array_key_exists($opt, $_GET)
                        ? $_GET[$opt]
                        : '');
}

function get_lang()
{
        $lang;
        $get = strtolower(get_opt('lang'));

        switch ($get) {
                case 'es':
                        $lang = 'es';
                        break;

                case 'en':
                        $lang = 'en';
                        break;

                default:
                        $lang = LANG_DEFAULT;
                        break;
        }

        return $lang;
}

// main

$lang = get_lang();

if (get_opt('skipintro')) {
        switch ($lang) {
                case 'es':
                        header("Location: podemos_votar_con_computadoras.php");
                        break;

                case 'en':
                        header("Location: podemos_votar_con_computadoras.php");
                        break;
        }
        exit;
}

?>
<!DOCTYPE html>
<!--
  ¿Podemos votar con computadoras?
    FLISoL CABA 2016
    by Javier Smaldone (@mis2centavos) and Iván (@hackancuba) 
    Licence CC BY-SA v4.0: http://creativecommons.org/licenses/by-sa/4.0/
    Feel free to share!!

  v20160422.03
-->
<html lang="<?php echo $lang; ?>">
<head>
	<meta charset="utf-8">

<?php if ($lang == 'es') { ?>
	<title>¿Podemos votar con computadoras?</title>
<?php } elseif ($lang == 'en') { ?>
	<title>Can we vote with computers?</title>
<?php } ?>
	<meta name="author" content="Javier Smaldone" />
	<meta name="author" content="Iv&aacute;n A. Barrera Oro" />
<?php if ($lang == 'es') { ?>
        <meta name="description" content="¿Podemos votar con computadoras? Charla para FLISoL CABA 2016" />
<?php } elseif ($lang == 'en') { ?>
        <meta name="description" content="Can we vote with computers? A talk for FLISoL CABA 2016" />
<?php } ?>
	<link rel="icon" href="img/logo.png" sizes="196x196" type="image/png" />

	<link href="css/reset.css" rel="stylesheet" />
	<link href="css/presentation.css" rel="stylesheet" />
	<link href="font/opensans.css" rel="stylesheet" />
	<link href="font/oswald.css" rel="stylesheet" />

	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@hackancuba" />
	<meta name="twitter:image" content="img/logo.png" />
<?php if ($lang == 'es') { ?>
	<meta name="twitter:title" content="¿Podemos votar con computadoras?" />
	<meta name="twitter:description" content="¿Podemos votar con computadoras? Charla para FLISoL CABA 2016" />

	<meta property="og:title" content="¿Podemos votar con computadoras?" />
	<meta property="og:description" content="¿Podemos votar con computadoras? Charla para FLISoL CABA 2016" />
	<meta property="og:locale" content="es_AR" />
<?php } elseif ($lang == 'en') { ?>
	<meta name="twitter:title" content="Can we vote with computers?" />
	<meta name="twitter:description" content="Can we vote with computers? A talk for FLISoL CABA 2016" />

	<meta property="og:title" content="Can we vote with computers?" />
	<meta property="og:description" content="Can we vote with computers? A talk for FLISoL CABA 2016" />
	<meta property="og:locale" content="en_GB" />
<?php } ?>
</head>

<body class="impress-not-supported">

	<div class="fallback-message">
<?php if ($lang == 'es') { ?>
		<p>Tu navegador <em>no soporta las caracter&iacute;sticas requeridas</em> por esta presentaci&oacute;n, por lo que se mostrar&aacute; una versi&oacute;n simplificada.</p>
		<p>Para obtener una mejor experiencia, utiliza <strong>Firefox</strong>, <strong>Chrome</strong> o <strong>Safari</strong>.</p>
<?php } elseif ($lang == 'en') { ?>
		<p>Your browser <em>doesn't support the characteristics required</em> for this presentation, so a simplified version will be shown.</p>
		<p>For a better experience, please use <strong>Firefox</strong>, <strong>Chrome</strong> or <strong>Safari</strong>.</p>
<?php } ?>
	</div>

	<div id="impress">
		<!-- welcome -->
		<div id="title" class="step slide anim" data-x="0" data-y="0" data-scale="1">
			<div class="right txt-tiny" style="padding-right: 10px;"><a href="?lang=es" class="link-shadow">ES</a> | <a href="?lang=en" class="link-shadow">EN</a></div>
<?php if ($lang == 'es') { ?>
			<h1 style="text-align: center;">¿Podemos votar con computadoras?</h1>
			<br />
			<h3>Análisis del sistema electoral y qué implica utilizar computadoras como intermediarias entre el votante y el sufragio.</h3>
			<br />
			<ul>
				<li><b class="scaling"><a class="link" href="podemos_votar_con_computadoras.php" target="_self">Quiero ver la presentaci&oacute;n</a></b></li>
				<li><a class="link" href="https://www.youtube.com/watch?v=5eENcWZZBB4" target="_self">Quiero ver el video de la charla</a></li>
				<li><a class="link" href="https://github.com/HacKanCuBa/informe-votar" target="_blank">¡Quiero ver las fuentes!</a></li>
			</ul>
<?php } elseif ($lang == 'en') { ?>
			<h1 style="text-align: center;">Can we vote with computers?</h1>
			<br />
			<h3>Analysis of the electoral system and which is the implication of using computers or intermediaries between the voter and its vote.</h3>
			<br />
			<ul>
				<li><b class="scaling"><a class="link" href="podemos_votar_con_computadoras.php" target="_self">I want to see the presentation</a></b></li>
				<li><a class="link" href="https://www.youtube.com/watch?v=5eENcWZZBB4" target="_self">I want to see a recording of the presentation</a></li>
				<li><a class="link" href="https://github.com/HacKanCuBa/informe-votar/blob/master/README-en.md" target="_blank">I want to see the source!</a></li>
				</ul>
			<p class="footnote">In spanish only</p>
<?php } ?>
		</div>
		<!-- -->
	</div>

	<!-- impress code -->
	<script src="js/impress.js"></script>
	<script>impress().init();</script>
    <!-- -->
</body>
</html>
