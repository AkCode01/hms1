<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

// print_r($_POST);
if (!isset($_POST['DoctorAssesmentID'])) {
    header("location:index.php");
}

$daid = $_POST['DoctorAssesmentID'];

if (isset($_POST['EditBtn'])) {
    $submitBtn = "Edit";
} elseif (isset($_POST['DelBtn'])) {
    $submitBtn = "Dell";
}
$DoctorAssesment = Get_Dr_assesment_byID($daid);
// print_r($DoctorAssesment);
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
        $(document).ready(function() {
            $("#ItemstTable tr").click(function() {
                $("#ItemstTable tr").removeClass("bg-warning");
                $(this).addClass("bg-warning");
            });
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
            <div class="col-md-6">
                <H5>Update Doctor Assesment</H5>
            </div>
            <div class="col-md-6 text-start text-md-end">
                <a class="btn btn-primary mb-1 btn-sm" href="doctors_assesment.php">View All</a>
            </div>
        </div>
        <div class="row">

            <div class="col-12">

                <?php if ($submitBtn == "Edit") { ?>

                    <form action="SaveUpdatedData.php" method="post">
                        <div class="p-2">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-4">
                                    <label for="dadate" class="form-label">doctor_assess_date</label>
                                    <input type="date" value="<?php echo $DoctorAssesment[0]['doctor_assess_date'] ?>" class="form-control form-control-sm" name="dadate">
                                </div>

                                <div class="col-md-4">
                                    <label for="followup" class="form-label">doctor_assess_visit_no_followup</label>
                                    <input type="text" value="<?php echo $DoctorAssesment[0]['doctor_assess_visit_no_followup'] ?>" class="form-control form-control-sm" name="followup">
                                </div>

                                <div class="col-md-4">
                                    <label for="complain" class="form-label">doctor_assess_active_complain</label>
                                    <input type="text" value="<?php echo $DoctorAssesment[0]['doctor_assess_active_complain'] ?>" class="form-control form-control-sm" name="complain">
                                </div>
                                <div class="col-md-4">
                                    <label for="duration" class="form-label">doctor_assess_duration</label>
                                    <input type="text" value="<?php echo $DoctorAssesment[0]['doctor_assess_duration'] ?>" class="form-control form-control-sm" name="duration">
                                </div>
                                <div class="col-md-4">
                                    <label for="examination" class="form-label">doctor_assess_examination</label>
                                    <input type="text" value="<?php echo $DoctorAssesment[0]['doctor_assess_examination'] ?>" class="form-control form-control-sm" name="examination">
                                </div>
                                <div class="col-md-4">
                                    <label for="history" class="form-label">doctor_assess_past_medhistory</label>
                                    <input type="text" value="<?php echo $DoctorAssesment[0]['doctor_assess_past_medhistory'] ?>" class="form-control form-control-sm" name="history">
                                </div>
                                <div class="col-md-4">
                                    <label for="treatment" class="form-label">doctor_assess_previous_treatment</label>
                                    <input type="text" value="<?php echo $DoctorAssesment[0]['doctor_assess_previous_treatment'] ?>" class="form-control form-control-sm" name="treatment">
                                </div>

                                <div class="col-md-4">
                                    <label for="location" class="form-label">doctor_assess_chemo_radiation_location</label>
                                    <input type="text" value="<?php echo $DoctorAssesment[0]['doctor_assess_chemo_radiation_location'] ?>" class="form-control form-control-sm" name="location">
                                </div>
                                <div class="col-md-4">
                                    <label for="cycles" class="form-label">doctor_assess_chemo_radiation_cycles</label>
                                    <input type="text" value="<?php echo $DoctorAssesment[0]['doctor_assess_chemo_radiation_cycles'] ?>" class="form-control form-control-sm" name="cycles">
                                </div>
                                <div class="col-md-4">
                                    <label for="dadfrom" class="form-label">doctor_assess_chemo_radiation_date_from</label>
                                    <input type="date" value="<?php echo $DoctorAssesment[0]['doctor_assess_chemo_radiation_date_from'] ?>" class="form-control form-control-sm" name="dadfrom">
                                </div>
                                <div class="col-md-4">
                                    <label for="dadto" class="form-label">doctor_assess_chemo_radiation_date_to</label>
                                    <input type="date" value="<?php echo $DoctorAssesment[0]['doctor_assess_chemo_radiation_date_to'] ?>" class="form-control form-control-sm" name="dadto">
                                </div>
                                <div class="col-md-4">
                                    <label for="fraction" class="form-label">doctor_assess_radiation_fractions</label>
                                    <input type="text" value="<?php echo $DoctorAssesment[0]['doctor_assess_radiation_fractions'] ?>" class="form-control form-control-sm" name="fraction">
                                </div>
                                <div class="col-md-4">
                                    <label for="Status" class="form-label">Status</label>
                                    <select class="form-control form-select form-select-sm" name="Status" required>
                                        <option disabled value="">Select Status</option>
                                        <?php if ($DoctorAssesment[0]['doctor_assess_status'] == 1) { ?>
                                            <option selected value="1">Active</option>
                                            <option value="0">In-Active</option>
                                        <?php } else { ?>
                                            <option value="1">Active</option>
                                            <option selected value="0">In-Active</option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" name="daid" value="<?php echo $DoctorAssesment[0]['doctors_assessment_id']; ?>">
                                    <input type="hidden" name="vid" value="<?php echo $DoctorAssesment[0]['visit_id']; ?>">
                                    <input type="hidden" name="ModifiedBy" value="<?php echo $_SESSION['logeduser']; ?>">
                                    <input type="hidden" name="ModifiedDate" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                </div>
                            </div>
                            <div class="mt-3">
                                <input type="submit" name="EditDoctorAssement" value="Save Changes" class="btn btn-primary btn-sm">
                            </div>
                        </div>
                    </form>

                <?php } else { ?>
                    <div class="alert alert-danger" role="alert">
                        Please change the status of this record to InActive Database Admin will delete the record later!
                        <a href="#" onclick='history.back()'>Back</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>