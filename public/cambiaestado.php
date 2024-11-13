<?php
if(isset($_GET['identificador']))
{
    $identificador = $_GET['identificador'];
    $sucursal      = $_GET['sucursal'];
    $comentarios   = $_GET['comentarios'];

    $comentarios = trim($comentarios);
    /* si los comentarios no estan vacios*/
    if ($comentarios != '') 
    {
        $alertaBoolean = false;
        $alertaBoolean = detectarPalabras($comentarios);

        /*en caso de haber detectado una palabra de alerta entra en el if() y comienza el proceso de envio de la alerta*/
        if ($alertaBoolean) 
        {
            require 'phpEncuestaE/conexion.php';
            $conexionObj = new conexion();

            $sql = "SELECT token, badge FROM notificaciones WHERE token != '' AND identificador=$identificador AND sucursal='$sucursal' AND enviar=1";

            $result = mysqli_query($conexionObj->getConexion(), $sql);

            $arrTokens = array();

            while($row = mysqli_fetch_array($result))
            {

                $token  = $row['token'];
                $numero = $row['badge'];
                $numero += 1;

                mysqli_query ($conexionObj->getConexion(), "UPDATE notificaciones SET badge = $numero WHERE token = '$token' AND sucursal = '$sucursal' AND identificador = $identificador");
                $arrTokens[] = $token;
            }      

            //declaramos una constante como llave de acceso al servidor firebase
            define( 'API_ACCESS_KEY', 'AAAAryQC3Bo:APA91bGXnR7fvPEW5kovmSJj_ZspYRCEnfWT3DGpn3fW1Ro6OzJWo6ybKF8n_HOdB-b6fKUOF6ajg5R7nmOf4gJL3oM617vqfCqw-qxUCGanibHSUQy8N5vMx7jJMLEThxjKKh1ObAtM' );

            $registrationIds = array_values(array_unique($arrTokens));


            $msg = array
                (
                'body' 	=> $comentarios,
                'title'	=> $sucursal,
                'icon'	=> 'myicon',
                'sound' => 'mySound',
                'badge' => '1'
            );
            $fields = array
                (
                'registration_ids' => $registrationIds,
                'notification'	=> $msg);


            $headers = array
                (
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
            );

            $ch = curl_init();
            curl_setopt($ch ,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
            curl_setopt($ch ,CURLOPT_POST, true );
            curl_setopt($ch ,CURLOPT_HTTPHEADER, $headers );
            curl_setopt($ch ,CURLOPT_RETURNTRANSFER, true );
            curl_setopt($ch ,CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt($ch ,CURLOPT_POSTFIELDS, json_encode( $fields ) );
            curl_exec($ch);
            curl_close($ch);

            mysqli_free_result($result);   

            $conexionObj->closeConexion();
        }
    }

}


function detectarPalabras($comentarios)
{

    $palabrasAlerta = array('propina', 'exijio', 'exigiendo', 'exigio', 'acoso', 'acosar', 'acosa', 'acosando', 'molestando', 'acosaba', 'pesimo', 'pésimo', 'malo', 'mal', 'lento', 'fatal',
  'feo', 'falla', 'fallando', 'fallar', 'fallo', 'falló', 'mala', 'malos', 'malas', 'pesima', 'pesimas', 'pésimas', 'pesimos', 'pésimos', 'lentos', 'lenta', 'lentas', 'tarda', 'tardan', 'tardaron',
  'tardaban', 'pelo', 'pelos', 'cabello', 'cabellos', 'falta', 'faltan', 'falto', 'faltó', 'faltaba', 'faltaron', 'seco', 'reseco', 'congelado', 'congelada','frío','frio', 'asco', 'tardada', 'tardado',
  'sucio', 'sucios', 'sucia', 'sucias', 'mosca', 'moscas', 'mosquito', 'mosquitos', 'mosco', 'moscos', 'cucaracha', 'cucarachas', 'desabrida', 'desabridas', 'desabrido', 'desabridos', 'duro',
  'duros', 'dura', 'duras', 'quemado', 'quemados', 'quemada', 'quemadas', 'kemado', 'kemados', 'kemada', 'kemadas', 'volumen', 'porcion', 'porciones', 'tardados', 'tardadas', 'incomodo',
  'incómodo', 'incomodos', 'incómodos', 'incomoda', 'incómoda', 'incomodas', 'incómodas', 'peor', 'peores', 'nunca', 'salado', 'salada', 'sal', 'crudo', 'crudos', 'cruda', 'crudas', 'menos',
  'excepto', 'exepto', 'excepcion', 'excepción', 'exepcion', 'exepción', 'pero', 'embargo', 'mejorar', 'mejoraran', 'faltaban', 'poco', 'poca', 'ofrecer', 'no', 'viejo', 'vieja',
  'presion', 'incluir', 'habia', 'mucha', 'limpieza', 'insecto', 'salio', 'diferente', 'deberia', 'debería', 'pero', 'horrible', 'pongan', 'excesiv', 'exesiv', 'excesib', 'exesib',
  'agregar', 'cuidar', 'incomible', 'huele', 'ojala', 'ojalá', 'solo', 'calor', 'recoger', 'basura', 'mas', 'gotea', 'hechado', 'echado', 'perder', 'pequeño', 'pequeña',
  'pequeno', 'pequena', 'pequeñito', 'pequeñita', 'pequenito', 'pequenita', 'olvidan', 'olvidaron', 'olviden', 'van', 'tamaño', 'tamano', 'necesitan', 'ruido', 'demasiado',
  'chiquito', 'molesto', 'molesta', 'rechina', 'fuerte', 'equivoco', 'equivocaron', 'equivoca', 'desagradable', 'sin', 'tardaro', 'insipido', 'insípido', 'tiempo', 'ay', 'fria',
  'frias', 'fría', 'frías', 'abusivo', 'lent0', 'oxidado', 'oxidada', 'caducado', 'caducada', 'ignorar', 'ignoro', 'ignorando', 'ignoraron', 'harto', 'hartan', 'harte', 'sugerencia', 'sugerir',
   'asqueroso', 'asquerosa', 'asquerosos', 'asquerosas', 'grosero', 'grosera', 'groseros', 'groseras', 'groseria', 'grosería', 'groserías', 'groserias','maleducado', 'maleducada',
   'espera', 'esperar', 'esperando', 'ineficiente', 'insuficiente', 'esperamos', 'más', 'tacto',
   'acceso', 'informacion', 'accesar', 'rampa', 'rampas', 'decaido', 'decaído', 'atencion', 'atención', 'bajado', 'puntual', 'puntualidad', 'imputual', 'impuntualidad', 'impuntuales',
   'puntuales', 'tiempos', 'largo', 'largos', 'larga', 'largas');

    $lengthPalabrasAlerta = count($palabrasAlerta); /*size array de palabras*/

    $caracteresEliminar = array(",", ".", "'", "%", "(", ")", "<", ">", "/", "!", "¡", "=", "+", "*", ".", "?", "¿", "_", "-", "|", "\n", "~", "`" );

    /*se pasa a minuscula todo*/
    $comentarios = strtolower($comentarios);

    /*se quitan los caracteres que no sean letra de la cadena de comentarios */
    $comentarios = str_replace($caracteresEliminar ,"", $comentarios);

    /*se convierte el comentario en un array */
    $arrComentario     = explode(' ', $comentarios);
    $sizeArrComentario = count($arrComentario);

    /*la alerta por default esta en falso*/
    $booleanAlerta = false;

    for($i=0;$i<$sizeArrComentario;$i++) /*recorremos el array generado por el comentario*/
    {
        $wordComent = $arrComentario[$i]; /*palabra index del comentario*/

        for($j=0;$j<$lengthPalabrasAlerta;$j++) /* recorremos el array de las palabras de alerta*/
        {
            $wordIndex = $palabrasAlerta[$j]; /* palabra en index palabras de alerta*/

            similar_text($wordComent, $wordIndex, $porcentaje); /* se calcula la similitud entre cadenas coment[i] y palabrasAlert[j]*/

            if($porcentaje >= 95) /*en caso de tener una coincidencia mayor o igual al 95% la alerta es verdadera*/
            {
                $booleanAlerta = true;
            }
        }
    }
    return $booleanAlerta;
}
