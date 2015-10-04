<?php
/*
        Vot.Ar: a bad election. Presentation for the EKOparty #11, oct 2015
        by HacKan | Ivan A. Barrera Oro
        Licence CC BY-SA v4.0: http://creativecommons.org/licenses/by-sa/4.0/
        Feel free to share!!
*/

/**
 * Global to set the language
 */
$lang;

function get_lang() 
{
        $lang = '';
        if (array_key_exists('lang', $_GET)) {
                switch (strtolower($_GET['lang'])) {
                        case 'es': 
                                $lang = 'es';
                                break;

                        default: 
                                $lang = 'en';
                                break;
                }
        }

        return $lang;
}

$lang = get_lang();

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
	<meta name="author" content="Iv&aacute;n A. Barrera Oro" />
        <meta name="description" content="Vot.Ar: una mala elecci&oacute;n. Presentaci&oacute;n para la EKOparty #11, oct 2015" />
        <link rel="icon" href="img/logo.png" sizes="196x196" type="image/png" />

        <link href="css/reset.css" rel="stylesheet" />
	<link href="css/presentation.css" rel="stylesheet" />
	<link href="font/opensans.css" rel="stylesheet" />
	<link href="font/oswald.css" rel="stylesheet" />

	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="apple-mobile-web-app-capable" content="yes" />

        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="@hackancuba" />
        <meta name="twitter:title" content="Vot.Ar: a bad election" />
        <meta name="twitter:description" content="Presentaci&oacute;n para la #eko11, oct 2015" />

        <meta property="og:title" content="Vot.Ar: a bad election" />
        <meta property="og:description" content="Presentaci&oacute;n para la #eko11, oct 2015" />
        <meta property="og:locale" content="es_AR" />
</head>

<body class="impress-not-supported">

	<div class="fallback-message">
		<p>Tu navegador <em>no soporta las caracter&iacute;sticas requeridas</em> por esta presentaci&oacute;n, por lo que se mostrar&aacute; una versi&oacute;n simplificada.</p>
                <p>Para obtener una mejor experiencia, utiliza <strong>Firefox</strong>, <strong>Chrome</strong> o <strong>Safari</strong>.</p>
	</div>

	<div id="impress">
                <!-- welcome -->
                <div id="title" class="step slide" data-x="0" data-y="0" data-scale="1">
                        <h1 style="text-align: center;">Vot.Ar: una mala elecci&oacute;n</h1>
                        <br />
                        <h3>Presentaci&oacute;n sobre el sistema <i style="color: #75AADB;">Vot.Ar</i> (o BUE), su HW, SW y Vulnerabilidades.</h3>
                        <br />
                        <ul>
                                <li><a class="link-shadow" href="vot_ar_una_mala_eleccion.php" target="_self">Quiero ver la presentaci&oacute;n</a></li>
                                <li><a class="link-shadow" href="/vot-ar-una-mala-eleccion" target="_self">Quiero leer el informe</a></li>
                                <li><a class="link-shadow" href="https://github.com/HacKanCuBa/informe-votar" target="_blank">¡Quiero ver las fuentes!</a></li>
                        </ul>
                        <br />
                        <p class="footnote"><a class="link-shadow" href="https://twitter.com/hashtag/VotArUnaMalaEleccion" target="_blank">#VotArUnaMalaEleccion</a> <a class="link-shadow" href="https://twitter.com/hashtag/eko11" target="_blank">#eko11</a></p>
		</div>
                <!-- -->
        </div>
<?php } else { ?>
	<title>Vot.Ar: a bad election</title>
	<meta name="author" content="Iv&aacute;n A. Barrera Oro" />
        <meta name="description" content="Vot.Ar: a bad election. Presentation for the EKOparty #11, oct 2015" />
        <link rel="icon" href="img/logo.png" sizes="196x196" type="image/png" />

        <link href="css/reset.css" rel="stylesheet" />
	<link href="css/presentation.css" rel="stylesheet" />
	<link href="font/opensans.css" rel="stylesheet" />
	<link href="font/oswald.css" rel="stylesheet" />

	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="apple-mobile-web-app-capable" content="yes" />

        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="@hackancuba" />
        <meta name="twitter:title" content="Vot.Ar: a bad election" />
        <meta name="twitter:description" content="Presentation for #eko11, oct 2015" />

        <meta property="og:title" content="Vot.Ar: a bad election" />
        <meta property="og:description" content="Presentation for #eko11, oct 2015" />
        <meta property="og:locale" content="en_GB" />
</head>

<body class="impress-not-supported">

	<div class="fallback-message">
		<p>Your browser <em>doesn't support the characteristics required</em> for this presentation, so a simplified version will be shown.</p>
		<p>For a better experience, please use <strong>Firefox</strong>, <strong>Chrome</strong> or <strong>Safari</strong>.</p>
	</div>

	<div id="impress">
                <!-- welcome -->
                <div id="title" class="step slide" data-x="0" data-y="0" data-scale="1">
                        <h1 style="text-align: center;">Vot.Ar: a bad election</h1>
                        <br />
                        <h3>A presentation about the <i style="color: #75AADB;">Vot.Ar</i> (aka BUE) system, its HW, SW & Vulns.</h3>
                        <br />
                        <ul>
                                <li><a class="link-shadow" href="vot_ar_a_bad_election.php" target="_self">I want to see the presentation</a></li>
                                <li><a class="link-shadow" href="/vot-ar-a-bad-election" target="_self">I want to read the report</a></li>
                                <li><a class="link-shadow" href="https://github.com/HacKanCuBa/informe-votar" target="_blank">I want to see the source!</a></li>
                        </ul>
                        <br />
                        <p class="footnote"><a class="link-shadow" href="https://twitter.com/hashtag/VotArABadElection" target="_blank">#VotArABadElection</a> <a class="link-shadow" href="https://twitter.com/hashtag/eko11" target="_blank">#eko11</a></p>
		</div>
                <!-- -->
        </div>
<?php } ?>

        <!-- impress code -->
	<script src="js/impress.js"></script>
	<script>impress().init();</script>
        <!-- -->
</body>
</html>
