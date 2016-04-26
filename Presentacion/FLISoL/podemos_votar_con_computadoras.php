<?php
/* vim: set tabstop=2 softtabstop=2 shiftwidth=2 noexpandtab fenc=utf-8 ff=unix ft=sh : */
/*
        ¿Podemos votar con computadoras?
        FLISoL CABA 2016
        by Javier Smaldone (@mis2centavos) and Iván (@hackancuba) 
        Licence CC BY-SA v4.0: http://creativecommons.org/licenses/by-sa/4.0/
        Feel free to share!!
*/

error_reporting(E_ALL);

/**
 * Defines if Overview will be shown if no parameter is passed through GET
 */
define('SHOW_OVERVIEW', false);

class Position
{
  /**
   * Coordinates (data-...)
   */
  private $_x, $_y, $_z;
  /**
   * Angles (data-rotate-...)
   */
  private $_alpha, $_theta, $_phi;
  /**
   * Overview position (could be automated)
   */
  private $_overviewX, $_overviewY, $_overviewS;

  function __construct()
  {
    $this->reset();
  }

  /**
   * Sets the Overview coordinates. Values can be negative.
   *
   * @param array $coord
   * an array of coordinates such as
   * [ "x" => 1, "y" => 2, "s" => 3] or [1, 2, 3]
   * Note that S is the Scale.
   * It's not necessary to set all three elements.
   * Elements not set will be omitted, keeping it's current value!.
   *
   */
  public function set_overview($overview)
  {
    if (is_array($overview)) {
      $this->_overviewX = array_key_exists("x", $overview)
                                          ? $overview["x"]
                                          : (array_key_exists(0, $overview)
                                                            ? $overview[0]
                                                            : $this->_overviewX
                                            );
      $this->_overviewY = array_key_exists("y", $overview)
                                          ? $overview["y"]
                                          : (array_key_exists(1, $overview)
                                                            ? $overview[1]
                                                            : $this->_overviewY
                                            );
      $this->_overviewS = array_key_exists("s", $overview)
                                          ? $overview["s"]
                                          : (array_key_exists(2, $overview)
                                                            ? $overview[2]
                                                            : $this->_overviewS
                                            );
    }
  }

  /**
   * This method calculates the overview coordinates based on the
   * currently set coords, asuming these are the final ones, and that
   * the first ones are [0,0]
   */
  public function autoset_overview()
  {
    $this->_overviewX =  (int) ($this->_x / 2);
    $this->_overviewY =  (int) ($this->_y / 2);
    // how can I calculate this? I think it can be done w/ the
    // screen resolution
    //$this->_overviewS = 32
  }

  /**
   * Sets the coordinates to a given value. Values can be negative.
   *
   * @param array|numeric $coord [optional]
   * an array of coordinates such as
   * [ "x" => 1, "y" => 2, "z" => 3] or [1, 2, 3]
   * It's not necessary to set all three elements.
   * Elements not set will be omitted, keeping it's current value!.
   * It can also be a numeric, and if so, it will be considered for
   * only X.
   */
  public function set_coord($coord)
  {
    if (is_array($coord)) {
      $this->_x = array_key_exists("x", $coord)
                                  ? $coord["x"]
                                  : (array_key_exists(0, $coord)
                                                    ? $coord[0]
                                                    : $this->_x
                                    );
      $this->_y = array_key_exists("y", $coord)
                                  ? $coord["y"]
                                  : (array_key_exists(1, $coord)
                                                    ? $coord[1]
                                                    : $this->_y
                                    );
      $this->_z = array_key_exists("z", $coord)
                                  ? $coord["z"]
                                  : (array_key_exists(2, $coord)
                                                    ? $coord[2]
                                                    : $this->_z
                                    );
    } elseif (is_numeric($coord)) {
      $this->_x = $coord;
    }
  }

