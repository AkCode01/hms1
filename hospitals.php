<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");
if(isset($_GET['hsts']))
{
    if($_GET['hsts']=='InActive'){
        $sts = "In-Active";
        $hospitals = Get_InActive_Hospitals();
    }
    else{
        $sts = "Active";
        $hospitals = Get_Hospitals();    
    }
}
else{
    $sts = "Active";
    $hospitals = Get_Hospitals();
}
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
        <h2 class="text-center text-white black-text-shadow">H O S P I T A L S</h2>
    </div>    
</div>
<div class="container">
    <div class="row mb-1">
        <div class="col-md-6">
            <H5>List of Hospital</H5>
        </div>
        <div class="col-md-6 text-start text-md-end">
        <button class="btn btn-primary btn-sm mb-2" onclick="printTable()">Print</button>
        <a class="btn btn-primary btn-sm mb-2" href="AddHospital.php">Add New</a>
        <?php if($sts=="Active"){ ?>
        <a class="btn btn-primary btn-sm mb-2" href="hospitals.php?hsts=InActive">In Active</a>
        <?php }else{ ?>
        <a class="btn btn-primary btn-sm mb-2" href="hospitals.php">Active</a>
        <?php } ?>
        </div>  
    </div>
<div class="row">
<div class="col-12">
    <div class="table-responsive mb-2">
    <table class="PrintAble table table-bordered border-secondary bg-light">
        <tr>
            <th>Hospital ID</th>            
            <th>Code</th>            
            <th>Name</th>            
            
            <th>Address</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach($hospitals as $hospital){  ?>
        <tr class="<?php echo $sts; ?>">
            <td> <?php echo $hospital['hospital_id'];?> </td> 
            <td> <?php echo $hospital['hospital_code'];?> </td>
            <td> <?php echo $hospital['hospital_name'];?> </td>
            <td> <?php echo $hospital['hospital_address']; ?> </td>
            <td> <?php echo $hospital['hospital_contact_number']; ?> </td>
            <td> <?php echo $hospital['hospital_email']; ?> </td>
            <td class="text-center"> <a href="viewHospital.php?hid=<?php echo $hospital['hospital_id'] ?>"><i class="fa fa-eye"></i> </a></td>
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