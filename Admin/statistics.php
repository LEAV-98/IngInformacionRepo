<<!---------------- Session starts form here ----------------------->
    <?php
    session_start();
    if (!$_SESSION["LoginAdmin"]) {
        header('location:../login/login.php');
    }
    require_once "../connection/connection.php";
    ?>
    <!---------------- Session Ends form here ------------------------>

    <!-- <?php
            $message = "";
            $account = "";
            if (isset($_POST['submit'])) {
                $account = $_POST['account'];
                $user_id = $_POST['user_id'];
                $que = "update login set account='$account' where user_id = '$user_id'";
                $run = mysqli_query($con, $que);
                if ($run) {
                    $message =  $account == "Activate" ? "Account Activated Successfully" : "Account Deactivated Successfully";
                } else {
                    $message = "Account Not Activated  Successfully";
                }
            }
            ?> -->

    <!doctype html>
    <html lang="es">

    <head>
        <title>FISI - Estadísticas</title>
    </head>

    <body>
        <?php include('../common/common-header.php') ?>
        <?php include('../common/admin-sidebar.php') ?>

        <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
            <div class="sub-main">
                <div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                    <h4>Estadísticas </h4>
                </div>

            </div>
        </main>
    </body>

    </html>