<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");
if(!isset($_GET['did'])){
    header("location:index.php");
}
$doctor = get_doctor_byID($_GET['did']);
// print_r($doctor);
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
function yesnoFun(){
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
        <h2 class="text-center text-white black-text-shadow">D O C T O R</h2>
    </div>    
</div>
<div class="container">
<div class="row mb-1">
        <div class="col">
            <h5>Record Detail</h5>
        </div>
        <div class="col text-end">
            <a class="btn btn-primary btn-sm mb-2" href="doctors.php">View All</a>
        </div>  
</div>
<div class="row">
<div class="col-12">
    
    
    <div class="table-responsive">

<table class="PrintAble table table-bordered border-secondary bg-light">
    <tr> 
        <td>Id</td> <td class="fw-bold"><?php echo $doctor[0]['doctor_id'] ?></td> 
        <td>Name</td> <td class="fw-bold"><?php echo $doctor[0]['dr_first_name'] . " " , $doctor[0]['dr_last_name'] ?></td> 
    </tr>
    <tr> 
        <td>Speciality</td> <td class="fw-bold"><?php echo $doctor[0]['dr_specialty'] ?></td> 
        <td>Contact Number</td> <td class="fw-bold"><?php echo $doctor[0]['dr_contact'] ?></td> 
    </tr>
    <tr> 
        <td>Email</td> <td class="fw-bold"><?php echo $doctor[0]['dr_email'] ?></td> 
        <td>Mailing Address</td> <td class="fw-bold"><?php echo $doctor[0]['dr_address'] ?></td> 
    </tr>
    <tr> 
        <td>Gender</td> <td class="fw-bold"><?php echo $doctor[0]['dr_gender'] ?></td>
        <td>NIC</td> <td class="fw-bold"><?php echo $doctor[0]['dr_nic']; ?></td> 
    </tr>
    <tr> 
        <td>Picture</td><td>
            <?php if($doctor[0]['dr_pic']==""){ ?>
                <img src="images/dr_icon.png" width="34px" height="34px">
            <?php }else{ ?>
                <img src="images/DrPics/<?php echo $doctor[0]['dr_pic'];?>" width="34px" height="34px">
                <?php }  ?>
        </td>
        <td>License Number</td> <td class="fw-bold"><?php echo $doctor[0]['dr_license_num'] ?></td> 
    </tr>
    <tr>
        <td>Credential</td> <td class="fw-bold"><?php echo $doctor[0]['dr_credentials'] ?></td> 
        <td>Experience</td> <td class="fw-bold"><?php echo $doctor[0]['dr_experience'] ?></td> 
    </tr>
    
    <tr> 
        <td>Created By</td> <td class="fw-bold"><?php echo $doctor[0]['dr_created_by'] ?></td>
        <td>Created Date</td> <td class="fw-bold"><?php echo $doctor[0]['dr_created_date'] ?></td> 
    </tr>
    <tr> 
        <td>Modified By</td> <td class="fw-bold"><?php echo $doctor[0]['dr_modified_by'] ?></td>
        <td>Modified Date</td> <td class="fw-bold"><?php echo $doctor[0]['dr_modified_date'] ?></td> 
    </tr>
    <tr> 
        <td>Status</td> <td class="fw-bold"><?php if($doctor[0]['dr_status']==1){echo "Active";}else{echo "In-Active";} ?></td>
        <td></td><td></td>
    </tr>
</table>
<div>
<form action="EditDellDoctor.php" method="post">
    <input type="hidden" name="DocID" value="<?php echo $doctor[0]['doctor_id'] ?>">
    <input type="button" name="PrintVisitLog" value="Print" class="btn btn-primary btn-sm" onclick="printTable()">
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