  /**
   * Sets the angles to a given value. Values can be negative.
   *
   * @param array|numeric $angle [optional]
   * an array of angles such as
   * [ "alpha" => 1, "theta" => 2, "phi" => 3] or [1, 2, 3]
   * It's not necessary to set all three elements.
   * Elements not set will be omitted, keeping it's current value!.
   * It can also be a numeric, and if so, it will be considered for
   * only alpha.
   */
  public function set_angle($angle)
  {
    if (is_array($angle)) {
      $this->_alpha = array_key_exists("alpha", $angle)
                                      ? $angle["alpha"]
                                      : (array_key_exists(0, $angle)
                                                        ? $angle[0]
                                                        : $this->_alpha
                                        );
      $this->_theta = array_key_exists("theta", $angle)
                                      ? $angle["theta"]
                                      : (array_key_exists(1, $angle)
                                                        ? $angle[1]
                                                        : $this->_theta
                                        );
      $this->_phi = array_key_exists("phi", $angle)
                                      ? $angle["phi"]
                                      : (array_key_exists(2, $angle)
                                                        ? $angle[2]
                                                        : $this->_phi
                                        );
    } elseif (is_numeric($angle)) {
      $this->_alpha = $angle;
    }
  }

  /**
   * Sets the coordinates and angles to a given value. Values can
   * be negative.
   *
   * @param array|numeric $coord [optional]
   * an array of coordinates such as
   * [ "x" => 1, "y" => 2, "z" => 3] or [1, 2, 3]
   * It's not necessary to set all three elements.
   * Elements not set will be omitted, keeping it's current value!.
   * It can also be a numeric, and if so, it will be considered for only X.
   *
   * @param array|numeric $angle [optional]
   * an array of angles such as
   * [ "alpha" => 1, "theta" => 2, "phi" => 3] or [1, 2, 3]
   * It's not necessary to set all three elements.
   * Elements not set will be omitted, keeping it's current value!.
   * It can also be a numeric, and if so, it will be considered for
   * only alpha.
   */
  public function set($coord = NULL, $angle = NULL)
  {
    $this->set_coord($coord);
    $this->set_angle($angle);
  }

  /**
   * Sets coords to 0.
   */
  public function reset_coord()
  {
    $this->set_coord([0, 0, 0]);
  }

  /**
   * Sets angles to 0.
   */
  public function reset_angle()
  {
    $this->set_angle([0, 0, 0]);
  }

  /**
   * Sets overview to [0, 0, 0].
   */
  private function reset_overview()
  {
    $this->set_overview([0, 0, 0]);
  }

  /**
   * Sets coords and angles to 0.
   */
  public function reset()
  {
    $this->reset_coord();
    $this->reset_angle();
    $this->reset_overview();
  }


  /**
   * Get the coordinates
   *
   * @return array An array of coordinates
   */
  public function get_coord()
  {
    return [$this->_x, $this->_y, $this->_z];
  }

  /**
   * Get the angles
   *
   * @return array An array of angles
   */
  public function get_angle()
  {
    return [$this->_alpha, $this->_theta, $this->_phi];
  }

  /**
   * Shifts the coordinates with a given value.  This means that it adds
   * the value to current coords.  Values can be negative.
   *
   * @param array|numeric $delta an array of coordinates such as
   * [ "x" => 1, "y" => 2, "z" => 3] or [1, 2, 3]
   * It's not necessary to set all three elements.
   * It can also be a numeric, and if so, it will be considered for
   * only X.
   */
  public function shift_coord($delta)
  {
    if (is_array($delta)) {
      $this->_x += array_key_exists("x", $delta)
                                  ? $delta["x"]
                                  : (array_key_exists(0, $delta)
                                                    ? $delta[0]
                                                    : 0
                                    );
      $this->_y += array_key_exists("y", $delta)
                                  ? $delta["y"]
                                  : (array_key_exists(1, $delta)
                                                    ? $delta[1]
                                                    : 0
                                    );
      $this->_z += array_key_exists("z", $delta)
                                  ? $delta["z"]
                                  : (array_key_exists(2, $delta)
                                                    ? $delta[2]
                                                    : 0
                                    );
    } elseif (is_numeric($delta)) {
      $this->_x += $delta;
    }
  }

