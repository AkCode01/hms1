<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

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
<div class="row mb-1">
        <div class="col">
            <h5>Add New Record</h5>
        </div>
        <div class="col text-end">
            <a class="btn btn-primary btn-sm" href="doctors.php">View All</a>
        </div>  
</div>
<div class="row">
<div class="col-12">
<form action="SaveData.php" method="post" enctype="multipart/form-data">
    <div class="p-2">
        <div class="row g-3 align-items-center">
            <div class="col-md-4">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control form-control-sm" id="first_name" name="first_name" required>
            </div>
            <div class="col-md-4">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control form-control-sm" id="last_name" name="last_name">
            </div>
            <div class="col-md-4">
                <label for="DrNic" class="form-label">NIC</label>
                <input type="text" class="form-control form-control-sm" id="DrNic" name="DrNic">
            </div>
            <div class="col-md-4">
                <label for="DrAddress" class="form-label">Mailing Address</label>
                <input type="text" class="form-control form-control-sm" id="DrAddress" name="DrAddress">
            </div>

            <div class="col-md-4">
                <label for="contact_number" class="form-label">Contact Number</label>
                <input type="tel" class="form-control form-control-sm" id="contact_number" name="contact_number">
            </div>
            <div class="col-md-4">
                <label for="DrEmail" class="form-label">Email</label>
                <input type="email" class="form-control form-control-sm" id="DrEmail" name="DrEmail">
            </div>
            <div class="col-md-4">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-control form-select form-select-sm" id="gender" name="gender" required>
                    <option disabled selected value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="license_number" class="form-label">License Number</label>
                <input type="text" class="form-control form-control-sm" id="license_number" name="license_number">
            </div>
            <div class="col-md-4">
                <label for="credentials" class="form-label">Credentials</label>
                <input type="text" class="form-control form-control-sm" id="credentials" name="credentials">
            </div>
            <div class="col-md-4">
                <label for="specialty" class="form-label">Speciality</label>
                <input type="text" class="form-control form-control-sm" id="specialty" name="specialty">
            </div>
            <div class="col-md-4">
                <label for="years_of_experience" class="form-label">Experience (Year)</label>
                <input type="number" class="form-control form-control-sm" id="years_of_experience" name="years_of_experience" min="0" required>
            </div>
           
            <div class="col-md-4">
            <label for="Drimage" class="form-label">Picture</label>
                <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control form-control-sm" id="Drimage" name="Drimage">    
                <input type="hidden" name="DrStatus" value="1">
                <input type="hidden" name="CreatedBy" value="<?php echo $_SESSION['logeduser'] ?>">
                <input type="hidden" name="CreatedDate" value="<?php echo date('Y-m-d H:i:s'); ?>">
            </div>
            
            <div class="col-md-4">
                <br>
                <input type="submit" name="AddDoctor" id="AddDoctor" value="Save" class="btn btn-primary btn-sm">
            </div>
            <div class="col-md-4">
                <br>
                <div class="PictureShow"></div>
            </div>
        </div>
    </div>
</form>
</div>
</div>
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