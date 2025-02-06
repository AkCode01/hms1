<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");
if (!isset($_GET['admid'])) {
    header("location:index.php");
}
$Admission = Get_Admissions_By_ID($_GET['admid']);
// print_r($Admission);
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
            <h2 class="text-center text-white black-text-shadow">I P D</h2>
            <h3 class="text-center text-white black-text-shadow">Admission</h3>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="row mb-1">
                <div class="col">
                    <h5>Admission Detail</h5>
                </div>
                <div class="col text-end">
                    <a class="btn btn-primary btn-sm mb-2" href="admission.php">View All</a>
                </div>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="PrintAble table table-bordered border-secondary bg-light" align="center">



<tr><td>Admission Id</td><td class="fw-bold"><?php echo $Admission[0]['admission_id']; ?></td></tr>
<tr><td>Patient Id</td><td class="fw-bold"><?php echo $Admission[0]['patient_id']; ?></td></tr>
<tr><td>Patient</td><td class="fw-bold"><?php echo $Admission[0]['patient_first_name']." ". $Admission[0]['patient_last_name']; ?></td></tr>

<tr><td>Doctorid 01</td><td class="fw-bold"><?php echo $Admission[0]['doctorid_01']; ?></td></tr>
<tr><td>Doctorid 02</td><td class="fw-bold"><?php echo $Admission[0]['doctorid_02']; ?></td></tr>

<tr><td>Doctorid 03</td><td class="fw-bold"><?php echo $Admission[0]['doctorid_03']; ?></td></tr>


<tr><td>Admission Date</td><td class="fw-bold"><?php echo $Admission[0]['admission_date']; ?></td></tr>
<tr><td>Discharge Date</td><td class="fw-bold"><?php echo $Admission[0]['discharge_date']; ?></td></tr>
<tr><td>Ward</td><td class="fw-bold"><?php echo $Admission[0]['ward']; ?></td></tr>
<tr><td>Room Number</td><td class="fw-bold"><?php echo $Admission[0]['room_number']; ?></td></tr>
<tr><td>Bed Number</td><td class="fw-bold"><?php echo $Admission[0]['bed_number']; ?></td></tr>
<tr><td>Reason</td><td class="fw-bold"><?php echo $Admission[0]['reason']; ?></td></tr>
<tr><td>Created By</td><td class="fw-bold"><?php echo $Admission[0]['adm_created_by']; ?></td></tr>
<tr><td>created Date</td><td class="fw-bold"><?php echo $Admission[0]['adm_created_date']; ?></td></tr>
<tr><td>Modified By</td><td class="fw-bold"><?php echo $Admission[0]['adm_modified_by']; ?></td></tr>
<tr><td>Modified Date</td><td class="fw-bold"><?php echo $Admission[0]['adm_modified_date']; ?></td></tr>
<tr><td>Status</td><td class="fw-bold"><?php echo $Admission[0]['adm_status']; ?></td></tr>                    
                    </table>
                    <div>
                        <form action="EditDellAdmission.php" method="post">
                            <input type="hidden" name="ADMID" value="<?php echo $Admission[0]['admission_id'] ?>">
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