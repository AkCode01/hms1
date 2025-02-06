<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");
if (!isset($_GET['did'])) {
    header("location:index.php");
}
$DoctorAssesment = Get_Dr_assesment_byID($_GET['did']);
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
    <style>

    </style>
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

        function yesnoFun() {
            var yesno = confirm("Click OK to delete this record");
            return yesno;
        }
    </script>
</head>

<body>
    <div class="se-pre-con"></div>
    <?php include "Header.php"; ?>
    <div class="container-fluid bg-light pt-3 pb-3 mt-0 mb-3 drPage">
        <div class="p-5">
            <h2 class="text-center text-white black-text-shadow">O P D</h2>
            <h3 class="text-center text-white black-text-shadow">Doctor Assesment</h3>
        </div>
    </div>
    <div class="container">
        <div class="row mb-1">
            <div class="col">
                <h5>Doctor Assesment Detail</h5>
            </div>
            <div class="col text-end">
                <a class="btn btn-primary btn-sm mb-2" href="doctors_assesment.php">View All</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">


                <div class="table-responsive">
                    <table align="center" class="PrintAble table table-bordered border-secondary bg-light">

                        <tr>
                            <td>Dr Assessment Id</td>
                            <td><?php echo $DoctorAssesment[0]['doctors_assessment_id']; ?></td>
                            <td>Visit Id</td>
                            <td><?php echo $DoctorAssesment[0]['visit_id']; ?></td>
                        </tr>
                        <tr>
                            <td>Patient</td>
                            <td><?php echo $DoctorAssesment[0]['patient_first_name'] . " " . $DoctorAssesment[0]['patient_last_name']; ?></td>
                        
                            <td>Date</td>
                            <td><?php echo $DoctorAssesment[0]['doctor_assess_date']; ?></td>
                            </tr>
                        <tr>
                            <td>Visit No</td>
                            <td><?php echo $DoctorAssesment[0]['doctor_assess_visit_no_followup']; ?></td>
                        
                            <td>Active Complain</td>
                            <td><?php echo $DoctorAssesment[0]['doctor_assess_active_complain']; ?></td>
                            </tr>
                        <tr>
                            <td>Duration</td>
                            <td><?php echo $DoctorAssesment[0]['doctor_assess_duration']; ?></td>
                        
                            <td>Examination</td>
                            <td><?php echo $DoctorAssesment[0]['doctor_assess_examination']; ?></td>
                            </tr>
                        <tr>
                            <td>Past Medhistory</td>
                            <td><?php echo $DoctorAssesment[0]['doctor_assess_past_medhistory']; ?></td>
                       
                            <td>Previous Treatment</td>
                            <td><?php echo $DoctorAssesment[0]['doctor_assess_previous_treatment']; ?></td>
                            </tr>
                            <tr>
                            <td>Radiation Location</td>
                            <td><?php echo $DoctorAssesment[0]['doctor_assess_chemo_radiation_location']; ?></td>
                        
                            <td>Radiation Cycles</td>
                            <td><?php echo $DoctorAssesment[0]['doctor_assess_chemo_radiation_cycles']; ?></td>
                            </tr>
                        <tr>
                            <td>Radiation Date From</td>
                            <td><?php echo $DoctorAssesment[0]['doctor_assess_chemo_radiation_date_from']; ?></td>
                       
                            <td>Radiation Date To</td>
                            <td><?php echo $DoctorAssesment[0]['doctor_assess_chemo_radiation_date_to']; ?></td>
                            </tr>
                            <tr>
                            <td>Radiation Fractions</td>
                            <td><?php echo $DoctorAssesment[0]['doctor_assess_radiation_fractions']; ?></td>
                       
                            <td>Created_by</td>
                            <td><?php echo $DoctorAssesment[0]['doctor_assess_created_by']; ?></td>
                            </tr>
                            <tr>
                            <td>Created Date</td>
                            <td><?php echo $DoctorAssesment[0]['doctor_assess_created_date']; ?></td>
                            <td>Modified_by</td>
                            <td><?php echo $DoctorAssesment[0]['doctor_assess_modified_by']; ?></td>
                            </tr>
                            <tr>
                            <td>Modified Date</td>
                            <td><?php echo $DoctorAssesment[0]['doctor_assess_modified_date']; ?></td>
                       
                            <td>Status</td>
                            <td><?php echo $DoctorAssesment[0]['doctor_assess_status']; ?></td>
                       
                        </tr>
                    </table>
                    <div>
                        <form action="EditDellDoctorAssement.php" method="post">
                            <input type="hidden" name="DoctorAssesmentID" value="<?php echo $DoctorAssesment[0]['doctors_assessment_id'] ?>">
                            <input type="button" value="Print" class="btn btn-primary btn-sm" onclick="printTable()">
                            <input type="submit" name="EditBtn" value="Edit" class="btn btn-primary btn-sm">
                            <input type="submit" name="DelBtn" value="Delete" onClick="return yesnoFun()" class="btn btn-danger btn-sm">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function printTable() {
            // Get the table element with class 'PrintAble'
            const printableTable = document.querySelector('.PrintAble');

            if (printableTable) {
                // Create a new window
                const printWindow = window.open('', '', 'width=800,height=600');
                // Write the table HTML to the new window
                printWindow.document.write(`
                <html>
                    <head>
                        <title>Print Table</title>
                        <style>
                            body { font-family: Arial, sans-serif; margin: 20px; }
                            table { width: 90%; border-collapse: collapse; }
                            td, th { border: 1px solid #000; padding: 8px; text-align: left; }
                            .fw-bold { font-weight: bold; }
                        </style>
                    </head>
                    <body>
                        ${printableTable.outerHTML}
                    </body>
                </html>
            `);
                // Close the document and trigger the print dialog
                printWindow.document.close();
                printWindow.print();
                // Close the print window after printing
                printWindow.close();
            } else {
                alert('No table found to print.');
            }
        }
    </script>
</body>

</html>