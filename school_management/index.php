<?php
require 'shared/helper.php';
require 'config/config.php';
if (!isset($_SESSION['logged_in'])) {
    if (strpos(BASE_URL . $_SERVER['QUERY_STRING'], 'module') !== false) {
        $_SESSION['referrer'] = BASE_URL . $_SERVER['QUERY_STRING'];
    }
    header("Location: sign_in.php");
    exit();
}
require 'modules/classes/DB.php';
require 'common_templates/head.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Preloader -->
    <!--    <div class="preloader flex-column justify-content-center align-items-center">-->
    <!--        <img class="animation__shake" src="-->
    <? //= ADMIN_ASSETS_DIR ?><!--/img/AdminLTELogo.png" alt="AdminLTELogo"-->
    <!--             height="60"-->
    <!--             width="60">-->
    <!--    </div>-->
    <?php include 'common_templates/header.php'; ?>
    <?php include 'common_templates/left_sidebar.php'; ?>

    <?php
    // content
    $module = filter_input(INPUT_GET, 'module');
    if ($module) {
        $action = filter_input(INPUT_GET, 'action');
        $module = ucwords($module);
        $moduleClassPath = sprintf("modules/classes/%s.php", $module);
        $viewPath = sprintf("views/%s/%s.php", $module, $action);
        require $moduleClassPath;
        require $viewPath;
    }
    ?>

    <?php include 'common_templates/footer.php'; ?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>

<script src="<?php echo ADMIN_URL ?>assets/plugins/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo ADMIN_URL ?>assets/plugins/js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo ADMIN_URL ?>assets/plugins/js/bootstrap.bundle.min.js"></script>

<script src="<?php echo ADMIN_URL ?>assets/plugins/js/select2.full.min.js"></script>
<!-- ChartJS -->
<!--<script src="--><?php //echo ADMIN_URL ?><!--assets/plugins/js/Chart.min.js"></script>-->
<!-- Sparkline -->
<script src="<?php echo ADMIN_URL ?>assets/plugins/js/sparkline.js"></script>
<!-- JQVMap -->
<!--<script src="--><?php //echo ADMIN_URL ?><!--assets/plugins/js/jquery.vmap.min.js"></script>-->
<!--<script src="--><?php //echo ADMIN_URL ?><!--assets/plugins/js/jquery.vmap.usa.js"></script>-->
<!-- jQuery Knob Chart -->
<!--<script src="--><?php //echo ADMIN_URL ?><!--assets/plugins/js/jquery.knob.min.js"></script>-->
<!-- daterangepicker -->
<script src="<?php echo ADMIN_URL ?>assets/plugins/js/moment.min.js"></script>
<script src="<?php echo ADMIN_URL ?>assets/plugins/js/jquery.inputmask.min.js"></script>
<script src="<?php echo ADMIN_URL ?>assets/plugins/js/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo ADMIN_URL ?>assets/plugins/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo ADMIN_URL ?>assets/plugins/js/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo ADMIN_URL ?>assets/plugins/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo ADMIN_URL ?>assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo ADMIN_URL ?>assets/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="--><?php //echo ADMIN_URL ?><!--assets/js/dashboard.js"></script>-->

<script src="<?php echo ADMIN_URL ?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo ADMIN_URL ?>assets/js/additional-methods.min.js"></script>
<script src="<?php echo ADMIN_URL ?>assets/js/toastr.min.js"></script>


<script src="<?php echo ADMIN_URL ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo ADMIN_URL ?>assets/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo ADMIN_URL ?>assets/js/dataTables.responsive.min.js"></script>
<script src="<?php echo ADMIN_URL ?>assets/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo ADMIN_URL ?>assets/js/dataTables.buttons.min.js"></script>
<script src="<?php echo ADMIN_URL ?>assets/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo ADMIN_URL ?>assets/js/custom_script.js"></script>
<script src="<?php echo ADMIN_URL ?>assets/js/index.js"></script>

<script>
    $(function () {
        $('.select2').select2();

        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

        $('[data-mask]').inputmask();
    });
</script>
</body>