  /**
   * Shifts the angles with a given value.  This means that it adds
   * the value to current angles.  Values can be negative.
   *
   * @param array|numeric $delta an array of angles such as
   * [ "alpha" => 1, "theta" => 2, "" => 3] or [1, 2, 3]
   * It's not necessary to set all three elements.
   * It can also be a numeric, and if so, it will be considered for
   * only alpha.
   */
  public function shift_angle($delta)
  {
    if (is_array($delta)) {
      $this->_alpha += array_key_exists("alpha", $delta)
                                      ? $delta["alpha"]
                                      : (array_key_exists(0, $delta)
                                                        ? $delta[0]
                                                        : 0
                                        );
      $this->_theta += array_key_exists("theta", $delta)
                                      ? $delta["theta"]
                                      : (array_key_exists(1, $delta)
                                                        ? $delta[1]
                                                        : 0
                                        );
      $this->_phi += array_key_exists("phi", $delta)
                                      ? $delta["phi"]
                                      : (array_key_exists(2, $delta)
                                                        ? $delta[2]
                                                        : 0
                                        );
    } elseif (is_numeric($delta)) {
      $this->_alpha += $delta;
    }
  }

  /**
   * Shifts the coords and/or angles.
   * Equal as calling shift_coord() and shift_angle().
   *
   * @param array|numeric $delta_coord [optional]
   * @param array|numeric $delta_angle [optional]
   */
  public function shift($delta_coord = NULL, $delta_angle = NULL)
  {
    $this->shift_coord($delta_coord);
    $this->shift_angle($delta_angle);
  }

  /**
   * Prints the required text to set the coordinates and angles
   * for impress.js
   */
  public function printc()
  {
    echo 'data-x="' . $this->_x
            . '" data-y="' . $this->_y
            . '" data-z="' . $this->_z . '"';

    echo ' ';

    echo 'data-rotate-x="' . $this->_alpha
            . '" data-rotate-y="' . $this->_theta
            . '" data-rotate-z="' . $this->_phi . '"';
  }

  /**
   * Combination of calling: shift() and printc().
   *
   * @param array|numeric $delta_coord [optional]
   * @param array|numeric $delta_angle [optional]
   */
  public function shiftprint($delta_coord = NULL, $delta_angle = NULL)
  {
    $this->shift($delta_coord, $delta_angle);
    $this->printc();
  }

  public function print_overview()
  {
    echo '<div id="overview" class="step" '
            . 'data-x="' . $this->_overviewX . '" '
            . 'data-y="' . $this->_overviewY . '" '
            . 'data-scale="' . $this->_overviewS . '"'
            . '></div>';
  }
}

function get_opt($opt)
{
  return (array_key_exists($opt, $_GET)
                          ? $_GET[$opt]
                          : ''
          );
}

$show_overview = (get_opt('overview') != '')
                  ? true
                  : SHOW_OVERVIEW;

$pos = new Position;
$pos->set_overview(["s" => 50]);
?>
<!DOCTYPE html>
<html lang="es">
<!--
  ¿Podemos votar con computadoras?
	FLISoL CABA 2016
	by Javier Smaldone (@mis2centavos) and Iván (@hackancuba) 
	Licence CC BY-SA v4.0: http://creativecommons.org/licenses/by-sa/4.0/
	Feel free to share!!

  v20160422.00
