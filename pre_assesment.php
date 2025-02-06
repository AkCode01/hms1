<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");
if(isset($_GET['vid'])){
    $doctors = Get_Pre_assesment_By_Vist($_GET['vid']);
}else{
    $doctors=Get_Pre_assesment();
}
 // print_r($doctors);

?>
<!doctype html>
<html>
<head>
    <title>Hospital Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script>
        $(window).on('load', function() {
            $(".se-pre-con").fadeOut("slow");
            <?php if (isset($_GET['err']) == 1) { ?>
                $('#myModal').modal('show');
            <?php } ?>
        });
    </script>
</head>

<body>
    <div class="se-pre-con"></div>
    <?php include "Header.php"; ?>
    <div class="container-fluid bg-light pt-3 pb-3 mt-0 mb-3 drPage">
        <div class="p-5">
            <h2 class="text-center text-white black-text-shadow">O P D</h2>
            <h3 class="text-center text-white black-text-shadow">Pre Assesment</h3>
        </div>
    </div>
    <div class="container">
        <div class="row mb-1">
            <div class="col">
                <H5>Pre Assesment</H5>
            </div>
            <div class="col text-end">
                <?php
                if(isset($_GET['vid'])){ ?>
                    <a class="btn btn-primary btn-sm mb-2" href="add_pre_assesment.php?vid=<?php echo $_GET['vid']; ?>">Add New</a>
                <?php } ?>
                <a class="btn btn-primary btn-sm mb-2" href="visit_log.php">Vist Log</a>
                <a class="btn btn-primary btn-sm mb-2" href="patients.php">Patients</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive mb-2">
                    <table class="table table-bordered border-secondary bg-light">
                        <tr>
                            <th>Id</th>
                            <th>Patient</th>
                            <th>Date</th>
                            <th>BP Sys</th>
                            <th>BP Dia</th>
                            <th>Pulse</th>
                            <th>Weight Kg</th>
                            <th>Height ft/inch</th>
                            <th>Spo2</th>
                            <th>Temp F</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($doctors as $doctor) {
                            if ($doctor['pre_assess_status'] == 1) {
                                $sts = "Active";
                            } else {
                                $sts = "In-Active";
                            } ?>
                            <tr class="<?php echo $sts; ?>">
                                <td><?php echo $doctor['pre_assessment_id'] ?></td>
                                <td><?php echo $doctor['patient_first_name'] . " " . $doctor['patient_last_name']; ?></td>
                                <td><?php echo $doctor['pre_assess_date'] ?></td>
                                <td><?php echo $doctor['pre_assess_bp_sys'] ?></td>
                                <td><?php echo $doctor['pre_assess_bp_dia'] ?></td>
                                <td><?php echo $doctor['pre_assess_pulse'] ?></td>
                                <td><?php echo $doctor['pre_assess_weight_kg'] ?></td>
                                <td><?php echo $doctor['pre_assess_height_ft_inch'] ?></td>
                                <td><?php echo $doctor['pre_assess_spo2'] ?></td>
                                <td><?php echo $doctor['pre_assess_temp_f'] ?></td>
                                <td class="text-center"> <a href="viewPreAssesment.php?vpaid=<?php echo $doctor['pre_assessment_id'] ?>"><i class="fa fa-eye"></i></a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>