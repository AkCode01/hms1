<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

if(isset($_GET['vid']))
{
    $vid = $_GET['vid'];
    $DrAssesments = Get_Dr_assesment_By_Vist($vid);
}
else{
    $DrAssesments = Get_Dr_assesment();
}
// print_r($DrAssesments);
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
        <h2 class="text-center text-white black-text-shadow">Assesment</h2>
    </div>    
</div>
<div class="container">
    <div class="row mb-1">
        <div class="col">
            <H5>Doctor Assesment</H5>
        </div>
        <div class="col text-end">
   <?php 
    if(isset($_GET['vid'])){?>
        <a class="btn btn-primary btn-sm mb-2" href="add_dr_assesment.php?vid=<?php echo $_GET['vid'];?>">Add New</a>
    <?php }else{?>
        
    <?php } ?>
    
    <a class="btn btn-primary btn-sm mb-2" href="visit_log.php">Vist Log</a>
    <a class="btn btn-primary btn-sm mb-2" href="patients.php">Patients</a>
    <button class="btn btn-primary btn-sm mb-2" onclick="printTable()">Print</button>
        </div>  
    </div>
<div class="row">
<div class="col-12">
    <div class="PrintAble table-responsive mb-2">
    <table class="table table-bordered border-secondary bg-light">
<tr>	
<th>Id</th> 
<th>Patient</th> 
<th>Date</th> 
<th>Visit No.</th> 
<th>Complain</th> 
<th>Duration</th> 
<th>Examination</th> 
<th>Med History</th> 
<th>Previous Treatment</th> 
<th>Radiation Location</th> 
<th>Radiation Cycles</th> 
<th>Radiation Start</th> 
<th>Radiation To</th> 
<th>Fractions</th> 
<th>Action</th> 
        </tr>
<?php foreach($DrAssesments as $DrAssesment){ //visit_id ?>
        <tr>
            <td><?php echo $DrAssesment['doctors_assessment_id']?></td> 
            <td><?php echo $DrAssesment['patient_first_name']." ".$DrAssesment['patient_last_name']?></td> 
            <td><?php echo $DrAssesment['doctor_assess_date']?></td> 
            <td><?php echo $DrAssesment['doctor_assess_visit_no_followup']?></td> 
            <td><?php echo $DrAssesment['doctor_assess_active_complain']?></td> 
            <td><?php echo $DrAssesment['doctor_assess_duration']?></td> 
            <td><?php echo $DrAssesment['doctor_assess_examination']?></td> 
            <td><?php echo $DrAssesment['doctor_assess_past_medhistory']?></td> 
            <td><?php echo $DrAssesment['doctor_assess_previous_treatment']?></td> 
            <td><?php echo $DrAssesment['doctor_assess_chemo_radiation_location']?></td> 
            <td><?php echo $DrAssesment['doctor_assess_chemo_radiation_cycles']?></td> 
            <td><?php echo $DrAssesment['doctor_assess_chemo_radiation_date_from']?></td> 
            <td><?php echo $DrAssesment['doctor_assess_chemo_radiation_date_to']?></td> 
            <td><?php echo $DrAssesment['doctor_assess_radiation_fractions']?></td> 
            <td class="text-center"> <a href="viewDoctorAssement.php?did=<?php echo $DrAssesment['doctors_assessment_id'] ?>"><i class="fa fa-eye"></i> </a></td>
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