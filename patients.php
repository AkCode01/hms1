<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");
if(isset($_GET['psts']))
{
    if($_GET['psts']=='InActive'){
        $sts = "In-Active";
        $patients = get_IN_Active_Patients();
    }else{
        $sts = "Active";
        $patients = get_Patients();    
    }
}
else{
    $sts = "Active";
    $patients = get_Patients();
}
//print_r($patients);
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
        <h2 class="text-center text-white black-text-shadow">P A T I E N T</h2>
    </div>    
</div>
<div class="container">
    <div class="row mb-1">
        <div class="col-md-6">
            <H5>Patients List</H5>
        </div>
        <div class="col-md-6 text-start text-md-end">
            
<button class="btn btn-primary btn-sm mb-2" onclick="printTable()">Print</button>
            <a class="btn btn-primary mb-2 btn-sm" href="AddPatient.php">Add New</a>
            <?php if($sts == "Active"){ ?>
                <a class="btn btn-primary mb-2 btn-sm" href="patients.php?psts=InActive">In Active</a>
            <?php }else{ ?>
                <a class="btn btn-primary mb-2 btn-sm" href="patients.php?psts=Active">Active</a>
            <?php } ?>
        </div>  
    </div>


<div class="row">
<div class="col-12">
    
    <div class="table-responsive">
    <table class="PrintAble table table-bordered border-secondary bg-light">
        <tr>
            <th>Patient Id</th>            
            <th>Hospital</th>            
            <th>Name</th>            
            <th>Referring Doctor</th>
            <th>Current Address</th>
            <th>Contact</th>
            <th>Emergency Phone</th>
            <th>Translator Phone</th>          	
            <th colspan="3">Action</th>           	
        </tr>
<?php foreach($patients as $patient){ ?>
    <?php if($patient['patient_status'] == 1){ $sts = "Active";}else{$sts = "In-Active";} ?>
        <tr class="<?php echo $sts; ?>">
            <td> <?php echo $patient['patient_id'] ?> </td>
            <td> <?php echo $patient['hospital_name'] ?> </td>
            <td> <?php echo $patient['patient_first_name'] . " " . $patient['patient_last_name'] ?> </td>
            <td> <?php echo $patient['patient_doctor_ref'] ?> </td>
            <td> <?php echo $patient['patient_address_current'] ?> </td>
            <td> <?php echo $patient['patient_contact'] ?> </td>
            
            <td title="<?php echo $patient['patient_emergency_contact'] ?>"> <?php echo $patient['patient_emergency_phone'] ?> </td>
            <td title="<?php echo $patient['patient_translator'] ?>"> <?php echo $patient['patient_translator_phone'] ?> </td>
            
            <td class="text-center"> <a href="visit_log.php?pid=<?php echo $patient['patient_id'] ?>">Visit</a></td>
<?php $IsAdmit =  Is_Patient_Admit($patient['patient_id']);
if($IsAdmit){?>
    <td class="text-center"> <a href="admission.php?pid=<?php echo $patient['patient_id'];?>">Admited</a></td>
<?php } else{?>
    <td class="text-center"> <a href="AddAdmission.php?pid=<?php echo $patient['patient_id'];?>">Admit</a></td>
<?php } ?>
      
            
            <td class="text-center"> <a href="viewPatient.php?pid=<?php echo $patient['patient_id'] ?>"><i class="fa fa-eye"></i> </a></td>
            
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