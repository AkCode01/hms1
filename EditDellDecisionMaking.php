<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

// print_r($_POST);
if (!isset($_POST['DMID'])) {
    header("location:index.php");
}

$dmid = $_POST['DMID'];

if (isset($_POST['EditBtn'])) {
    $submitBtn = "Edit";
} elseif (isset($_POST['DelBtn'])) {
    $submitBtn = "Dell";
}
$DecisionMaking = Get_Decision_Makings_BYID($dmid);
// print_r($DecisionMaking);

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
            <h3 class="text-center text-white black-text-shadow">Decision Making</h3>
        </div>
    </div>
    <div class="container">
        <div class="row mb-1">
            <div class="col-md-6">
                <H5>Update Decision Making</H5>
            </div>
            <div class="col-md-6 text-start text-md-end">
                <a class="btn btn-primary mb-1 btn-sm" href="decision_making.php">View All</a>
            </div>
        </div>
        <div class="row">

            <div class="col-12">

                <?php if ($submitBtn == "Edit") { ?>

                    <form action="SaveUpdatedData.php" method="post">
                        <div class="p-2">
                            <div class="row g-3 align-items-center">
                            <div class="col-md-4">
                                    <label for="patientName" class="form-label">Patient</label>
                                    <input type="text" name="patientName" value="<?php echo $DecisionMaking[0]['patient_first_name']." ".$DecisionMaking[0]['patient_last_name'] ?>" class="form-control form-control-sm" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="dmname" class="form-label">Medication Name</label>
                                    <input type="text" name="dmname" value="<?php echo $DecisionMaking[0]['dm_medication_name'] ?>" class="form-control form-control-sm">
                                </div>

                                <div class="col-md-4">
                                    <label for="dosage" class="form-label">Dosage</label>
                                    <input type="text" name="dosage" value="<?php echo $DecisionMaking[0]['dm_dosage'] ?>" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-4">
                                    <label for="instructions" class="form-label">Instructions</label>
                                    <input type="text" name="instructions" value="<?php echo $DecisionMaking[0]['dm_instructions'] ?>" class="form-control form-control-sm">
                                </div>

                                <div class="col-md-4">
                                    <label for="Status" class="form-label">Status</label>
                                    <select name="Status" class="form-control form-select form-select-sm" required>
                                        <option disabled value="">Select Status</option>
                                        <?php if ($DecisionMaking[0]['dm_status'] == 1) { ?>
                                            <option selected value="1">Active</option>
                                            <option value="0">In-Active</option>
                                        <?php } else { ?>
                                            <option value="1">Active</option>
                                            <option selected value="0">In-Active</option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" name="dmid" value="<?php echo $DecisionMaking[0]['medication_id']; ?>">
                                    <input type="hidden" name="vid" value="<?php echo $DecisionMaking[0]['visit_id']; ?>">
                                    <input type="hidden" name="ModifiedBy" value="<?php echo $_SESSION['logeduser']; ?>">
                                    <input type="hidden" name="ModifiedDate" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                </div>
                            </div>
                            <div class="mt-3">
                                <input type="submit" name="EditDecisionMaking" value="Save Changes" class="btn btn-primary btn-sm">
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