<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

if(isset($_GET['pid']))
{
    $pid = $_GET['pid'];
    $visitors = get_visit_logs_by_patient($pid);
}
else{
    $pid = 0;
    $visitors = get_visit_logs();
}

// print_r($visitors);
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
        <div class="col">
        <H5 class="mb-1">Visit Log</H5>
        </div>
        <div class="col text-end">
        <a class="btn btn-primary mb-2 btn-sm" href="AddVisitor.php?pid=<?php echo $pid ?>">Create Log</a>
        <a class="btn btn-primary mb-2 btn-sm" href="patients.php">Patients</a>
        <button class="btn btn-primary mb-2 btn-sm" onclick="printTable()">Print</button>
        </div>  
    </div>
<div class="row">
<div class="col-12">  
    <div class="table-responsive mb-2">
    <table class="PrintAble table table-bordered border-secondary bg-light">
        <tr>
            <th>Visit Id</th>            
            <th>Patient</th>
            <th>Doctor</th>
            <th>Date</th>
            <th>Symptoms</th>
            <th>Diagnosis</th>
            <th colspan="3">Assesment</th>
            <th>Action</th>
        </tr>
<?php foreach($visitors as $visitor){ ?>
        <tr>
            <td> <?php echo $visitor['visit_id'] ?> </td>
            <td> <?php echo $visitor['patient_first_name'] ." ".$visitor['patient_last_name'] ?> </td>
            <td> <?php echo $visitor['dr_first_name'] ." ".$visitor['dr_last_name'] ?> </td>
            <td> <?php echo $visitor['visit_date'] ?> </td>
            <td> <?php echo $visitor['visit_symptoms'] ?> </td>
            <td> <?php echo $visitor['visit_diagnosis'] ?> </td>
            <td class="text-center"> <a href="pre_assesment.php?vid=<?php echo $visitor['visit_id'] ?>">Pre</a></td>
            <td class="text-center"> <a href="doctors_assesment.php?vid=<?php echo $visitor['visit_id'] ?>">Doctor</a></td>
            <td class="text-center"> <a href="decision_making.php?vid=<?php echo $visitor['visit_id'] ?>">DM</a></td>
            <td class="text-center"> <a href="viewVisitLog.php?vid=<?php echo $visitor['visit_id'] ?>"><i class="fa fa-eye"></i></a></td>
        </tr>
<?php } ?>
    </table>
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