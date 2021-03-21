<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GCarga</title>
    <link rel="icon" href="public/img/template/iconoStma.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" />
    <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
    <link href="public/css/plugins/adminlte.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="public/css/plugins/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/plugins/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="public/css/plugins/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="public/css/plugins/select2.min.css">
    <link rel="stylesheet" href="public/css/plugins/select2-bootstrap4.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="public/js/plugins/jquery.dataTables.min.js"></script>
    <script src="public/js/plugins/dataTables.bootstrap4.min.js"></script>
    <script src="public/js/plugins/dataTables.responsive.min.js"></script>
    <script src="public/js/plugins/responsive.bootstrap.min.js"></script>
    <script src="public/js/plugins/sweetalert2.js"></script>
    <script src="public/js/plugins/adminlte.min.js"></script>
    <script src="public/js/plugins/jquery.overlayScrollbars.min.js"></script>
    <script src="public/js/plugins/select2.full.min.js"></script>
    <script src="public/js/plugins/jquery.inputmask.bundle.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <?php
        include "pages/modules/header.php";
        include "pages/modules/menu.php";
        if (isset($_GET["page"])) {
            if (
                $_GET["page"] == "start" ||
                $_GET["page"] == "warehouse" ||
                $_GET["page"] == "customs-broker"
            ) {
                include "pages/" . $_GET["page"] . ".php";
            } else {
                include "pages/error404.php";
            }
        } else {
            include "pages/start.php";
        }
        include "pages/modules/footer.php";
        ?>
    <!-- </div> -->
    <script src="public/js/main.js"></script>
    <script src="public/js/warehouse.js"></script>
    <script src="public/js/customs-broker.js"></script>
</body>

</html>