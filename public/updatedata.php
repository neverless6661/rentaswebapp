<?php
header("Location: tables.php");
require_once('connections/conexion.php');

// Create connection

$conn = mysqli_connect($hostname, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id_inmueble = $_POST["id_inmueble"];
$tipo_inmueble = $_POST["tipo_inmueble"];
$name_inmueble = $_POST["name_depa"];
$price_inmueble = $_POST["price_depa"];
$num_predial = $_POST["predial_depa"];
$tipo_servicio_inmueble = $_POST["tipo_servicio_inmueble"];


$name_inquilino = $_POST["name_inq"];
$lastname_inquilino = $_POST["apellidos_inq"];
$tipo_persona_inquilino = $_POST["tipo_persona_inquilino"];
$facturar = $_POST["facturar"];
$dia_pago = $_POST["ultimo_pago"];
$comment_inquilino = $_POST["comment_inquilino"];


$fact_rfc = $_POST["rfc"];
$fact_razon = $_POST["razon_social"];
$fact_email = $_POST["fact_correo"];
$fact_regimen = $_POST["fact_regimen"];
$fact_cfdi = $_POST["fact_cfdi"];
$fact_tipo_pago = $_POST["fact_tipo_pago"];
$fact_direccion = $_POST["fact_direccion"];

echo "ID INMUEBLE: " . $id_inmueble . "<br>";
echo "TIPO INMUEBLE: " . $tipo_inmueble . "<br>";
echo "NOMBRE INMUEBLE: " . $name_inmueble . "<br>";
echo "PRECIO INMUEBLE: " . $price_inmueble . "<br>";
echo "NUMERO PREDIAL: " . $num_predial . "<br>";
echo "TIPO SERVICIO INMUEBLE: " . $tipo_servicio_inmueble . "<br>";
echo "NOMBRE INQUILINO: " . $name_inquilino . "<br>";
echo "APELLIDO INQUILINO: " . $lastname_inquilino . "<br>";
echo "TIPO PERSONA INQUILINO: " . $tipo_persona_inquilino . "<br>";
echo "VA A FACTURAR: " . $facturar . "<br>";
echo "DIA PAGO: " . $dia_pago . "<br>";
echo "COMENTARIOS INQUILINO: " . $comment_inquilino . "<br>";
echo "RFC FACTURACION: " . $fact_rfc . "<br>";
echo "RAZON SOCIAL FACTURACION: " . $fact_razon . "<br>";
echo "CORREO FACTURACION: " . $fact_email . "<br>";
echo "REGIMEN FACTURACION: " . $fact_regimen . "<br>";
echo "CFDI FACTURACION: " . $fact_cfdi . "<br>";
echo "TIPO PAGO FACTURACION: " . $fact_tipo_pago . "<br>";
echo "DIRECCION FACTURACION: " . $fact_direccion . "<br>";

$sqlinmueble = "SELECT * FROM registro_renta WHERE id_inmueble = $id_inmueble";
$resultinmueble = mysqli_query($conn, $sqlinmueble);
if (mysqli_num_rows($resultinmueble) > 0) {
    while ($row_inmueble = mysqli_fetch_assoc($resultinmueble)) {
        if ($row_inmueble["id_inquilino"] == NULL || $row_inmueble["id_inquilino"] == "") {
            $sqlinsertinquilino = "INSERT INTO inquilino (nombres, apellidos, factura_option, comentarios) VALUES ('$name_inquilino', '$lastname_inquilino', 0, '$comment_inquilino')";
            mysqli_query($conn, $sqlinsertinquilino);

            $sqllastinq = "SELECT * FROM inquilino ORDER BY id DESC LIMIT 1";
            $resultlastinq = mysqli_query($conn, $sqllastinq);
            if (mysqli_num_rows($resultlastinq) > 0) {
                while ($row_lastinq = mysqli_fetch_assoc($resultlastinq)) {
                    $idlastinq = $row_lastinq["id"];

                    $sqlupdrentainmueble = "UPDATE registro_renta SET id_inquilino = $idlastinq WHERE id_inmueble = $id_inmueble";
                    mysqli_query($conn, $sqlupdrentainmueble);
                }
            }

        } else {
            $id_inq = $row_inmueble["id_inquilino"];
            $sqlinquilino = "SELECT * FROM inquilino WHERE id = $id_inq";
            $resultinq = mysqli_query($conn, $sqlinquilino);
            if (mysqli_num_rows($resultinq) > 0) {
                while ($row_inq = mysqli_fetch_assoc($resultinq)) {
                    if ($row_inq["nombres"] != $name_inquilino || $row_inq["apellidos"] != $lastname_inquilino) {
                        $sqlinsertinquilino = "INSERT INTO inquilino (nombres, apellidos, factura_option, comentarios) VALUES ('$name_inquilino', '$lastname_inquilino', 0, '$comment_inquilino')";
                        mysqli_query($conn, $sqlinsertinquilino);

                        $sqllastinq = "SELECT * FROM inquilino ORDER BY id DESC LIMIT 1";
                        $resultlastinq = mysqli_query($conn, $sqllastinq);
                        if (mysqli_num_rows($resultlastinq) > 0) {
                            while ($row_lastinq = mysqli_fetch_assoc($resultlastinq)) {
                                $idlastinq = $row_lastinq["id"];

                                $sqlupdrentainmueble = "UPDATE registro_renta SET id_inquilino = $idlastinq WHERE id_inmueble = $id_inmueble";
                                mysqli_query($conn, $sqlupdrentainmueble);
                            }
                        }
                    }
                    else{
                        $sqlupdateinq = "UPDATE inquilino SET factura_option = $facturar, comentarios = '$comment_inquilino' WHERE id = $id_inq";
                        mysqli_query($conn, $sqlupdateinq);
                    }
                }

            }
        }

    }
}






?>
