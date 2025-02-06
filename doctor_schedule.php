<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

$drLists = Get_Active_Doctors();
if(isset($_POST['DrSearchBtn']))
{
    $did = $_POST['SearchDrId'];
    $doctors = Get_Active_Doctors_Schedule_By_Doctor($did);
}else if(isset($_POST['DaySearchBtn'])){
    $day = $_POST['DrDay'];
    $doctors = Get_Active_Doctors_Schedule_By_Day($day);
}elseif(isset($_GET['did'])){
    $Drid = $_GET['did'];
    $doctors = Get_Active_Doctors_Schedule_By_Doctor($Drid);
    if(empty($doctors)){header("location:add_schedule.php?DID=$Drid");}
}else{
    $doctors = Get_Active_Doctors_Schedule();
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
</script>
</head>

<body>
<div class="se-pre-con"></div>
<?php include "Header.php"; ?>
<div class="container-fluid bg-light pt-3 pb-3 mt-0 mb-3 drPage">
    <div class="p-5">
        <h2 class="text-center text-white black-text-shadow">DOCTORS</h2>
        <h3 class="text-center text-white black-text-shadow">Doctor Schedule</h3>
    </div>    
</div>
<div class="container">
    <div class="row mb-1">        
        <h5>Doctors Schedule</h5>
    </div>
<div class="row mb-2">
    <div class="col-md-4">
        <form method="post">
        <div class="row mb-2 g-1">
        <div class="col-auto">
            <label for="SearchDrId" class="form-label mb-0">Filter by Doctor:</label>
        </div>
        <div class="col-auto">
            <select class="form-control form-select form-select-sm" id="SearchDrId" name="SearchDrId" required>
                <option value="" selected disabled>Select Doctor</option>
                <?php foreach($drLists as $dr){ ?>
                <option value="<?php echo $dr['doctor_id']; ?>"><?php echo $dr['dr_first_name']." ".  $dr['dr_last_name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-auto">
            <input type="submit" value="Search" name="DrSearchBtn" class="btn btn-primary btn-sm">
        </div>
        </div>
        </form>
    </div>

    <div class="col-md-4">
       
    </div>
    <div class="col-md-4 text-start text-md-end">
        <button class="btn btn-primary btn-sm" onclick="printTable()">Print</button>
            <a class="btn btn-primary btn-sm" href="doctor_schedule.php">Schedules</a>
            <a class="btn btn-primary btn-sm" href="doctors.php">Doctors</a>
        </div>
</div>

<div class="row">
<div class="col-12">
    <div class="table-responsive mb-2">
    <table class="PrintAble table table-bordered border-secondary bg-light">
        <tr>	
            <th>ID</th>            
            <th>Doctor</th>            
            <th>Days</th>
            <th>From</th>
            <th>To</th>
            <th>Action</th>
        </tr>
<?php foreach($doctors as $doctor){ 
     if($doctor['drSched_status'] == 1){ $sts = "Active";}else{$sts = "In-Active";} ?>
        <tr class="<?php echo $sts; ?>">
            <td> <?php echo $doctor['schedule_id'] ?> </td> 
            <td> <?php echo $doctor['dr_first_name'] . " " . $doctor['dr_last_name'] ?> </td>
            <td> <?php echo $doctor['drSched_day'] ?> </td>
            <td> <?php echo $doctor['drSched_start_time'] ?> </td>
            <td> <?php echo $doctor['drSched_end_time'] ?> </td>
            <td class="text-center"> <a href="viewDoctorSchedule.php?sid=<?php echo $doctor['schedule_id'] ?>"><i class="fa fa-eye"></i> </a></td>
            

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