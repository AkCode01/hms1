<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");
if(!isset($_GET['pid'])){
    header("location:index.php");
}
$patient = get_patient_byID($_GET['pid']);
 //print_r($patient);
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
<div class="container-fluid">
<div class="row mb-1">
        <div class="col-md-6">
            <H5>Patient Detail</H5>
        </div>
        <div class="col-md-6 text-start text-md-end">
            <a class="btn btn-primary mb-2 btn-sm" href="patients.php">View All</a>
        </div>  
    </div>
<div class="row">

<div class="col-12">
<div class="table-responsive mb-2">
<table class="PrintAble table table-bordered border-secondary bg-light">
    <tr> <td>Patient Id</td> <td class="fw-bold"><?php echo $patient[0]['patient_id'] ?></td> 
         <td>Hospital</td> <td class="fw-bold"><?php echo $patient[0]['hospital_name'] ?></td> 
    </tr>
    <tr> 
        <td>First Name</td> <td class="fw-bold"><?php echo $patient[0]['patient_first_name']; ?></td> 
        <td>Last Name</td> <td class="fw-bold"><?php echo  $patient[0]['patient_last_name'] ?></td> 
        
    
    </tr>
    <tr>
    <td>Gender</td> <td class="fw-bold"><?php echo $patient[0]['patient_gender'] ?></td>       
    <td>Date Of Birth</td> <td class="fw-bold"><?php echo $patient[0]['patient_dob'] ?></td> 
    </tr>
    <tr>
        <td>Permanent Address</td> <td class="fw-bold"><?php echo $patient[0]['patient_address_permanent'] ?></td> 
        <td>Current Address</td> <td class="fw-bold"><?php echo $patient[0]['patient_address_current'] ?></td> 

    </tr>
    <tr> 
    <td>Contact Number</td> <td class="fw-bold"><?php echo $patient[0]['patient_contact'] ?></td>     
    <td>Marital Status</td> <td class="fw-bold"><?php echo $patient[0]['patient_marital_status'] ?></td>
    </tr>
   <tr>
        <td>Email Address</td> <td class="fw-bold"> <?php echo $patient[0]['patient_email'] ?></td>           
        <td>Private / Corporate</td> <td class="fw-bold"><?php echo $patient[0]['patient_private_corporate'] ?></td>      
    </tr>
    <tr> 
        <td>Emergency Contact</td> <td class="fw-bold"><?php echo $patient[0]['patient_emergency_contact'] ?></td> 
        <td>Emergency Phone</td> <td class="fw-bold"><?php echo $patient[0]['patient_emergency_phone'] ?></td> 
    </tr>
    <tr> 
        <td>Translator Name</td> <td class="fw-bold"><?php echo $patient[0]['patient_translator'] ?></td> 
        <td>Translator Phone</td> <td class="fw-bold"><?php echo $patient[0]['patient_translator_phone'] ?></td> 
    </tr>
    <tr> <td>Nationality</td> <td class="fw-bold"><?php echo $patient[0]['patient_nationality'] ?></td> 
     <td>Allergies</td> <td class="fw-bold"><?php echo $patient[0]['patient_allergies'] ?></td> 
    </tr>
    <tr> <td>Code Blue</td> <td class="fw-bold"><?php 
    if($patient[0]['patient_code_blue']==1){echo "Yes";
    }else{echo "No";} ?></td> 
         <td>Referring Doctor</td> <td class="fw-bold"><?php echo $patient[0]['patient_doctor_ref'] ?></td> 
    </tr>
    <tr> <td>Created By</td> <td class="fw-bold"><?php echo $patient[0]['patient_created_by'] ?></td>
         <td>Created Date</td> <td class="fw-bold"><?php echo $patient[0]['patient_created_date'] ?></td> </tr>
    <tr> <td>Modified By</td> <td class="fw-bold"><?php echo $patient[0]['patient_modified_by'] ?></td> 
     <td>Modified Date</td> <td class="fw-bold"><?php echo $patient[0]['patient_modified_date'] ?></td> </tr>
</table>
</div>
<div>
<form action="EditDellpatient.php" method="post">
    <input type="hidden" name="PtID" value="<?php echo $patient[0]['patient_id'] ?>">
    <input type="button" name="PrintVisitLog" value="Print" class="btn btn-primary btn-sm" onclick="printTable()">
    <input type="submit" name="EditBtn" value="Edit" class="btn btn-primary btn-sm">
    <input type="submit" name="DelBtn" value="Delete" class="btn btn-danger btn-sm">
</form>
    
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