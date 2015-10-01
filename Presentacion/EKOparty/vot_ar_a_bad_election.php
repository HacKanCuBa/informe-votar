<?php 
/*
        Vot.Ar: a bad election. Presentation for the EKOparty #11, oct 2015
        by HacKan | Ivan A. Barrera Oro
        Licence CC BY-SA v4.0: http://creativecommons.org/licenses/by-sa/4.0/
        Feel free to share!!
*/

error_reporting(E_ALL);

class Position 
{
        /**
         * Coordinates (data-...)
         */
        private $x, $y, $z;
        /**
         * Angles (data-rotate-...)
         */
        private $alpha, $theta, $phi;

        function __construct() 
        {
                $this->reset();
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
                        $this->x = array_key_exists("x", $coord) 
                                        ? $coord["x"] 
                                        : (array_key_exists(0, $coord) 
                                                ? $coord[0] 
                                                : $this->x
                                        );
                        $this->y = array_key_exists("y", $coord) 
                                        ? $coord["y"] 
                                        : (array_key_exists(1, $coord) 
                                                ? $coord[1] 
                                                : $this->y
                                        );
                        $this->z = array_key_exists("z", $coord) 
                                        ? $coord["z"] 
                                        : (array_key_exists(2, $coord) 
                                                ? $coord[2] 
                                                : $this->z
                                        );
                } elseif (is_numeric($coord)) {
                        $this->x = $coord;
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
                        $this->alpha = array_key_exists("alpha", $angle) 
                                        ? $angle["alpha"] 
                                        : (array_key_exists(0, $angle) 
                                                ? $angle[0] 
                                                : $this->alpha
                                        );
                        $this->theta = array_key_exists("theta", $angle) 
                                        ? $angle["theta"] 
                                        : (array_key_exists(1, $angle) 
                                                ? $angle[1] 
                                                : $this->theta
                                        );
                        $this->phi = array_key_exists("phi", $angle) 
                                        ? $angle["phi"] 
                                        : (array_key_exists(2, $angle) 
                                                ? $angle[2] 
                                                : $this->phi
                                        );
                } elseif (is_numeric($angle)) {
                        $this->alpha = $angle;
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
         * Sets coords and angles to 0.
         */
        public function reset()
        {
                $this->reset_coord();
                $this->reset_angle();
        }


        /**
         * Get the coordinates
         *
         * @return array An array of coordinates
         */
        public function get_coord()
        {
                return [$this->x, $this->y, $this->z];
        }

        /**
         * Get the angles
         *
         * @return array An array of angles
         */
        public function get_angle()
        {
                return [$this->alpha, $this->theta, $this->phi];
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
                        $this->x += array_key_exists("x", $delta) 
                                        ? $delta["x"] 
                                        : (array_key_exists(0, $delta) 
                                                ? $delta[0] 
                                                : 0
                                        );
                        $this->y += array_key_exists("y", $delta) 
                                        ? $delta["y"] 
                                        : (array_key_exists(1, $delta) 
                                                ? $delta[1] 
                                                : 0
                                        );
                        $this->z += array_key_exists("z", $delta) 
                                        ? $delta["z"] 
                                        : (array_key_exists(2, $delta) 
                                                ? $delta[2] 
                                                : 0
                                        );
                } elseif (is_numeric($delta)) {
                        $this->x += $delta;
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
                        $this->alpha += array_key_exists("alpha", $delta) 
                                        ? $delta["alpha"] 
                                        : (array_key_exists(0, $delta) 
                                                ? $delta[0] 
                                                : 0
                                        );
                        $this->theta += array_key_exists("theta", $delta) 
                                        ? $delta["theta"] 
                                        : (array_key_exists(1, $delta) 
                                                ? $delta[1] 
                                                : 0
                                        );
                        $this->phi += array_key_exists("phi", $delta) 
                                        ? $delta["phi"] 
                                        : (array_key_exists(2, $delta) 
                                                ? $delta[2] 
                                                : 0
                                        );
                } elseif (is_numeric($delta)) {
                        $this->alpha += $delta;
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
                echo 'data-x="' . $this->x 
                        . '" data-y="' . $this->y 
                        . '" data-z="' . $this->z . '"';

                echo ' ';

                echo 'data-rotate-x="' . $this->alpha 
                        . '" data-rotate-y="' . $this->theta 
                        . '" data-rotate-z="' . $this->phi . '"';
                
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
}

$pos = new Position;
?>
<!DOCTYPE html>
<html lang="en">
<!--
        Vot.Ar: a bad election. Presentation for the EKOparty #11, oct 2015
        by HacKan | Ivan A. Barrera Oro
        Licence CC BY-SA v4.0: http://creativecommons.org/licenses/by-sa/4.0/
        Feel free to share!!
-->
<head>
        <meta charset="utf-8">

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
                <div id="title" class="step anim" <?php $pos->printc(); ?> data-scale="3">
                        <h1 class="centered">Vot.Ar: a bad election</h1>
                        <h3>A presentation about the <i class="scaling flag-blue">Vot.Ar</i> (aka BUE) system, its HW, SW & Vulns.</h3>
                        <br /><br />
                        <p>Also, a bit about <i>eVoting</i>.</p>
                        <p class="footnote"><a class="link-shadow" href="https://twitter.com/hashtag/VotArABadElection" target="_blank">#VotArABadElection</a> <a class="link-shadow" href="https://twitter.com/hashtag/eko11" target="_blank">#eko11</a></p>
		</div>
                <!-- -->

                <!-- intro -->
                <!-- -short intro about the people involved, what moved us to do this. -->
                <div id="authors" class="step anim" <?php $pos->shift([7000, 600]); $pos->printc(); ?> data-scale="10">
                        <p>Authors: 
                                <a class="link" href="https://twitter.com/famato" target="_blank">Francisco Amato</a>, 
                                <a class="link" href="https://twitter.com/hackancuba" target="_blank">Iv&aacute;n A. Barrera Oro</a>, 
                                <a class="link" href="https://twitter.com/FViaLibre" target="_blank">Enrique Chaparro</a>, 
                                <a class="link" href="https://twitter.com/SDLerner" target="_blank">Sergio Demian Lerner</a>, 
                                <a class="link" href="https://twitter.com/ortegaalfredo" target="_blank">Alfredo Ortega</a>, 
                                <a class="link" href="https://twitter.com/julianor" target="_blank">Juliano Rizzo</a>, 
                                <a class="link" href="#authors" target="_self">Fernando Russ</a>, 
                                <a class="link" href="https://twitter.com/mis2centavos" target="_blank">Javier Smaldone</a>,
                                <a class="link" href="https://twitter.com/nicowaisman" target="_blank">Nicolas Waisman</a>
                        </p>
                        <p class="footnote">Presenters: <b class="scaling"><i>Iv&aacute;n</i> & <i>Javier</i></b></p>
                </div>
                <!-- - -->
                <!-- +(16000,x,x) --><?php $pos->set([23000, -1000, 0]); ?>
                <!-- -timeline -->
                <div class="step" <?php $pos->printc(); ?> data-scale="1">
                        <h2>How did this investigation began?</h2>
                        <ol>
                                <li>Through CaFeLUG group I was contacted for a private audit on the system.</li>
                                <li>I got mad because of <em class="pastel-red">prohibition</em> to touch/modify/carefully analyse things.</li>
                                <li>I contacted Javier, who always gives talks in <em class="soft-green">FLISOL</em> about e-voting, told him my experience.</li>
                                <li>He tells me about his idea, and things got in motion...</li>
                        </ol>
                </div>
                <!-- - -->
                <!-- +(0,800,0) -->
                <!-- -what did we find? -->
                <div class="step" <?php $pos->shiftprint([0, 800], -20); ?> data-scale="1">
                        <h2>What did we find?</h2>
                        <ul>
                                <li>Bad design, worst implementation</li>
                                <li>Vulnerabilities due to bad software practice</li>
                                <li>An very expensive system that doesn't present considerable advantages compared to the unique paper ballot system</li>
                        </ul>
                </div>
                <!-- - -->
                <!-- +(0,1100,0) -->
                <!-- -how did we do it? -->
                <div class="step" <?php $pos->shiftprint([0, 1100], -40); ?> data-scale="1">
                        <h2>How did we do this?</h2>
                        <ul>
                                <li>About a week or so of hard work</li>
                                <li>Unofficial: no assistance provided by company nor gov</li>
                                <li>By going to public consultation points to have access to machines and ballots
                                <ul>
                                        <li>Plugging in a keyboard to let the magic happen :D</li>
                                </ul>
                                </li>
                        </ul>
                </div>
                <!-- +(0,550,-400) -->
                <div class="step" <?php $pos->reset_angle(); $pos->shiftprint([0, 550, -400]); ?> data-scale="1">
                        <ul>
                                <li>Building a few devices for hardware tests:
                                <ul>
                                        <li>ballot reader</li>
                                        <li>ballot burner</li>
                                        <li>RFID jammer</li>
                                </ul>
                                (some worked, some didn't)
                                </li>
                                <li>Lots of internet research</li>
                                <li>Lots of thinking</li>
                                <li>Great effort</li>
                        </ul>
                </div>
                <!-- - -->
                <!-- -->
                <!-- +(0,1050,400) -->
                <!-- about vot.ar, brief desc -->
		<div class="step anim" <?php $pos->shiftprint([0, 1050, 400]); ?> data-scale="1">
                        <p><strong>Vot.Ar</strong> by MSA Group is a paper-based eVoting system, with two main elements:</p>
                        <ul>
                                <li>The vote-casting and counting machine</li>
                                <li>The ballot</li>
                        </ul>
                        <p><b class="scaling pastel-red">Main issue?</b></p>
                        <p class="footnote pastel-red">among others...</p>
                </div><!-- +(0,0,0) -->
		<div class="step hidden" <?php $pos->printc(); ?> data-scale="1">
                        <div style="position:absolute; top: 45px; left: 580px;">
                                <div class="overlay-img-txt txt-size-tiny pale-yellow">
                                        <img src="img/facepalm.jpg" alt="facepalm" width="300" height="225" />
                                        <span>It's RFID based!</span>
                                </div>
                        </div>
                </div>
                <!-- -->
                <!-- +(0,500,300) -->
                <!-- israel case -->
                <div class="step hidden" <?php $pos->shiftprint([1100], ["theta" => -25]); ?> data-scale="1">
                        <p>Why is RFID such a bad idea?</p>
                        <img src="img/evoting-rfid.jpg" alt="e-voting rfid" width="1050" height="625" />
                </div>
                <!-- -->
                <!-- +(0,500,0) -->
                <!-- how is it supposed to be -->
                <div class="step anim" <?php $pos->reset_angle(); $pos->shiftprint(["y" => 1100]); ?> data-scale="1">
                        <h2>Requirements for the system (by it's patent & law)</h2>
                        <ol>
                                <li><strong>Free (as in freedom)</strong>*</li>
                                <li><strong>Universal</strong>*</li>
                                <li class="pastel-red"><strong>Secret</strong>*</li>
                                <li><strong>Mandatory</strong>*</li>
                                <li>Equal</li>
                                <li class="pastel-red">One vote per elector</li>
                        </ol>
                        <p class="footnote">* Constitutional rights</p>
                </div>
                <!-- +(0,750,0) -->
                <div class="step anim" <?php $pos->shiftprint(["y" => 1000], ["theta" => 10]); ?> data-scale="1">
                        <h2>Some things to note</h2>
                        <ul>
                                <li>Completely closed HW & SW</li>
                                <li>Absolutely no public documentation<br />
(yet the maker says it's open source!)</li>
                                <li>Over 7 years of development
                                <ul>
                                        <li>Used in Salta</li>
                                </ul>
                                </li>
                                <li>Recently used in Resistencia, Chaco</li>
                                <li>Soon to be used in Neuquén</li>
                        </ul>
                </div>
                <!-- +(0,830,0) -->
                <div class="step anim" <?php $pos->shiftprint([900, 115], ["theta" => 10]); ?> data-scale="1">
                        <ul>
                                <li>2 official audits by the time of this report:
                                <ul>
                                        <li>Prof. Righetti, FCEN, UBA: OAT 03/15
                                        <br /><strong>Conclusion</strong>: <em>small issues, but ok</em></li>
                                        <li>Departamento de Inform&aacute;tica, ITBA: DVT 56-504
                                        <br /><strong>Conclusion</strong>: <em>inconclusive, recommendations given</em></li>
                                </ul>
                                </li>
                        </ul>
                </div>
                <!-- +(0,570,0) -->
                <div class="step anim" <?php $pos->shiftprint([-200, 750], ["theta" => 10]); ?> data-scale="2">
                        <p><strong>The system reported here is as it was used in this year's elections</strong> in Buenos Aires Autonomous City (CABA)</p>
                </div>
                <!-- -->

                <!-- macro description of the system -->
                <!-- -machine -->
                <div class="step" <?php $pos->reset_angle(); $pos->shiftprint([4000, 200]); ?> data-scale="1">
                        <h2>Overview of Vot.Ar</h2>
                        <img src="img/overview.png" alt="overview" width="700" height="700" />
                </div>
                <!-- +(-1200,0,0) -->
                <div class="step" <?php $pos->shiftprint(-1200, ["phi" => -10]); ?> data-scale="1">
                        <p>It has on the left:</p>
                        <ul>
                                <li>Touchscreen for operation (to pick candidates and stuff)</li>
                        </ul>
                </div>
                <!-- +(1950,0,0) -->
                <div class="step" <?php $pos->shiftprint(1950, ["phi" => 20]); ?> data-scale="1">
                        <p>It has on the right:</p>
                        <ul>
                                <li>An RFID reader/writer + thermal printer unit</li>
                        </ul>
                </div>
                <!-- +(-850,-700,0) -->
                <div class="step" <?php $pos->shiftprint([-850, -700], [30, 0, -10]); ?> data-scale="1">
                        <p>It has on the top:</p>
                        <ul>
                                <li>
                                DVD R/W, status LEDs & ports: 
                                <table>
                                        <tr>
                                                <td>
                                                        <ul>
                                                                <li>USB</li>
                                                                <li>SVGA</li>
                                                        </ul>
                                                </td>
                                                <td>
                                                        <ul>
                                                                <li>Ethernet</li>
                                                                <li>Speaker</li>
                                                        </ul>
                                                </td>
                                        </tr>
                                </table>
                                accessible for everyone, under a small lid
                                </li>
                        </ul>
                </div>
                <!-- +(100,1350,0) -->
                <div class="step" <?php $pos->shiftprint([100, 1350], -60); ?> data-scale="1">
                        <p>It has on the bottom:</p>
                        <ul>
                                <li>a power source + 2 battery pack</li>
                                <li>and sometimes, a JTAG cable!</li>
                        </ul>
                </div>
                <!-- - -->
                <!-- +(0,300,0) -->
                <div class="step" <?php $pos->reset_angle(); $pos->shiftprint(["y" => 300]); ?> data-scale="1">
                        <p>And then there's the ballot, which has an RFID chip + thermal paper on the back</p>
                        <p class="footnote">Hang on, details are coming...</p>
                </div>
                <!-- +(0,250,0) -->
                <div class="step" <?php $pos->shiftprint(["y" => 250]); ?> data-scale="1">
                        <p>But propaganda said:</p>
                        <q>It's a printer, not a computer!</q>
                        <p><small>and everybody believed it!</small></p>
                </div>
                <!-- +(0,900,0) -->
                <div class="step" <?php $pos->shiftprint(["y" => 815], 10); ?> data-scale="2">
                        <div class="overlay-img-txt txt-size-reduced centered bottom flag-blue">
                                <img src="img/tweeting-machine.png" alt="Tweeting from a Vot.Ar machine" width="1219" height="652" />
                                <span>So here we were, tweeting from a "printer"...</span>
                        </div>
                </div>
                <!-- -->

                <!-- HW deep -->
                <!-- -inside, all -->
                <div class="step" <?php $pos->reset_angle(); $pos->shiftprint(["y" => 1600]); ?> data-scale="1">
                        <h2>Now let's get deep into the HW</h2>
                        <p>What's inside the machine?</p>
                        <img src="img/inside.jpg" alt="Inside the machine" width="1000" height="645" />
                </div>
                <!-- +(0,1000,0) -->
                <div class="step" <?php $pos->shiftprint(["y" => 1000], ["theta" => 10]); ?> data-scale="1">
                        <p>Deeper inside (behind the screen):</p>
                        <img src="img/inside-behind.jpg" alt="Behind the inside of the machine" width="1000" height="735" />
                </div>
                <!-- +(-1200,0,0) -->
                <div class="step" <?php $pos->shiftprint(-1200); ?> data-scale="1">
                        <ul>
                                <li>JTAG port: used to program/debug the microcontroller.
External access via a cable near the batteries.</li>
                        </ul>
                        <div class="overlay-img-txt txt-size-tiny" style="text-align: center;">
                                <img src="img/jtag-elections.jpg" alt="JTAG exposed during elections" width="580" height="435" />
                                <span>Some machines had it even during elections!</span>
                        </div>
                        <p class="footnote">More on this at <a class="link" href="https://blog.smaldone.com.ar/2015/07/15/el-sistema-oculto-en-las-maquinas-de-vot-ar">Javier's blog</a></p>
                </div>
                <!-- +(2100,0,0) -->
                <div class="step anim" <?php $pos->shiftprint(2200); ?> data-scale="1">
                        <ul>
                                <li>Microprocessor (uP): Intel(R) Celeron(R) CPU N2930 @ 1.83GHz</li>
                                <li>RAM memory: 2GB DDR3 1600</li>
                                <li>Microcontroller (uC): Atmel AT91SAM7X256
                                <ul>
                                        <li>Internal E2PROM memory: 256KB <b class="positioning">(!)</b></li>
                                </ul>
                                </li>
                        </ul>
                </div>
                <!-- - -->
                <!-- +(-900,800,0) -->
                <!-- -uC -->
                <div class="step" <?php $pos->shiftprint([-900, 1000], ["theta" => 10]); ?> data-scale="1">
                        <p>So, we found an unknown subsystem:</p>
                        <img src="img/secret-uc.png" alt="Secret microcontroller" width="568" height="582" />
                </div>
                <!-- +(500,50,0) -->
                <div class="step anim" <?php $pos->shiftprint([700, 100, 20], ["theta" => 10]); ?> data-scale="1">
                        <p>The ARM controls the thermal printer and the RFID reader/writer.</p>
                        <p>Its internal E2PROM memory is <b class="scaling_right">sufficient to store</b><br />every vote cast and more.</p>
                        <p>We know <em>nothing</em> about this, Jon Snow!</p>
                </div>
                <!-- - -->
                <!-- +(-500,1150,0) -->
                <!-- -ballots -->
                <div class="step" <?php $pos->shiftprint([-500, 1150], ["theta" => 10]); ?> data-scale="1">
                        <h3>About the ballots (aka BUE cards)</h3>
                        <img src="img/ballot.jpg" alt="Ballot" width="1000" height="732" />
                </div>
                <!-- +(1750,100,0) +(0,10,0) -->
                <div class="step" <?php $pos->shiftprint([1750, 100], ["theta" => 10]); ?> data-scale="2">
                        <ul>
                                <li>Paperboard with a print on one side, and thermal paper on the other + RFID chip</li>
                                <li>The thin metal layer protects the chip from being read when the ballot is <em>perfectly</em> bent over</li>
                        </ul>
                </div>
                <!-- +(-1750,850,0) +(-10,-10,0) -->
                <div class="step" <?php $pos->shiftprint([-1750, 850], [-10, -10]); ?> data-scale="1">
                        <h4>The RFID Chip</h4>
                        <ul>
                                <li>ICODE SLI SL2 ICS20 (ISO 15693)</li>
                                <li>has a unique ID code</li>
                        </ul>
                        <table>
                        <thead>
                                <tr>
                                        <th colspan="3">Tag Categories</th>
                                </tr>
                        </thead>
                        <tbody>
                                <tr>
                                        <td>
                                        <ul>
                                                <li>Empty Tag</li>
                                                <li>Vote</li>
                                                <li>Technician</li>
                                                <li>President of the Polling Station</li>
                                        </ul>
                                        </td>
                                        <td>
                                        <ul>
                                                <li>Scrutiny Finalised</li>
                                                <li>Polling Station Open</li>
                                                <li>Scrutiny Transmission</li>
                                                <li>Demonstration</li>
                                        </ul>
                                        <td>
                                        <ul>
                                                <li>Virgin Tag (?)</li>
                                                <li>Addendum (?)</li>
                                                <li>Unknown (?)</li>
                                        </ul>
                                        </td>
                                </tr>
                        </tbody>
                        </table>
                        <p class="footnote">More info about the chip and how data is stored, in the report</p>
                </div>
                <!-- - -->
                <!-- -->

                <!-- SW deep-->
                <div class="step" data-x="26000" data-y="-6000" data-scale="1">
                        <h2>Time to analyse the SW</h2>
                        <p>We were able to do it thanks to the help of someone named <a class="link" href="https://twitter.com/prometheus_ar">Prometheus</a>, who <a class="link-shadow" href="https://github.com/prometheus-ar/vot.ar/">published the source code</a>.<p>
                        <ul>
                                <li>Lacks completely of (public) documentation and also in-code documentation</li>
                                <li>Very few comments</li>
                                <li>Untidy code</li>
                                <li>No unit testing</li>
                        </ul>
                </div>
                <div class="step" data-x="26000" data-y="-5500" data-scale="1">
                        <p>This makes it hard to read, audit, maintain, improve...</p>
                </div>
                <div class="step" data-x="26000" data-y="-5375" data-rotate-x="180" data-scale="1">
                        <p>...but ideal to breed nasty bugs...</p>
                </div>
                <div class="step anim" data-x="26000" data-y="-5250" data-scale="1">
                        <p>...such as <b class="scaling">#multivote</b> and others</p>
                </div>

                <!-- -command injection -->
                <div class="step" data-x="27200" data-y="-6000" data-rotate-y="90" data-scale="1">
                        <h2>Command injection</h2>
                        <p>Alfredo Ortega found a command injection vulnerability in the QR Code generator routine</p>
                        <ol>
                                <li>msa/core/clases.py, line 190: a_qr_str() returns a comma-separated list of values</li>
                                <li>msa/core/clases.py, line 206: a_qr() sends those values to the vulnerable function</li>
                                <li>msa/core/qr.py, line 13: crear_qr() vulnerable function, executes the command without sanitising first</li>
                        </ol>
                </div>

                <div class="step" data-x="27200" data-y="-5100" data-rotate-y="90" data-scale="1">
                        <p>This routine is executed to print the names of the President of the Polling Station and assistants.</p>
                        <ul>
                                <li>First name: <pre>John</pre></li>
                                <li>Last name: <pre>Doe;echo 'this is bad!'</pre></li>
                        </ul>
                        <p>Nevertheless, the name input screen does sanitise and has a length limit, so exploiting this is very difficult.</p>
                </div>
                <!-- - -->

                <!-- -multivote -->
                <div class="step" data-x="27200" data-y="-2900" data-z="0" data-rotate-y="-90" data-scale="1">
                        <h2>Multivote</h2>
                        <p>This vulnerability allows an attacker to add several votes to the RFID chip, as many as the chip's memory amount supports (about 10~12 votes).</p>
                        <p>Also, it's not mandatory to distribute the votes in any way: they can be for a single candidate, or split among several candidates, in the same or different electoral category.</p>
                </div>

                <div class="step" data-x="27200" data-y="-2900" data-z="1200" data-rotate-y="-90" data-scale="1">
                        <img src="img/multivote.png" alt="Multivote" width="595" height="700" />
                </div>

                <div class="step" data-x="27200" data-y="-2900" data-z="2450" data-rotate-y="-90" data-scale="2">
                        <p>You cannot differentiate between a multivote ballot and a normal one with a naked eye.</p>
                        <p>So, an attacker with access to a thermal printer and blank ballots (not too hard to get) could cast fake votes from beforehand that are very hard to detect.</p>
                </div>
                <!-- - -->

                <!-- -bypassing log-in -->
                <div class="step" data-x="33000" data-y="0" data-scale="1">
                        <h2>Bypassing log-in screen</h2>
                        <h3>Impersonating admin or President of the Polling Station</h3>
                        <p style="text-align: right;">This is trivial, since no authentication is used with the chip's data</p>
                        <p>Get some spare RFID chips and:</p>
                        <ol>
                                <li>Craft a fake <i>Polling Station Open</i> ballot</li>
                                <li>Craft a <i>President of the Polling Station</i> ballot</li>
                                <li>Craft a <i>Technician</i> ballot</li>
                        </ol>
                </div>
                <div class="step" data-x="32400" data-y="1000" data-rotate-y="20" data-scale="2">
                        <div class="overlay-img-txt txt-size-reduced pale-yellow">
                                <img src="img/start-screen.jpg" alt="Home Screen" width="711" height="400" />
                                <span>Use the President ballot to pop up<br />the log-in screen</span>
                        </div>
                </div>
                <div class="step" data-x="34000" data-y="1300" data-rotate-y="-20" data-scale="2">
                        <div class="overlay-img-txt txt-size-reduced pale-yellow">
                                <img src="img/login-screen.jpg" alt="Log-in Screen" width="711" height="400" />
                                <span>Use the Polling Station Open ballot <br />to bypass password</span>
                        </div>
                </div>
                <div class="step" data-x="32400" data-y="2200" data-rotate-y="20" data-scale="2">
                        <div class="overlay-img-txt txt-size-reduced centered flag-blue">
                                <img src="img/loggedin-screen.jpg" alt="Logged-in Screen" width="711" height="400" />
                                <span>Logged-in :)</span>
                        </div>
                </div>
                <div class="step" data-x="33000" data-y="3200" data-scale="1">
                        <p>Now you use the Technician ballot and...</p>
                        <div class="overlay-img-txt txt-size-reduced pale-yellow">
                                <img src="img/maintenance-screen.jpg" alt="Maintenance screen" width="900" height="566" />
                                <span>...access maintenance mode</span>
                        </div>
                        <p class="footnote">Threat level: low.  But it shows how these people work...</p>
                </div>
                <!-- - -->
                <!-- -->

                <!-- questions -->
		<div class="step anim slide" data-x="1000" data-y="6800" data-scale="2">
			<h1 style="text-align: center;">Questions?</h1>
                        <br />
                        <p>We hope you enjoyed this presentation!</p>
                        <p>Ask <em>whatever</em> you want, there are no restrictions.</p>
		</div>
                <!-- -->

                <!-- thanks -->
		<div class="step anim slide" data-x="2500" data-y="6800" data-scale="1">
			<h1 style="text-align: center;">Thanks for listening!</h1>
			<br />
			<p>Also, we want to thank everybody who supported us:</p>
                        <ul>
                                <li>CaFeLUG (Sergio Aranda Peralta, Ximena García, Lucas Lakousky, Juan Muguerza, Sergio Orbe, Andrés Paul)</li>
                                <li>Fundación Via Libre</li>
                                <li>Our friends that are always there...</li>
                                <li>EKOparty organisers for providing a place to share
                                <ul>
                                        <li>Juan Pablo Daniel Borgna, Leonardo Pigñer, Federico Kirschbaum, Jerónimo Basaldúa, Francisco Amato</li>
                                </ul>
                                </li>
                        </ul>
		</div>
                <!-- -->

                <!-- goodbye -->
		<div class="step slide" data-x="3500" data-y="6800" data-scale="1">
			<h1 style="text-align: center;">Hungry for information?</h1>
			<br />
			<p>You can get the full report, this presentation and more at the git repo:</p>
                        <p style="text-align: right;"><a class="link" href="https://bit.ly/votar-report">bit.ly/votar-report</a></p>
                        <p>Feel free to share! (CC BY-SA v4.0).</p>
			<br /><br /><br /><br />
			<p class="footnote">Powered by <a href="https://github.com/bartaz/impress.js" class="link-shadow" target="_blank">impress.js</a></p>
		</div>
                <!-- -->

                <div id="overview" class="step" data-x="17000" data-y="1000" data-scale="22">
                </div>
	</div>

        <!-- impress code -->
        <!-- -hint -->
	<div class="hint">
		<p>Use the arrow keys to move forward/backward</p>
	</div>
	<script>
		if ("ontouchstart" in document.documentElement) { 
		document.querySelector(".hint").innerHTML = "<p>Touch the right side of the screen to move forward</p>";
		}
	</script>
        <!-- - -->

	<script src="js/impress.js"></script>
	<script>impress().init();</script>
        <!-- -->
</body>
</html>
