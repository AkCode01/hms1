<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

 // print_r($_POST);
if(!isset($_POST['DocID'])){
    header("location:index.php");
}

$did = $_POST['DocID'];

if(isset($_POST['EditBtn'])){
   $submitBtn = "Edit";
}
elseif(isset($_POST['DelBtn']))
{
   $submitBtn = "Dell";
   SOFT_Dell_Doctor_byID($did);
   header("location:doctors.php");
}
 $doctor = get_doctor_byID($did);

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
        <h2 class="text-center text-white black-text-shadow">D O C T O R</h2>
    </div>    
</div>
<div class="container">
<div class="row">
<div class="col-12">
<?php if($submitBtn =="Edit"){ ?>
    <div class="row mb-1">
            <div class="col">
                <H5>Update Data</H5>
            </div>
            <div class="col text-end">
                <a class="btn btn-primary btn-sm" href="doctors.php">View All</a>
            </div>  
    </div>
    <form action="SaveData.php" method="post" enctype="multipart/form-data">
        <div class="p-2">
            <div class="row g-3 align-items-center">
            <div class="col-md-1">
                    <img src="images/DrPics/<?php echo $doctor[0]['dr_pic'];?>" width="64px" height="64px">
                    <input type="hidden" name="DRCurrPic" value="<?php echo $doctor[0]['dr_pic'] ?>">
                </div>    
            <div class="col-md-3">
                    <label for="doctor_id" class="form-label">Doctor ID</label>
                    <input type="text" value="<?php echo $doctor[0]['doctor_id'] ?>" class="form-control" id="doctor_id" name="doctor_id" readonly>
                </div>
                
                <div class="col-md-4">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" value="<?php echo $doctor[0]['dr_first_name'] ?>" class="form-control" id="first_name" name="first_name" required>
                </div>
                <div class="col-md-4">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" value="<?php echo $doctor[0]['dr_last_name'] ?>" class="form-control" id="last_name" name="last_name">
                </div>
                <div class="col-md-4">
                    <label for="dr_nic" class="form-label">NIC</label>
                    <input type="text" value="<?php echo $doctor[0]['dr_nic'] ?>" class="form-control" id="dr_nic" name="dr_nic">
                </div>
                <div class="col-md-4">
                    <label for="DrAddress" class="form-label">Residential Address</label>
                    <input type="text" value="<?php echo $doctor[0]['dr_address'] ?>" class="form-control" id="DrAddress" name="DrAddress">
                </div>
                <div class="col-md-4">
                    <label for="contact_number" class="form-label">Contact Number</label>
                    <input type="tel" value="<?php echo $doctor[0]['dr_contact'] ?>" class="form-control" id="contact_number" name="contact_number">
                </div>
                <div class="col-md-4">
                    <label for="DrEmail" class="form-label">Email</label>
                    <input type="email" value="<?php echo $doctor[0]['dr_email'] ?>" class="form-control" id="DrEmail" name="DrEmail">
                </div>

                <div class="col-md-4">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-control form-select" id="gender" name="gender" required>
    <?php if($doctor[0]['dr_gender']=='Male'){ ?>
                        <option disabled value="">Select</option>
                        <option selected value="Male">Male</option>
                        <option value="Female">Female</option>
    <?php }elseif($doctor[0]['dr_gender']=='Female'){?>
                        <option disabled value="">Select</option>
                        <option value="Male">Male</option>
                        <option selected value="Female">Female</option>
    <?php }else{?>
                        <option disabled selected value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
    <?php } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="license_number" class="form-label">License Number</label>
                    <input type="text" value="<?php echo $doctor[0]['dr_license_num'] ?>" class="form-control" id="license_number" name="license_number">
                </div>
                <div class="col-md-4">
                    <label for="credentials" class="form-label">Credentials</label>
                    <input type="text" value="<?php echo $doctor[0]['dr_credentials'] ?>" class="form-control" id="credentials" name="credentials">
                </div>

                <div class="col-md-4">
                    <label for="specialty" class="form-label">Specialty</label>
                    <input type="text" value="<?php echo $doctor[0]['dr_specialty'] ?>" class="form-control" id="specialty" name="specialty">
                </div>
                <div class="col-md-4">
                    <label for="years_of_experience" class="form-label">Experience (Year)</label>
                    <input type="number" value="<?php echo $doctor[0]['dr_experience'] ?>" class="form-control" id="years_of_experience" name="years_of_experience" required>
                </div>
                <div class="col-md-4">
                <label for="DrStatus" class="form-label">Status</label>
                    <select class="form-control form-select" id="DrStatus" name="DrStatus" required>
                        <option disabled value="">Select Status</option>
                        <?php if($doctor[0]['dr_status']== 1){ ?>
                            <option selected value="1">Active</option>
                            <option value="0">In-Active</option>
                        <?php }else{?>
                            <option value="1">Active</option>
                            <option selected value="0">In-Active</option>
                        <?php }?>       
                    </select>
                </div>
                <div class="col-md-4">
                <label for="Drimage" class="form-label">New Picture</label>
                <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control" id="Drimage" name="Drimage">    
                    <input type="hidden" name="ModifiedBy" value="<?php echo $_SESSION['logeduser'] ?>">
                    <input type="hidden" name="ModifiedDate" value="<?php echo date('Y-m-d H:i:s'); ?>">
                </div>
                <div class="col-md-4">
                    <br>
                    <div class="PictureShow">Select 150X150 image</div>
                </div>
            </div>
            <div class="mt-3">
                <input type="submit" name="EditDoctor" id="EditDoctor" value="Update Record" class="btn btn-primary btn-sm">
            </div>
        </div>
    </form>
<?php } ?>
</div>
</div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const fileInput = document.getElementById("Drimage");
        fileInput.addEventListener("change", function (event) {
            const file = event.target.files[0];
            const pictureShowDiv = document.querySelector(".PictureShow");
            pictureShowDiv.innerHTML = "Select 150X150 image";
            if (file) {
                const validImageTypes = ["image/jpeg", "image/jpg", "image/png"];
                if (!validImageTypes.includes(file.type)) {
                    alert("Please select a valid image file (PNG or JPG).");
                    fileInput.value = "";
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = new Image();
                    img.src = e.target.result;
                    img.onload = function () {
                        if (img.width > 500 ) {
                            alert(`Please upload an image of 150 x 150 pixels.`);
                            fileInput.value = "";
                            return;
                        }
                        pictureShowDiv.innerHTML = ""; 
                        pictureShowDiv.appendChild(img);
                    };
                };
                reader.readAsDataURL(file);
            }
        });
    });
    
    <?php if(isset($_GET['err'])){ ?> 
     function ErrorBack()
    {
        alert('<?php echo $_GET["err"]; ?>');
    }
        ErrorBack();
    <?php } ?>
    
</script>
</body>
</html>