-->
<head>
  <meta charset="utf-8">

	<title>¿Podemos votar con computadoras?</title>
  <meta name="author" content="@mis2centavos & @hackancuba" />
  <meta name="description" content="¿Podemos votar con computadoras? Charla para FLISoL CABA 2016" />
  <link rel="icon" href="img/logo.png" sizes="196x196" type="image/png" />

  <link href="css/reset.css" rel="stylesheet" />
  <link href="css/presentation.css" rel="stylesheet" />
  <link href="font/opensans.css" rel="stylesheet" />
  <link href="font/oswald.css" rel="stylesheet" />
  <link href="font/anonymouspro.css" rel="stylesheet" />

  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="apple-mobile-web-app-capable" content="yes" />

  <meta name="twitter:card" content="summary" />
  <meta name="twitter:site" content="@hackancuba" />
  <meta name="twitter:title" content="¿Podemos votar con computadoras?" />
  <meta name="twitter:description" content="Charla para FLISoL CABA 2016" />
  <meta name="twitter:image" content="img/logo.png" />

  <meta property="og:title" content="¿Podemos votar con computadoras?" />
  <meta property="og:description" content="Charla para FLISoL CABA 2016" />
  <meta property="og:locale" content="es_AR" />
</head>

<body class="impress-not-supported">

	<div class="fallback-message">
    <p>Tu navegador <em>no soporta las caracter&iacute;sticas requeridas</em> por esta presentaci&oacute;n, por lo que se mostrar&aacute; una versi&oacute;n simplificada.</p>
    <p>Para obtener una mejor experiencia, utiliza <strong>Firefox</strong>, <strong>Chrome</strong> o <strong>Safari</strong>.</p>
	</div>

	<div id="impress">
    <!-- welcome -->
    <div id="title" class="step anim" <?php $pos->printc(); ?> data-scale="3">
      <h1 class="centered">¿Podemos votar con computadoras?</h1>
      <h3>Análisis del sistema electoral y qué implica utilizar computadoras como intermediarias entre el votante y el sufragio.</h3>
      <br /><br />
      <p>La problemática nacional e internacional, y las posibles alternativas de solución.</p>
		</div>
    <!-- -->

    <!-- authors -->
    <div id="authors" class="step anim" <?php $pos->shift(["y" => 4500], -30); $pos->printc(); ?> data-scale="10">
  		<h1>FLISoL CABA 2016</h1>
  		<h2 class="right">Sábado 23 de abril</h2>
      <p>Presentadores: </p>
      <ul>
    		<li><a class="link txt-verybig" target="_blank" href="https://twitter.com/mis2centavos">Javier Smaldone (@mis2centavos)</a></li>
    		<li><a class="link txt-verybig" target="_blank" href="https://twitter.com/hackancuba">Iv&aacute;n Barrera Oro (@hackancuba)</a></li>
      </ul>
    </div>
    <?php $pos->shift(9000); ?>
    <!-- - -->

    <!-- bue es voto electronico -->
    <div class="step" <?php $pos->reset_angle(); $pos->shiftprint(["z" => -300], -40); ?> data-scale="1">
      <h2>¿Cómo mejorar nuestro sistema electoral?</h2>
      <video width="640" height="360" controls>
        <source src="vid/es_voto_electronico.webm" type="video/webm">
        BUE es Voto Electronico.
      </video>
		</div>
		<!-- - -->
		
		<!-- sist elect gral -->
    <div class="step" <?php $pos->shiftprint(["y" => "1600"], ["theta" => "10"]); ?> data-scale="1">
      <h2>¿Cómo es nuestro sistema electoral?</h2>
      <img src="img/diagrama_proceso_electoral.png" alt="diagrama descriptivo proceso electoral general" width="1100" height="500">
    </div>
		<!-- - -->
		
		<!-- como se vota ahora -->
    <div class="step" <?php $pos->shiftprint([0, 650, -400], ["theta" => "10"]); ?> data-scale="1">
      <h3>Sistema de Boleta Partidaria (sistema Francés)</h3>
      <p><strong>Problemas</strong></p>
      <ul>
    		<li>Robo de boletas</li>
    		<li>Boletas falsas</li>
    		<li>Boletas marcadas (clientelismo)</li>
    		<li>Voto cadena o calesita</li>
      </ul>
    </div>
    <div class="step" <?php $pos->shiftprint([1350, -850, 0], [0, 10, 0]); ?> data-scale="1">
      <h3>Escrutinio</h3>
      <h4>1. Mesa</h4>
      <ul>
    		<li>Lo realiza Presidente de mesa ante Fiscales</li>
    		<li>Cuenta votos, genera Telegrama y Acta</li>
    	</ul>
    	<h4>2. Provisorio</h4>
      <ul>
    		<li>Lo realiza el Poder Ejecutivo</li>
    		<li>Cuenta Telegramas</li>
    	</ul>
    	<h4>3. Definitivo</h4>
      <ul>
    		<li>Lo realiza Poder Judicial</li>
    		<li>Cuenta Actas</li>
      </ul>
    </div>

		<!-- vot.ar -->
    <div class="step" <?php $pos->reset_angle(); $pos->shiftprint(["y" => 1000]); ?> data-scale="1">
    	<h2 class="centered">Vot.Ar/Boleta Única Electrónica</h2>
      <!-- <img class="align-left" src="img/perro_araña.jpg" alt="Perro araña" width="550" height="344" />-->
      <video class="align-left" width="550" height="344" controls>
        <source src="vid/perro.webm" type="video/webm">
        Perro araña
      </video>
      <img class="align-right" src="img/boleta_voto_electronico.jpg" alt="Boleta Voto Electronico" width="550" height="344" />
      <p>Aunque tenga respaldo en papel, no deja de ser <strong>voto electrónico</strong></p>
    </div>
    <div id="macro" class="step" <?php $pos->shiftprint(["y" => 750], ["theta" => -30]); ?> data-scale="1">
      <h2>Visi&oacute;n general de Vot.Ar</h2>
       <img src="img/maquina_boba.jpg" alt="Kali en la maquina" width="842" height="600" />
		</div>
		<div class="step" <?php $pos->shiftprint(1300); ?> data-scale="1">
      <h3>Boleta</h3>
       <img src="img/ballot.jpg" alt="Boleta" width="820" height="600" />
		</div>
    <div class="step" <?php $pos->shiftprint(["y" => 800], ["theta" => -30]); ?> data-scale="1">
      <h2>Apertura de mesa</h2>
      <ol>
        <li>Se enciende la m&aacute;quina y se inserta el DVD.</li>
        <li><img class="align-right" src="img/president-id.jpg" alt="President ID" width="327" height="353" />
