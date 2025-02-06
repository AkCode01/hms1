<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

if (!isset($_GET['admid']) || $_GET['admid'] == 0) {
    header("location:admission.php");
}
$AdmID = $_GET['admid'];

$Types = Get_Lab_Test_Type();
// $SubTypes = Get_Lab_Test_sub_Type();
$admission = Get_Admissions_By_ID($AdmID);

 // print_r($Types);
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
        });
    </script>
</head>
<body>
    <div class="se-pre-con"></div>
    <?php include "Header.php"; ?>
    <div class="container-fluid bg-light pt-3 pb-3 mt-0 mb-3 drPage">
        <div class="p-5">
            <h2 class="text-center text-white black-text-shadow">I P D</h2>
            <h3 class="text-center text-white black-text-shadow">Add Lab Test</h3>
        </div>
    </div>
    <div class="container">
        <div class="row mb-1">
            <div class="col">
                <h5>Add Lab Test</h5>
            </div>
            <div class="col text-end">
                <a class="btn btn-primary btn-sm mb-2" href="admission.php">Admissions</a>
                <a class="btn btn-primary btn-sm mb-2" href="patients.php">Patients</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="SaveData.php" method="post" enctype="multipart/form-data">
                    <div class="p-2">
                        <div class="row g-3 align-items-center">

                            <div class="col-md-4">
                                <label for="main_category" class="form-label">Test Type</label>
                                <select name="main_category" id="main_category" onchange="fetchSubcategories(this.value)" class="form-control form-select form-select-sm">
                                    <option disabled selected>Select Test</option>
                                    <?php foreach ($Types as $SType) { ?>
                                        <option value="<?php echo $SType['lab_test_type_id'] ?>"><?php echo $SType['lab_test_type_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="sub_category" class="form-label">Test Sub Type</label>
                                <select name="sub_category" id="sub_category" class="form-control form-select form-select-sm">
                                    <option disabled selected>Select Sub Test</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="lab_test_description" class="form-label">Test Description</label>
                                <input type="text" class="form-control form-control-sm" name="lab_test_description" required>
                            </div>
                            <div class="col-md-4">
                                <label for="lab_test_date" class="form-label">Test Date</label>
                                <input type="date" class="form-control form-control-sm" name="lab_test_date" required>
                                <input type="hidden" name="admission_id" value="<?PHP echo $admission[0]['admission_id']; ?>">
                                <input type="hidden" name="patient_id" value="<?PHP echo $admission[0]['patient_id']; ?>">
                                <input type="hidden" name="doctor_id" value="<?PHP echo $admission[0]['doctorid_01']; ?>">
                                <input type="hidden" name="lab_test_status" value="1">
                                <input type="hidden" name="CreatedBy" value="<?php echo $_SESSION['logeduser'] ?>">
                                <input type="hidden" name="CreatedDate" value="<?php echo date('Y-m-d H:i:s'); ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="PatientFLName" class="form-label">Patient</label>
                                <input type="text" class="form-control form-control-sm" name="PatientFLName" value="<?PHP echo $admission[0]['patient_first_name'] . " " . $admission[0]['patient_last_name']; ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="DoctorFLName" class="form-label">Doctor</label>
                                <input type="text" class="form-control form-control-sm" name="DoctorFLName" value="<?PHP echo $admission[0]['dr_first_name'] . " " . $admission[0]['dr_last_name']; ?>" readonly>
                            </div>
                        </div>
                        <div class="mt-3">
                            <input type="submit" name="AddLabTest" value="Save" class="btn btn-primary btn-sm">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script>
        // Function to fetch subcategories using AJAX
        function fetchSubcategories(mainCategoryId) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "fetch_subcategories.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            // Handle the response
            xhr.onload = function() {
                if (this.status === 200) {
                    document.getElementById('sub_category').innerHTML = this.responseText;
                }
            };

            // Send the selected main category ID to fetch_subcategories.php
            xhr.send("main_category_id=" + mainCategoryId);
        }
    </script>
</body>
</html>