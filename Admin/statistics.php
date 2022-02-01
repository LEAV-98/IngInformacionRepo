<!---------------- Session starts form here ----------------------->
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
    <link rel="shortcut icon" href="../Images/logo-unmsm.png" type="image/x-icon">
</head>

<body>
    <?php include('../common/common-header.php') ?>
    <?php include('../common/admin-sidebar.php') ?>

    <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
        <div class="sub-main">
            <div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                <h4>Estadísticas </h4>
            </div>

            ?>


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
                        <div class="col-sm-6">
                            <canvas id="myChart"></canvas>
                        </div>

                    </div>
                </main>
                <!-- Integración -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <!-- Configuración -->
                <script>
                    const labels = [
                        'Ingeniería de Sistemas',
                        'Ingeniería de Software',
                    ];

                    const data = {
                        labels: labels,
                        datasets: [{
                            label: 'My First dataset',
                            backgroundColor: 'rgb(255, 99, 132)',
                            borderColor: 'rgb(255, 99, 132)',

                            data: [<?php
                                    echo $arrayDatos[0];
                                    ?>, <?php
                                        echo $arrayDatos[1];
                                        ?>],

                        }]
                    };

                    const config = {
                        type: 'line',
                        data: data,
                        options: {}
                    };
                </script>
                <!-- Inserción -->
                <script>
                    const myChart = new Chart(
                        document.getElementById('myChart'),
                        config
                    );
                </script>

            </body>

            </html>