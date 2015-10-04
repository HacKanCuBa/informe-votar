<?php
/*
        Vot.Ar: a bad election. Presentation for the EKOparty #11, oct 2015
        by HacKan | Ivan A. Barrera Oro
        Licence CC BY-SA v4.0: http://creativecommons.org/licenses/by-sa/4.0/
        Feel free to share!!
*/

/**
 * Default language
 */
define('LANG_DEFAULT', 'en');

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
                        header("Location: vot_ar_una_mala_eleccion.php");
                        break;

                case 'en': 
                        header("Location: vot_ar_a_bad_election.php");
                        break;
        }
        exit;
}

?>
<!DOCTYPE html>
<!--
        Vot.Ar: una mala eleccion. Presentación para la EKOparty #11, oct 2015
        por HacKan | Ivan A. Barrera Oro
        Licencia CC BY-SA v4.0: http://creativecommons.org/licenses/by-sa/4.0/
        Compartilo!!
-->
<!--
        Vot.Ar: a bad election. Presentation for the EKOparty #11, oct 2015
        by HacKan | Ivan A. Barrera Oro
        Licence CC BY-SA v4.0: http://creativecommons.org/licenses/by-sa/4.0/
        Feel free to share!!
-->
<html lang="<?php echo $lang; ?>">
<head>
        <meta charset="utf-8">

<?php if ($lang == 'es') { ?>
	<title>Vot.Ar: una mala elecci&oacute;n</title>
<?php } elseif ($lang == 'en') { ?>
	<title>Vot.Ar: a bad election</title>
<?php } ?>
	<meta name="author" content="Iv&aacute;n A. Barrera Oro" />
<?php if ($lang == 'es') { ?>
        <meta name="description" content="Vot.Ar: una mala elecci&oacute;n. Presentaci&oacute;n para la EKOparty #11, oct 2015" />
<?php } elseif ($lang == 'en') { ?>
        <meta name="description" content="Vot.Ar: a bad election. Presentation for the EKOparty #11, oct 2015" />
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
        <meta name="twitter:title" content="Vot.Ar: una mala elecci&oacute;n" />
        <meta name="twitter:description" content="Presentaci&oacute;n para la #eko11, oct 2015" />

        <meta property="og:title" content="Vot.Ar: una mala elecci&oacute;n" />
        <meta property="og:description" content="Presentaci&oacute;n para la #eko11, oct 2015" />
        <meta property="og:locale" content="es_AR" />
<?php } elseif ($lang == 'en') { ?>
        <meta name="twitter:title" content="Vot.Ar: a bad election" />
        <meta name="twitter:description" content="Presentation for #eko11, oct 2015" />

        <meta property="og:title" content="Vot.Ar: a bad election" />
        <meta property="og:description" content="Presentation for #eko11, oct 2015" />
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
                <div id="title" class="step slide" data-x="0" data-y="0" data-scale="1">
                        <div class="right txt-tiny" style="padding-right: 10px;"><a href="?lang=es" class="link-shadow">ES</a> | <a href="?lang=en" class="link-shadow">EN</a></div>
<?php if ($lang == 'es') { ?>
                        <h1 style="text-align: center;">Vot.Ar: una mala elecci&oacute;n</h1>
                        <br />
                        <h3>Presentaci&oacute;n sobre el sistema <i style="color: #75AADB;">Vot.Ar</i> (o BUE), su HW, SW y Vulnerabilidades.</h3>
                        <br />
                        <ul>
                                <li><a class="link-shadow" href="vot_ar_una_mala_eleccion.php" target="_self">Quiero ver la presentaci&oacute;n</a></li>
                                <li><a class="link-shadow" href="/vot-ar-una-mala-eleccion" target="_self">Quiero leer el informe</a></li>
                                <li><a class="link-shadow" href="https://github.com/HacKanCuBa/informe-votar" target="_blank">¡Quiero ver las fuentes!</a></li>
                        </ul>
<?php } elseif ($lang == 'en') { ?>
                        <h1 style="text-align: center;">Vot.Ar: a bad election</h1>
                        <br />
                        <h3>A presentation about the <i style="color: #75AADB;">Vot.Ar</i> (aka BUE) system, its HW, SW & Vulns.</h3>
                        <br />
                        <ul>
                                <li><a class="link-shadow" href="vot_ar_a_bad_election.php" target="_self">I want to see the presentation</a></li>
                                <li><a class="link-shadow" href="/vot-ar-a-bad-election" target="_self">I want to read the report</a></li>
                                <li><a class="link-shadow" href="https://github.com/HacKanCuBa/informe-votar" target="_blank">I want to see the source!</a></li>
                        </ul>
<?php } ?>                       
                        <p class="footnote"><a class="link-shadow" href="https://twitter.com/hashtag/VotArUnaMalaEleccion" target="_blank">#VotArUnaMalaEleccion</a> <a class="link-shadow" href="https://twitter.com/hashtag/eko11" target="_blank">#eko11</a></p>
		</div>
                <!-- -->
        </div>

        <!-- impress code -->
	<script src="js/impress.js"></script>
	<script>impress().init();</script>
        <!-- -->
</body>
</html>
