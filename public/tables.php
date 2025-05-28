<?php
require_once('connections/conexion.php');

$id_lote = 0;

// Create connection
$conn = mysqli_connect($hostname,$username,$password,$database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql_lote = "SELECT * FROM asignacion_lotes WHERE id_usuario = 1";
$result_lote = mysqli_query($conn, $sql_lote);

if (mysqli_num_rows($result_lote) > 0) {
    while ($row_lote = mysqli_fetch_assoc($result_lote)) {
        $id_lote = $row_lote["id"];
        // echo "ID Lote " . $id_lote;
    }
} else {
    // echo "0 results";
}

$sql_inmuebles = "SELECT * FROM asignacion_inmueble WHERE id_inmueble = " . $id_lote;
$result_inmueble = mysqli_query($conn, $sql_inmuebles);
if (mysqli_num_rows($result_inmueble) > 0) {
    while ($row_inmueble = mysqli_fetch_assoc($result_inmueble)) {
    }
} else {
    // echo "0 results";
}



?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestor de Rentas - Rentas</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!--
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
</head>
<style>
    a:link {
        color: #858796;
        background-color: transparent;
        text-decoration: none;
    }

    a:visited {
        color: #858796;
        background-color: transparent;
        text-decoration: none;
    }

    a:hover {
        color: #858796;
        background-color: transparent;
        text-decoration: none;
    }

    a:active {
        color: #858796;
        background-color: transparent;
        text-decoration: none;
    }

    a.colorfied {
        color: white;
    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Gestor de Rentas</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!--
            <div class="sidebar-heading">
                Interface
            </div>
            -->

            <!-- Nav Item - Pages Collapse Menu -->
            <!--
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>
            -->

            <!-- Nav Item - Utilities Collapse Menu -->
            <!--
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>
             -->

            <!-- Divider -->
            <!--
            <hr class="sidebar-divider">
            -->

            <!-- Heading -->
            <!--
            <div class="sidebar-heading">
                Addons
            </div>
             -->

            <!-- Nav Item - Pages Collapse Menu -->
            <!--
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>
             -->

            <!-- Nav Item - Charts -->
            <!--
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>
             -->

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Rentas</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">Agosto 8, 2024</div>
                                        <span class="font-weight-bold">Hay una factura que generar</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">Agosto 7, 2024</div>
                                        Una renta esta por vencer!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">Agosto 2, 2024</div>
                                        Información faltante en renta.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar Alertas</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <!--
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                        <!--
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            -->

                        <!-- Dropdown - Messages -->
                        <!--
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>
                        -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrador</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configuración
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Actividad
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Rentas 1</h1>
                    <p class="mb-4">Contenido de rentas.</p>

                    <!--  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->



                    <!---------------------------- START MODAL ADD LOCAL--------------------------------------------------->
                    <div id="AddModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header" align-items-center>

                                    <h4 class="modal-title">Agregar local</h4>
                                </div>
                                <!----------------- TABS --------------------->



                                <div class="row">
                                    <div class="col-md-12 purplebg m">



                                        <!-- Tab panes -->


                                        <div class="modal-body">
                                            <form action="addlocal.php" method="POST">
                                                <!--
                                                <div class="btn-group">
                                                    <button name="type_local" type="button"
                                                        class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Departamento
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" name="type_local"
                                                            href="#">Departamento</a>
                                                        <a class="dropdown-item" name="type_local" href="#">Local</a>
                                                    </div>
                                                </div> -->
                                                <br>

                                                <label for="select_1">Tipo:</label>
                                                <select class="form-control" id="type_local" name="type_local">
                                                    <option value="1">Departamento</option>
                                                    <option value="2">Local</option>
                                                </select>


                                                <br>
                                                <input type="text" name="nombre_local" placeholder="Nombre"
                                                    class="form-control" value="" />
                                                <br>
                                                <input type="text" name="renta_local" placeholder="Renta ($)"
                                                    class="form-control" value="" />
                                                <br>
                                                <input type="text" name="dia_pago" placeholder="Día de pago"
                                                    class="form-control" value="" />
                                                <br>

                                                <input name="mySubmit" style="float: right;" class="btn btn-primary"
                                                    type="submit" value="Agregar" />
                                            </form>
                                            <br><br>

                                        </div>

                                    </div>
                                </div>

                                <!----------------------------- END MODAL BODY ------------------------>

                            </div>

                        </div>
                    </div>
                    <!------------------------------END MODAL ADD LOCAL----------------------------------------------------

                     <!---------------------------- START MODAL ADD PAYMENT--------------------------------------------------->
                    <div id="AddPaymentModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header" align-items-center>

                                    <h4 class="modal-title">Agregar local</h4>
                                </div>
                                <!----------------- TABS --------------------->



                                <div class="row">
                                    <div class="col-md-12 purplebg m">



                                        <!-- Tab panes -->


                                        <div class="modal-body">
                                            <form action="addpayment.php" method="POST">
                                                <br>

                                                <label for="select_1">Tipo:</label>
                                                <select class="form-control" id="type_local" name="type_payment">
                                                    <option value="1">Efectivo</option>
                                                    <option value="2">Transferencia</option>
                                                    <option value="3">Depósito</option>
                                                    <option value="4">Cheque</option>
                                                </select>


                                                <br>
                                                <input type="text" name="nombre_local" placeholder="Cantidad ($)"
                                                    class="form-control" value="" />
                                                <br>
                                                <input name="mySubmit" style="float: right;" class="btn btn-primary"
                                                    type="submit" value="Agregar" />
                                            </form>
                                            <br><br>

                                        </div>

                                    </div>
                                </div>

                                <!----------------------------- END MODAL PAYMENT BODY ------------------------>

                            </div>

                        </div>
                    </div>
                    <!------------------------------END MODAL ADD PAYMENT---------------------------------------------------->

                    <div class="modal fade" id="takeaction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Display Apply Id in modal box in a dynamic
                                        way? </h4>
                                </div>
                                <div class="form-inline container hidden-xs hidden-sm">
                                    <input type="number" value="<?php echo $apply ?>" class="form-group"
                                        placeholder="Job Code">
                                    <br>
                                    <?php
                                    $apply2 = "Mensaje";
                                    ?>
                                    <input type="text" value="<?php echo $apply2 ?>" class="form-group"
                                        placeholder="Job Code">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default"
                                        data-dismiss="modal"><span>Confirm</span></button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Rentas</h6>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">+
                                Agregar</button>
                            <!-- <a href="#" data-toggle="modal" data-target="#takeaction" class="btn btn-default"></a> -->

                        </div>

                        <div class="card-body">



                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>
                                            <th>Tipo</th>
                                            <th>Local</th>
                                            <th>Renta</th>
                                            <th>Día pago</th>
                                            <th>FDP</th>
                                            <th>Factura</th>
                                            <th>Incremento</th>
                                            <th>Deuda</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tipo</th>
                                            <th>Local</th>
                                            <th>Renta</th>
                                            <th>Día pago</th>
                                            <th>FDP</th>
                                            <th>Factura</th>
                                            <th>Incremento</th>
                                            <th>Deuda</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <tr>
                                            <td>Departamento</td>
                                            <td class="colorfy">
                                                <a href="#" data-toggle="modal" data-target="#myModal"
                                                    data-name="ALEJANDRAS DEPA CASA, 2 Cuartos" data-price="8000"
                                                    class="colorfied">
                                                    ALEJANDRAS DEPA CASA, 2 Cuartos
                                                </a>
                                            </td>
                                            <td>$8000</td>
                                            <td>N/A</td>
                                            <td>N/A</td>
                                            <td>N/A</td>
                                            <td>N/A</td>
                                            <td>N/A</td>
                                        </tr>


                                        <?php

                                        $sql_renta = "SELECT asignacion_inmueble.id_lote AS id_lote, asignacion_inmueble.id_inmueble as id_inmueble, inmueble.nombre as name_inmueble,
inmueble.id_tipo as id_tipo, inmueble.dia_pago as dia_pago, inmueble.id_imagen as id_imagen, inmueble.precio_renta as precio_renta, tipo_inmueble.nombre as tipo_inmueble FROM asignacion_inmueble JOIN inmueble ON asignacion_inmueble.id_inmueble = inmueble.id JOIN tipo_inmueble ON inmueble.id_tipo = tipo_inmueble.id WHERE id_lote=" . $id_lote;
                                        $result_renta = mysqli_query($conn, $sql_renta);

                                        if (mysqli_num_rows($result_renta) > 0) {
                                            while ($row_renta = mysqli_fetch_assoc($result_renta)) {
                                                echo "<tr>";


                                                $tipo_depa = $row_renta["tipo_inmueble"];
                                                $name_depa = $row_renta["name_inmueble"];
                                                $price_depa = $row_renta["precio_renta"];
                                                $diapago_depa = $row_renta["dia_pago"];
                                                $fecha_pago = "";
                                                $factura_option = "";
                                                $incremento = "";
                                                $deuda = "";

                                                $predial = "";

                                                $names_inq = "";
                                                $apellidos_inq = "";

                                                $ultimo_pago = "";

                                                $address = "";

                                                $id_inquilino = "";

                                                $fact_rfc = "";
                                                $fact_razon = "";
                                                $fact_correo = "";
                                                $fact_regimen = "";
                                                $fact_cfdi = "";
                                                $fact_pago = "";


                                                $fact_direccion = "";

                                                $id_inmueble = $row_renta["id_inmueble"];


                                                $sql_pago = "SELECT * FROM registro_pagos WHERE id_inmueble =" . $id_inmueble;
                                                $result_pago = mysqli_query($conn, $sql_pago);
                                                if (mysqli_num_rows($result_pago) > 0) {
                                                    while ($row_pago = mysqli_fetch_assoc($result_pago)) {
                                                        // echo "<td>" . $row_pago["fecha_pago"] . "</td>";
                                                        $fecha_pago = $row_pago["fecha_pago"];
                                                        $ultimo_pago = $row_pago["fecha_ult_pago"];
                                                        if ($row_pago["id_inquilino"] != NULL || $row_pago["id_inquilino"] != "") {
                                                            $sql_inquilino = "SELECT * FROM inquilino WHERE id = " . $row_pago["id_inquilino"];
                                                            $result_inquilino = mysqli_query($conn, $sql_inquilino);
                                                            if (mysqli_num_rows($result_inquilino) > 0) {
                                                                while ($row_inquilino = mysqli_fetch_assoc($result_inquilino)) {
                                                                    $names_inq = $row_inquilino["nombres"];
                                                                    $apellidos_inq = $row_inquilino["apellidos"];
                                                                    if ($row_inquilino["factura_option"] == 1) {
                                                                        $factura_option = "Si";

                                                                        $id_inquilino = $row_inquilino["id"];

                                                                        $sql_facturacion = "SELECT * FROM facturacion WHERE id_inquilino =" . $id_inquilino;
                                                                        $result_facturacion = mysqli_query($conn, $sql_facturacion);
                                                                        if (mysqli_num_rows($result_facturacion) > 0) {
                                                                            while ($row_facturacion = mysqli_fetch_assoc($result_facturacion)) {



                                                                            }
                                                                        }


                                                                        // echo "<td>Si</td>";
                                                                    } else {
                                                                        $factura_option = "No";
                                                                        // echo "<td>No</td>";
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    $factura_option = "N/A";
                                                    $fecha_pago = "N/A";
                                                    //echo "<td>N/A</td>";
                                                    //echo "<td>N/A</td>";
                                                }


                                                $sql_regrenta = "SELECT * FROM registro_renta WHERE id_inmueble = " . $id_inmueble;
                                                $result_regrenta = mysqli_query($conn, $sql_regrenta);
                                                $deuda = "";
                                                if (mysqli_num_rows($result_regrenta) > 0) {
                                                    while ($row_regrenta = mysqli_fetch_assoc($result_regrenta)) {
                                                        // echo "<td>" . $row_regrenta["incremento_pago"] . "</td>";
                                                        $incremento = $row_regrenta["incremento_pago"];
                                                        $renta = $row_regrenta["precio_renta"];
                                                        $pago = $row_regrenta["cantidad_pago"];
                                                        $deuda = $row_regrenta["deuda_pago"];
                                                        $predial = $row_regrenta["num_predial"];



                                                        //echo "<td> $" . $deuda . "</td>";
                                                    }
                                                } else {
                                                    $deuda = "N/A";
                                                    $incremento = "N/A";
                                                    // echo "<td>AN/</td>";
                                                    // echo "<td>N/A</td>";
                                                }

                                                echo "<td>" . $tipo_depa . "</td>";

                                                echo '<td>
                                                <a href="#" data-toggle="modal" data-target="#myModal" data-name="' . $name_depa . '" data-price="' . $price_depa . '" data-diapago = "' . $diapago_depa . '" data-predial="' . $predial . '"    data-nameinq="' . $names_inq . '" data-apellinq="' . $apellidos_inq . '" data-diapago="' . $dia_pago . '" data-ultimopago="' . $ultimo_pago . '" class="btn btn-default">
                                                ' . $name_depa . '
                                                </a>
                                                </td>';

                                                echo "<td> $" . $price_depa . "</td>";

                                                echo "<td>" . $diapago_depa . "</td>";

                                                echo "<td>" . $fecha_pago . "</td>";
                                                echo "<td>" . $factura_option . "</td>";

                                                echo "<td>" . $incremento . "</td>";
                                                echo "<td>" . $deuda . "</td>";



                                                echo "</tr>";
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Powered by Cbapps &copy; 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Listo para irte?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleciona "Cerrar sesión" para cerrar tu sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-----Comentarios test---->


    <!---------------------- Modal ----------------->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" align-items-center>
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <h4 class="modal-title">Información de la propiedad</h4>
                    <!--
                                    <input name="mySubmit" style="float: right;" class="btn btn-primary"
                                                    type="submit" value="Agregar pago" /> -->

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddPaymentModal"
                        data-dismiss="modal">Agregar pago</button>
                </div>
                <!----------------- TABS --------------------->


                <div class="row">
                    <div class="col-md-12 purplebg m">
                        <div class="tabbable">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="nav-item active"><a class="nav-link active" href="#home"
                                        aria-controls="home" role="tab" data-toggle="tab">Departamento</a>
                                </li>
                                <li role="presentation"><a class="nav-link" href="#profile" aria-controls="profile"
                                        role="tab" data-toggle="tab">Inquilino</a>
                                </li>
                                <li role="presentation"><a class="nav-link" href="#messages" aria-controls="messages"
                                        role="tab" data-toggle="tab">Facturación</a>
                                </li>
                                <li role="presentation"><a class="nav-link" href="#settings" aria-controls="settings"
                                        role="tab" data-toggle="tab">Historial</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="modal-body">

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Departamento
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Departamento</a>
                                                <a class="dropdown-item" href="#">Local</a>
                                            </div>
                                        </div>
                                        <br><br>
                                        <input type="text" id="name_depa" placeholder="Nombre"
                                            class="form-control" /></input>
                                        <br>
                                        <input type="text" id="price_depa" placeholder="Renta" class="form-control" />
                                        <br>
                                        <input type="text" id="predial_depa" placeholder="No. predial"
                                            class="form-control" /> <br>
                                        <input type="text" placeholder=".png .jpeg" class="form-control" value="" />
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cargar
                                            imagen</button><br><br>
                                        <input type="text" placeholder="contrato en formato pdf" class="form-control"
                                            value="" />
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cargar
                                            PDF</button>
                                        <br><br>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Servicios</label>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Agua
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckChecked" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Luz
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault" checked>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Internet
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Gas
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>



                                <div role="tabpanel" class="tab-pane" id="profile">
                                    <div class="modal-body">


                                        <input type="text" id="name_inq" placeholder="Nombre" class="form-control" />
                                        <br>
                                        <input type="text" id="apellidos_inq" placeholder="Apellidos"
                                            class="form-control" />
                                        <br>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Persona Física
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Persona Física</a>
                                                <a class="dropdown-item" href="#">Persona Moral</a>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Facturación</label>
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Día de pago</label>
                                            <input type="text" id="dia_pago" placeholder="Día" class="form-control" />
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Último pago</label>
                                            <input type="text" id="ultimo_pago" placeholder="Fecha"
                                                class="form-control" />
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Comentarios</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1"
                                                rows="2"></textarea>
                                        </div>

                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="messages">

                                    <div class="modal-body">


                                        <input type="text" id="rfc" placeholder="RFC" class="form-control" />
                                        <br>
                                        <input type="text" id="razon_social" placeholder="Razón Social"
                                            class="form-control" />
                                        <br>
                                        <input type="text" id="fact_correo" placeholder="Correo electrónico"
                                            class="form-control" />
                                        <br>
                                        <label for="exampleFormControlTextarea1">Régimen
                                            Físcal</label><br>
                                        <div class="btn-group">

                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                601
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">601</a>
                                                <a class="dropdown-item" href="#">603</a>
                                            </div>
                                        </div>

                                        <br><br>

                                        <label for="exampleFormControlTextarea1">CFDI</label><br>
                                        <div class="btn-group">

                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                G01
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">G01</a>
                                                <a class="dropdown-item" href="#">G02</a>
                                            </div>
                                        </div>


                                        <br><br>

                                        <label for="exampleFormControlTextarea1">Tipo de pago</label><br>
                                        <div class="btn-group">

                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Efectivo
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Efectivo</a>
                                                <a class="dropdown-item" href="#">Transferencia</a>
                                                <a class="dropdown-item" href="#">Depósito</a>
                                                <a class="dropdown-item" href="#">Cheque</a>
                                            </div>
                                        </div>

                                        <br><br>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Dirección</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1"
                                                rows="2"></textarea>
                                        </div>

                                    </div>

                                </div>
                                <div role="tabpanel" class="tab-pane" id="settings">
                                    <div class="modal-body">

                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                            <thead>
                                                <tr>
                                                    <th>Día</th>
                                                    <th>Cantidad</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                            </tbody>
                                        </table>


                                        <label for="exampleFormControlTextarea1">No hay
                                            registros</label><br>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!---------------------- END TAB ------------------>

                <!----------------------------- MODAL BODY ------------------------------->

                <!----------------------------- END MODAL BODY ------------------------>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Guardar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
                </div>
            </div>

        </div>
    </div>

    <!--------------------------------------------- END Modal ----------------------------------------->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!--
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.0.3/angular.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script> -->

    <!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />  -->

    <script type="text/javascript">
        $('#takeaction').on('show.bs.modal', function (e) {
            var apply = $(e.relatedTarget).data('apply');
            $(e.currentTarget).find('input[name="apply"]').val(apply);
            var apply2 = $(e.relatedTarget).data('apply');
            $(e.currentTarget).find('input[name="apply2"]').val(apply2);
        });
    </script>

    <script type="text/javascript">
        /*
$('#myModal').on('show.bs.modal', function(e) {
var name_depa = $(e.relatedTarget).data('name_depa');
$(e.currentTarget).find('input[name="name_depa"]').val(name_depa);
});
*/
    </script>


    <script type="text/javascript">
        $(document).ready(function () {

            var table = $('#dataTable').DataTable();

            $('#myModal').on('show.bs.modal', function (e) {
                var name_depa = $(e.relatedTarget).attr('data-name');
                $(e.currentTarget).find('input[id="name_depa"]').val(name_depa);
                var price_depa = $(e.relatedTarget).attr('data-price');
                $(e.currentTarget).find('input[id="price_depa"]').val(price_depa);
                var predial_depa = $(e.relatedTarget).attr('data-predial');
                $(e.currentTarget).find('input[id="predial_depa"]').val(predial_depa);

                var name_inq = $(e.relatedTarget).attr('data-nameinq');
                $(e.currentTarget).find('input[id="name_inq"]').val(name_inq);

                var apellidos_inq = $(e.relatedTarget).attr('data-apellinq');
                $(e.currentTarget).find('input[id="apellidos_inq"]').val(apellidos_inq);

                var dia_pago = $(e.relatedTarget).attr('data-diapago');
                $(e.currentTarget).find('input[id="dia_pago"]').val(dia_pago);

                var ultimo_pago = $(e.relatedTarget).attr('data-ultimopago');
                $(e.currentTarget).find('input[id="ultimo_pago"]').val(ultimo_pago);
            });

        });
    </script>


</body>

</html>