El Presidente se identifica usando credencial (RFID) y PIN.</li>
			</ol>
    </div>
    <div class="step" <?php $pos->shiftprint(["y" => 700], ["theta" => -10]); ?> data-scale="1">
      <ol start="3">
        <li><img class="align-right" src="img/loggedin-screen.jpg" alt="Logged-in Screen" width="622" height="350" />Selecciona opci&oacute;n de Apertura de Mesa e ingresa la informaci&oacute;n solicitada.</li>
        <li>Inserta una boleta especial donde se imprimir&aacute;n y grabarán los nombres del Presidente y Fiscales, la hora de apertura y un c&oacute;digo QR.</li>
      </ol>
		</div>

    <div class="step" <?php $pos->shiftprint([-1000, 1000], 15); ?> data-scale="1">
		  <h2 class="centered">Votación</h2>
		  <table style="text-align: left;">
				<tr>
					<td>
				    <ol>
           	 <li>El votante se identifica en la mesa y el Presidente le entrega una boleta, renteniendo la mitad del troquel.</li>
				    </ol>
					</td>
					<td>
					  <div class="overlay-img-txt centered">
				      <img src="img/ballot-front.jpg" alt="Ballot" width="320" height="120" />
				      <span class="soft-green">1</span>
					  </div>
					</td>
				</tr>
				<tr>
					<td>
				    <ol start="2">
	            <li>Se dirige a la computadora de votación e inserta la boleta:</li>
				    </ol>
					</td>
					<td>
					  <div class="overlay-img-txt centered">
		          <img src="img/inserting-ballot.jpg" alt="Inserting ballot" width="180" height="320" />
		          <span class="soft-green">2</span>
					  </div>
					</td>
				</tr>
		  </table>
    </div>
    <div class="step" <?php $pos->shiftprint(["y" => 650]); ?> data-scale="1">
		  <table style="text-align: left;">
				<tr>
					<td>
			      <ol start="3">
              <li>Mediante la pantalla táctil, el votante elige la composición de su voto:</li>
			      </ol>
					</td>
					<td>
			      <div class="overlay-img-txt centered">
              <img src="img/picking-candidate.jpg" alt="Picking candidate" width="180" height="250" />
              <span class="soft-green">3</span>
			      </div>
					</td>
				</tr>
				<tr>
					<td>
			      <ol start="4">
		          <li>Al finalizar, el sistema imprime la boleta y graba el chip RFID.</li>
			      </ol>
					</td>
					<td>
				    <div class="overlay-img-txt centered">
		          <img src="img/ballot-back.jpg" alt="Ballot printed" width="320" height="131" />
		          <span class="soft-green">4</span>
				    </div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
			      <ol start="5">
              <li>El votante puede acercar el chip al lector y la máquina mostará lo que está grabado en él (*).</li>
              <li>El votante vuelve a la mesa donde el Presidente verificar&aacute; el troquel y lo remover&aacute;.</li>
              <li>Finalmente, el votante deposita la boleta en la urna.</li>
			      </ol>
					</td>
				</tr>
		  </table>
    </div>

    <div class="step" <?php $pos->reset_angle(); $pos->shiftprint([0, 1000]); ?> data-scale="1">
		  <h2 class="centered">Cierre de mesa</h2>
		  <p>Al t&eacute;rmino de la votaci&oacute;n (18hs):</p>
		  <ol>
        <li>El Presidente aproxima su credencial y luego el Acta de Apertura, y selecciona la opci&oacute;n de Cierre de Mesa, informando la hora actual.</li>
        <li>Inserta una boleta especial de Cierre que tendr&aacute; informaci&oacute;n similar a la de Apertura.</li>
		  </ol>
    </div>

    <div class="step" <?php $pos->shiftprint(1500, -15); ?> data-scale="1">
		  <h2 class="centered">Escrutinio de mesa</h2>
		  <ol>
				<li>El Presidente abre la urna.</li>
        <li>Retira cada boleta y la acerca a la m&aacute;quina para contabilizarla, debiendo verificar la impresi&oacute;n (*).</li>
        <li>Al finalizar el conteo, inserta una boleta especial donde se imprimirá y grabará el Acta de Mesa.</li>
        <li>Luego inserta otra boleta especial donde se imprimirá y grabará la misma información para ser transmitida.</li>
		  </ol>
    </div>

    <div class="step" <?php $pos->shiftprint([0, 700], -15); ?> data-scale="1">
      <h2 class="centered">Escrutinio provisorio</h2>
      <ol>
        <li>Un técnico conectará una m&aacute;quina de la escuela a Internet.</li>
        <li>Cada Presidente de mesa le entregará el Acta de Transmisión.</li>
        <li>El técnico transmitirá los resultados al Centro de Cómputos.</li>
      </ol>
    </div>
    
    <div class="step" <?php $pos->shiftprint([0, 700], -15); ?> data-scale="1">
      <h2 class="centered">Escrutinio definitivo</h2>
      <ol>
        <li>La Justicia Electoral recibe las Actas de Mesa.</li>
        <li>Usando una máquina similar a las anteriores, se realiza el conteo.</li>
      </ol>
    </div>
    
    <div id="vulns" class="step" <?php $pos->reset_angle(); $pos->shiftprint(1200, 5); ?> data-scale="1">
  		<h2>Los problemas de <em>Vot.Ar</em></h2>
    </div>
    
    <div class="step" <?php $pos->shiftprint(["y" => 400], -10); ?> data-scale="1">
  		<h3>Credenciales vulnerables</h3>
  		<p>El sistema de credenciales no posee autenticación ni cifrado, permitiendo replicar cualquier credencial sin mayor esfuerzo.</p>
  		<img src="img/login-screen.jpg" alt="Log-in screen" width="711" height="400">
    </div>
    
    <div class="step" <?php $pos->shiftprint([1200, -200], 10); ?> data-scale="1">
  		<h3>Multivoto</h3>
  		<img src="img/multivote.jpg" alt="multivoto" width="620" height="700">
    </div>
    
    <div class="step" <?php $pos->shiftprint([-1200, -600], -10); ?> data-scale="1">
  		<h3>Chip RFID</h3>
  		<img src="img/rfid.jpg" alt="RFID chip" width="762" height="550">
    </div>
    
    <div class="step" <?php $pos->shiftprint([1000, -150], 10); ?> data-scale="1">
  		<p>El voto se puede leer remotamente</p>
  		<img src="img/patente.jpg" alt="Patente" width="1000" height="234">
  		<div class="centered">
  			<img src="img/patente_portada.jpg" alt="Patente portada" width="286" height="255">
  		</div>
    </div>
    
    <div class="step" <?php $pos->shiftprint([1000, 750], [-10, 5]); ?> data-scale="1">
  		<h3>El sistema oculto</h3>
  		<img src="img/secret-uc.png" alt="uC secreto" width="568" height="582">
    </div>
    
    <div class="step hidden" <?php $pos->shiftprint(0); ?> data-scale="1">
  		<div style="position: relative; left: 650px;">
  			<img src="img/jtag_election.jpg" alt="JTAG y urna" width="490" height="435">
  		</div>
    </div>
    
    <div class="step" <?php $pos->shiftprint([0, 800], [10, -5, 10]); ?> data-scale="1">
  		<h3>Transmisión de resultados</h3>
  		<img src="img/taxis.jpg" alt="Taxis transmisores" width="1000" height="487">
    </div>
    
    <div class="step" <?php $pos->shiftprint([500, 800, -250], [-5, 25, -10]); ?> data-scale="1">
  		<h3>Esto pasó</h3>
  		<img src="img/eff.jpg" alt="EFF allanamiento" width="885" height="555">
    </div>
    <!-- -->

    <!-- world evoting -->
    <div class="step" <?php $pos->reset_angle(); $pos->shiftprint([0, 1500]); ?> data-scale="2">
  		<h2>Voto electrónico en el mundo</h2>
  	</div>
  	
  	<div class="step" <?php $pos->shiftprint([-500, 300]); ?> data-scale="1">
  		<h3>Holanda (2006)</h3>
  		<video width="640" height="360" controls>
        <source src="vid/holanda.webm" type="video/webm">
        V.E. en Holanda
      </video>
    </div>
    
    <div class="step" <?php $pos->shiftprint(["y" => 330]); ?> data-scale="1">
  		<h3>Irlanda</h3>
  		<h3>Bélgica</h3>
    </div>
    
    <div class="step" <?php $pos->shiftprint([1000, -220]); ?> data-scale="1">
  		<h3 class="centered">Alemania</3>
  		<blockquote class="txt-tiny">1. El principio de la publicidad de la elección del artículo 38 en relación con el art. 20 párrafo 1 y párrafo 2 ordena que todos los pasos esenciales de la elección están sujetos al control público, en la medida en que otros intereses constitucionales no justifiquen una excepción.</blockquote>
			<blockquote class="txt-tiny">2. En la utilización de aparatos electorales electrónicos, el ciudadano debe poder controlar los pasos esenciales del acto electoral y la determinación del resultado de manera fiable y sin conocimientos técnicos especiales.</blockquote>
  	</div>
  	
  	<div class="step" <?php $pos->shiftprint([-500, 550]); ?> data-scale="1">
  		<h3>EE. UU.</h3>
  		<video width="640" height="480" controls>
        <source src="vid/homero.webm" type="video/webm">
        Homero Simpson y el voto electrónico
      </video>
    </div>
    
    <div class="step" <?php $pos->shiftprint(["y" => 650], [0, 10, 0]); ?> data-scale="1">
  		<h3>India</h3>
  		<img src="img/india.jpg" alt="India voto electronico" width="620" height="476">
    </div>
    
    <div class="step" <?php $pos->shiftprint(800); ?> data-scale="1">
  		<h3>Brasil</h3>
  		<img src="img/dfaranha.jpg" alt="India voto electronico" width="1000" height="478">
    </div>
    
    <div class="step" <?php $pos->shiftprint(1200); ?> data-scale="1">
  		<h3>Venezuela</h3>
  		<video width="640" height="360" controls>
        <source src="vid/maduro.webm" type="video/webm">
        Maduro y el voto electrónico
      </video>
    </div>
    <!-- -->

		<!-- bu -->
		<div class="step" <?php $pos->reset_angle(); $pos->shiftprint([0, 1100]); ?> data-scale="2">
  		<h2>Boleta Única</h2>
			<h3>(de papel)</h3>
			<video width="640" height="360" controls>
        <source src="vid/alemania.webm" type="video/webm">
        Alemania y la boleta unica
      </video>
  	</div>

		<div class="step" <?php $pos->shiftprint(800); ?> data-scale="1">
  		<h3>Boleta Única</h3>
  		<img src="img/boleta_cordoba.jpg" alt="BUC" width="1000" height="636">
    </div>
		<!-- -->

		<!-- scrutiny -->
		<div class="step" <?php $pos->reset_angle(); $pos->shiftprint(["y" => 900]); ?> data-scale="1">
  		<h2>Escrutinio</h2>
			<video width="640" height="360" controls>
        <source src="vid/bonelli.webm" type="video/webm">
        Bonelli y el escrutinio
      </video>
		</div>
	
		<div class="step hidden" <?php $pos->printc(); ?> data-scale="1">
			<div style="position: relative; top: 300px;">
				<p>Multiplicar los ojos</p>
			</div>
  	</div>
		<!-- -->

    <!-- questions -->
		<div class="step" <?php $pos->reset_angle(); $pos->shiftprint(["y" => 1000], [20]); ?> data-scale="2">
			<h1 style="text-align: center;">&iquest;Preguntas?</h1>
		</div>
    <!-- -->

		<!-- goodbye -->
		<div class="step slide" <?php $pos->shiftprint(1600); ?> data-scale="1">
			<h1 class="centered">¡Muchas gracias!</h1>
			<h1>&iquest;M&aacute;s informaci&oacute;n?</h1>
			<br />
			<p>Pueden ver el informe, esta presentaci&oacute;n y m&aacute;s en el repo git:</p>
      <p class="right txt-verybig"><a class="link" target="_self" href="https://bit.ly/votar-report">bit.ly/votar-report</a></p>
      <br />
      <p>¡Divulgalo! (CC BY-SA v4.0).</p>
      <br />
			<p class="footnote">Powered by <a class="link-shadow" target="_blank" href="https://github.com/bartaz/impress.js">impress.js</a></p>
		</div>
    <!-- -->

    <!-- overview -->
    <?php
      if ($show_overview) {
        $pos->autoset_overview();
        $pos->print_overview();
      }
    ?>
    <!-- -->
	</div>

	<!-- impress code -->
	<!-- -hint -->
	<div class="hint">
                <p>Utiliza las flechas del teclado para avanzar/retroceder</p>
	</div>
	<script>
		if ("ontouchstart" in document.documentElement) {
		document.querySelector(".hint").innerHTML = "<p>Toca la parte derecha de la pantalla para avanzar</p>";
		}
	</script>
  <!-- - -->

	<script src="js/impress.js"></script>
	<script>impress().init();</script>
	<!-- -->
</body>
</html>
