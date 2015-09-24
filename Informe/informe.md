#vot.ar: una mala elección

Francisco Amato, Iván A. Barrera Oro, Enrique Chaparro, Sergio Demian Lerner, Alfredo Ortega, Juliano Rizzo, Fernando Russ, Javier Smaldone, Nicolas Waisman  

2a versión, julio 2015  
*CABA, Argentina*  

[@famato](https://twitter.com/famato)  
[@hackancuba](https://twitter.com/hackancuba)  
-  
[@SDLerner](https://twitter.com/SDLerner)  
[@ortegaalfredo](https://twitter.com/ortegaalfredo)  
[@julianor](https://twitter.com/julianor)  
-  
[@mis2centavos](https://twitter.com/mis2centavos)  
[@nicowaisman](https://twitter.com/nicowaisman)  

**Abstracto— Con el anuncio del Tribunal Superior de Justicia de la Ciudad de Buenos Aires de la implementación de un sistema de votación electrónico para la Ciudad, basado en boletas con chip RFID, decidimos investigar el asunto a sabiendas de casos de fracaso internacional por ser los sistemas como éste inseguros y para ciertos países, inconstitucional.  El objetivo del presente informe es verificar si este sistema es también inseguro y/o vulnerable, poner en evidencia los riesgos que implicase su empleo y contrastarlo con el de la boleta única de papel.**

##I. INTRODUCCIÓN  

El 8 de junio de 2015 el Tribunal Superior de Justicia de la Ciudad Autónoma de Buenos Aires aprueba el sistema de Boleta Electrónica mediante la resolución 127/15 [^1], donde reza:  

> Por Resolución n° 126, el Tribunal aprobó “...para la elección del 5 de julio y eventual segunda vuelta del 19 de julio, la aplicación de tecnologías electrónicas en la etapa de emisión del voto, escrutinio de sufragios y transmisión y totalización de resultados electorales provisorios, con el sistema de la empresa contratista del GCBA, auditado por la Universidad de Buenos Aires, en los términos del art. 25, del anexo II, ley nº 4894” y por artículo 2 se aprobaron las pantallas con las listas de todas las agrupaciones políticas, de acuerdo con la secuencia aprobada por la Acordada Electoral nº 17/15.  

Este sistema, llamado BUE y desarrollado por la empresa Grupo MSA bajo la denominación *vot.ar* consta de dos partes principales: máquina de emisión de voto y boleta única electrónica (BUE).  La primera se trata de una computadora portátil embebida en una caja que posee una pantalla táctil y un lector/escritor RFID e impresor de boletas.  La segunda consta de una lámina de papel grueso con la propiedad de poder ser impreso térmicamente y conteniendo un chip con tecnología RFID.  

El usuario inserta una boleta en blanco en la ranura correspondiente de la máquina y selecciona en la pantalla la lista o candidatos deseados.  Al finalizar, la máquina imprimirá lo seleccionado sobre la boleta (impresión térmica) y asimismo escribirá electrónicamente en el chip RFID estos mismos datos.  

El presente informe demostrará que el sistema es / puede ser vulnerable en los siguientes puntos:  

*   el chip de la BUE puede ser leído por un tercero,  
*   el chip de la BUE puede ser escrito nuevamente por un tercero [^2],  
*   la impresión térmica posee una vida media corta, anulando auditorías o revisiones futuras sobre un proceso electoral [^3],  
*   el hardware de la máquina puede ser accedido por terceros de manera local, pudiendo causar:  
*      impedir su normal funcionamiento,  
*      anular, modificar o leer votos, violando el Art. 37 de la Constitución Nacional “El sufragio es universal, igual, secreto y obligatorio.” [^4],  
*      conectar un aparato de transmisión remoto de datos.  

Hemos tenido acceso a las máquinas situadas en distintos puntos de la ciudad, y a máquinas proveídas por MSA durante una auditoría privada que no cabe en el marco de la presente y que sin embargo fue muy limitada.  El hardware es fundamental, dado que los equipos utilizados en las elecciones no han sido certificados en ningún punto del proceso, situación que pone en jaque la seguridad del sistema.  Consideramos que esta falla es del tipo crítica.  

##II. SOBRE VOT.AR  

Vot.Ar es una creación del Grupo MSA con el objeto de implementar un sistema de Boleta Única Electrónica (BUE).  

En su página web [^5] se autodefine como:  

1.  Secreto  
2.  Seguro  
3.  Transparente  
4.  Igualitario  

Respecto de estas pautas y con los elementos que serán expuestos en el presente, demostraremos que:  

1.  El voto puede ser leído por terceros, por tanto no es secreto;  
2.  El sistema es vulnerable, por tanto no es seguro;  
3.  El sistema posee hardware cerrado y código cerrado, no libre [^6] y [^7], por lo tanto no es transparente;  
4.  Aún si los electores, fiscales y demás intervinientes en el acto electoral son capacitados para el uso del sistema, proceso que en principio se estaría llevando a cabo por el TSJ CABA [^8], y el Gobierno de la Ciudad junto al Grupo MSA en Centros de Consulta [^9] y aún teniendo en cuenta a las personas con discapacidades visuales o auditivas, es nuestra consideración, puesto que no es posible comprender la totalidad del funcionamiento del sistema sin poseer conocimientos técnicos avanzados, que muy difícil resulta afirmar que el mismo sea igualitario.  

Debemos destacar que la empresa no ha facilitado la realización de este informe, así como sucedió con el informe del Departamento de Informática del ITBA que ampliaremos en el punto IV. A [^p-4-a], violando de esta manera el Inciso 3.4.1, ítem 2, del pliego de la licitación pública 2-SIGAF-2015 de la CABA:  

> El contratista deberá proveer al conocimiento y acceso, a los programas fuentes, funcionamiento de las máquinas de votación, sus características y programas (tanto hardware como software)  

y el Artículo 24, inciso “b” del anexo 2 de la ley 4894 de la CABA [^10]:  

> Tanto la solución tecnológica, como sus componentes de hardware y software debe ser abierta e íntegramente auditable antes, durante y posteriormente a su uso.  

##III. CÓMO SE VOTA  

Al momento de la elección, se dispondrán máquinas y BUE para cada lugar destinado a tal fin.  El Presidente de Mesa abrirá la mesa habilitando la máquina mediante una tarjeta especial (tarjeta azul), quedando así lista para operar.  Luego los electores podrán realizar el sufragio.  

Nos hemos presentado en un punto de consulta y hemos filmado un video demostrativo del proceso de inicialización del sistema y sufragio [^11].  

Finalizado el proceso, el Presidente introduce la boleta de inicialización donde se imprimirá la fecha y hora (*timestamp*), su nombre y los nombres de hasta tres Fiscales de Mesa, a los efectos de registrar la apertura de mesa y que conservará para sí como comprobante.  

###A. Inicialización del sistema  

El Presidente de Mesa recibe una tarjeta con chip RFID especial, un PIN, un DVD entregado en sobre lacrado y dos “boleta de inicialización” (boleta azul).  Dicho DVD contiene el software de votación.  

Se introduce el DVD en la lectora de la máquina y se enciende la misma.  Cuando el software haya iniciado, solicitará al usuario calibrar la pantalla presionando en las 4 esquinas de la misma y luego en el centro.   Estos pasos serán indicados por unos puntos y cruces que aparecerán en la pantalla.  

###B. Apertura de mesa  

Una vez calibrada la pantalla, el Presidente de Mesa abrirá la mesa identificándose con la tarjeta, introduciendo el número de mesa y su PIN, como se muestra en las Fig. 1[^fig-1] y 2[^fig-2].  

Luego, la máquina se encontrará lista para ser operada por los votantes y realizar el sufragio.  

###C. Proceso de sufragio  

El votante se presenta a la mesa correspondiente y se identifica mediante DNI.  Elige aleatoriamente una BUE y el Presidente corta un troquel de la misma y lo retiene junto al DNI.  Luego el votante toma la BUE y se dirige hacia la máquina.  Introduce la boleta en la ranura, como se aprecia en la Fig. 3[^fig-3] y elige de la pantalla el/los candidato/s o lista/s de candidato/s (ver Fig. 4[^fig-4]).  

Al finalizar la selección, se procede a imprimir la BUE:  

*   Se imprime en la boleta, mediante impresión térmica, los candidatos elegidos (detalle en Fig. 5[^fig-5]).  
*   Se almacena digitalmente esta misma información en el chip RFID (ver punto IV. B para mayor abundamiento).  

El votante toma la boleta impresa, se dobla hasta la línea indicada y se dirige a la Mesa; recorta un segundo troquel de la misma, que se entrega al Presidente para constatar que la boleta no ha sido reemplazada por otra y se introduce la misma dentro de la urna.  

Finalmente, el Presidente le devuelve el DNI al votante junto con un comprobante de voto y concluye el proceso de sufragio.  

###D. Cierre de mesa  

Al término del horario electoral, el Presidente debe realizar el cierre de la mesa, proceso idéntico al de Apertura de mesa descrito en el punto III. B[^p-3-b].  Conservará esta segunda boleta azul como comprobante de cierre de mesa.  

###E. Escrutinio de votos  

Cerrada la mesa se inicia el proceso de escrutinio de los votos.  Los técnicos conectan la máquina a la red, el Presidente inicializa el proceso y se leen los votos uno a uno aproximando la BUE al lector RFID.  Luego se cuentan las boletas y se verifica que el número de votos registrados por el sistema sea igual a la cantidad de boletas; esto es necesario en caso de que alguna boleta no haya sido leída correctamente [^12].  

Si el resultado es correcto, se sellan las boletas en una bolsa y se imprime un certificado de escrutinio que contiene las cantidades registradas y, que es simplemente una boleta similar a la boleta azul y de igual efecto comprobatorio.  Finalmente se emite el recuento al servidor central.  

##IV. ANÁLISIS DETALLADO DE SISTEMA  

Hemos realizado esta investigación haciendo uso de las máquinas de capacitación que se encuentran distribuidas por la ciudad [^9].  

###A. Software vot.ar  

El software empleado se trata de un programa escrito mayormente en lenguaje Python y que funciona sobre un sistema operativo Ubuntu.  Los detalles sobre el sistema operativo se encuentran en el Apéndice A[^apendice-a].  

La empresa proveerá al TSJ de la imagen de DVD con el software necesario a los efectos de que éste realice grabaciones de discos DVD y los entregue en sobre lacrado el día electoral.  No contamos con mayor detalle de este proceso.  

La imagen en cuestión es arrancable (booteable), esto es, la PC puede iniciar el sistema operativo desde el mismo.  Con el objeto de validar los DVD, la empresa entrega asimismo los hashes de los archivos contenidos, que se trataban en principio de hashes MD5 y luego fueron reemplazados por SHA512, según indica el Sr. Fisanotti, empleado de MSA [^13].  En nuestras pruebas, si bien se encontró el archivo sha512sum.txt, el mismo no es usado en ningún momento por el software, sino que se usa el archivo conteniendo hashes MD5 md5sum.txt [14].  No existe diferencia real respecto de la validación de archivos, dado que sin importar el algoritmo empleado, este archivo puede ser generado por cualquier persona.  No está firmado digitalmente, dando cuenta de un grave error de apreciación de seguridad.  

El software desarrollado por MSA para realizar el proceso de sufragio ha sido auditado por el Departamento de Computación de la Facultad de Ciencias Exactas y Naturales de la Universidad de Buenos Aires (FCEyN-UBA) [^15], encontrando algunos errores y problemas catalogados como menores, diciendo cumplir  los requisitos mínimos para ser empleado en un acto eleccionario, diagramados en el Anexo II de la Ley 4894/13 [^10] y [^16].  

Del informe pueden destacarse lo siguiente:  

> Los defectos en la documentación representan un punto débil a observar en el software que dificulta no sólo la auditabilidad del mismo, sino también el mantenimiento y la evolución [^17].  
> [...] es crucial para el correcto funcionamiento [del sistema] en forma global que las autoridades de mesa, delegados judiciales y demás responsables de los comicios sigan los procedimientos aprobados por el Tribunal (Acordada 17/2015, Anexo II) [...] [^18].  

El Anexo I detalla puntos débiles del software como funciones no recomendadas y demás.  

Se indica que el software es válido para ser empleado en un acto eleccionario debido a que 

> la voluntad de los electores se puede verificar en forma completamente manual [^19]  

, esto es, aún alterando el contenido del chip RFID de la BUE, se puede verificar manualmente observando los valores impresos.  

Si bien esto es cierto, destacamos el hecho que este sistema, al ser vulnerable como se demuestra en los puntos IV. B[^p-4-b], C[^p-4-c] y D[^p-4-d], requiere de un conteo manual y además  
> la única forma de asegurar la confiabilidad de los comicios con este sistema es, al igual que en el sistema tradicional de boletas preimpresas con sobres, que las autoridades de los comicios sepan los procedimientos que deben seguir y lo hagan [^20]  

, que nos conduce a preguntarnos cuál es el objetivo de emplear este sistema si no implican ventajas respecto de la boleta única de papel.  
