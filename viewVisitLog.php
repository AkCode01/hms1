<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");
if(!isset($_GET['vid'])){
    header("location:index.php");
}
$visitor = get_visit_log_byID($_GET['vid']);
// print_r($visitor);
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
$(window).on('load', function () {
    $(".se-pre-con").fadeOut("slow");
    <?php if (isset($_GET['err']) == 1) { ?>
        $('#myModal').modal('show');
    <?php } ?>
});
$(document).ready(function () {
    $("#ItemstTable tr").click(function () {
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
    </div>    
</div>
<div class="container">
<div class="row mb-1">
        <div class="col-md-6">
            <H5>Vist Log Detail</H5>
        </div>
        <div class="col-md-6 text-start text-md-end">
            <a class="btn btn-primary mb-1 btn-sm mb-2" href="patients.php">Patients</a>
            <a class="btn btn-primary mb-1 btn-sm mb-2" href="visit_log.php">Visit Log</a>
        </div>  
    </div>
<div class="row">
<div class="col-12">
    <div class="table-responsive">
<table class="table table-bordered border-secondary bg-light PrintAble">
    <tr> 
        <td>Visit Id</td> <td class="fw-bold"><?php echo $visitor[0]['visit_id'] ?></td> 
        <td>Doctor</td> <td class="fw-bold"><?php echo $visitor[0]['dr_first_name'] . " " . $visitor[0]['dr_last_name'] ?></td> 
    </tr>
    <tr> 
        <td>Patient</td> <td class="fw-bold"><?php echo $visitor[0]['patient_first_name'] . " " . $visitor[0]['patient_last_name'] ?></td>     
        <td>Visit Date</td> <td class="fw-bold"><?php echo $visitor[0]['visit_date']; ?></td>     
    </tr>
    <tr> 
        <td>Symptoms</td> <td class="fw-bold"><?php echo $visitor[0]['visit_symptoms']; ?></td>   
        <td>Diagnosis</td> <td class="fw-bold"><?php echo $visitor[0]['visit_diagnosis']; ?></td>
    </tr>
    <tr> 
        <td>Created By</td> <td class="fw-bold"><?php echo $visitor[0]['visit_created_by']; ?></td>   
        <td>Created Date</td> <td class="fw-bold"><?php echo $visitor[0]['visit_created_date']; ?></td>
    </tr>
    <tr> 
        <td>Modified By</td> <td class="fw-bold"><?php echo $visitor[0]['visit_modified_by']; ?></td>   
        <td>Modified Date</td> <td class="fw-bold"><?php echo $visitor[0]['visit_modified_date']; ?></td>
    </tr>
</table>
<div>
<form action="EditDellVisitLog.php" method="post">
    <input type="hidden" name="VlogID" value="<?php echo $visitor[0]['visit_id'] ?>">
    <input type="button" name="PrintVisitLog" value="Print" class="btn btn-primary btn-sm" onclick="printTable()">
    <input type="submit" name="EditBtn" value="Edit" class="btn btn-primary btn-sm">
    <input type="submit" name="DelBtn" value="Delete" class="btn btn-danger btn-sm">
    
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
                            table { width: 100%; border-collapse: collapse; }
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