<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

// 

if(isset($_POST['AddPreAssesment']))
{
    
    $vid = $_POST['VisitId'];
    $adate = $_POST['pa_date'];
    $pa_bp_sys = $_POST['pa_bp_sys'];
    $pa_bp_dia = $_POST['pa_bp_dia'];
    $pa_pulse = $_POST['pa_pulse'];
    $pa_weight = $_POST['pa_weight'];
    $pa_height= $_POST['pa_height'];
    $pa_spo2= $_POST['pa_spo2'];
    $pa_temp= $_POST['pa_temp'];
    $Status = $_POST['Status'];
    $CreatedBy = $_POST['CreatedBy'];
    $CreatedDate = $_POST['CreatedDate'];
    Add_PreAssesment($vid,$adate,$pa_bp_sys,$pa_bp_dia,$pa_pulse,$pa_weight,$pa_height,$pa_spo2,$pa_temp,$Status,$CreatedBy,$CreatedDate);
    header("location:visit_log.php");
}
elseif(isset($_POST['AddTreatmentPlan']))
{
    $AdmissionID = $_POST['AdmissionID'];
    $TreatmentDescription = $_POST['TreatmentDescription'];
    $TreatmentDate = $_POST['TreatmentDate'];

    $Status = $_POST['Status'];
    $CreatedBy = $_POST['CreatedBy'];
    $CreatedDate = $_POST['CreatedDate'];
    Add_TreatmentPlan($AdmissionID,$TreatmentDescription,$TreatmentDate,$Status,$CreatedBy,$CreatedDate);
    header("location:admission.php");
}
elseif(isset($_POST['AddLabTest']))
{
    $admId = $_POST['admission_id'];
    $ptId = $_POST['patient_id'];
    $drId = $_POST['doctor_id'];
    $SubTypeId = $_POST['sub_category'];
    $Description = $_POST['lab_test_description'];
    $TestDate = $_POST['lab_test_date'];
    $Status = $_POST['lab_test_status'];
    $CreatedBy = $_POST['CreatedBy'];
    $CreatedDate = $_POST['CreatedDate'];
    Add_LabTest($admId,$ptId,$drId,$SubTypeId,$Description,$TestDate,$Status,$CreatedBy,$CreatedDate);
    header("location:lab_test.php?admid=$admId");
}
elseif(isset($_POST['AddLabTestSubType']))
{
    $TypeID = $_POST['TypeID'];
    $SubName = $_POST['SubName'];
    $Status = $_POST['Status'];
    $CreatedBy = $_POST['CreatedBy'];
    $CreatedDate = $_POST['CreatedDate'];
    Add_LabTestSubType($TypeID,$SubName,$Status,$CreatedBy,$CreatedDate);
    header("location:lab_test_sub_type.php");
}
elseif(isset($_POST['AddLabTestType']))
{
    $LabTestTypeName = $_POST['LabTestTypeName'];
    $LabTestStatus = $_POST['LabTestStatus'];
    $CreatedBy = $_POST['CreatedBy'];
    $CreatedDate = $_POST['CreatedDate'];
    Add_LabTestType($LabTestTypeName,$LabTestStatus,$CreatedBy,$CreatedDate);
    header("location:lab_test_type.php");
}
elseif(isset($_POST['AddAdmission']))
{
    $PatientId=$_POST['PatientId'];
    $DoctorId1=$_POST['DoctorId1'];
    $DoctorId2=$_POST['DoctorId2'];
    $DoctorId3=$_POST['DoctorId3'];
    $AdmissionDate=$_POST['AdmissionDate'];
    $Ward=$_POST['Ward'];
    $RoomNumber=$_POST['RoomNumber'];
    $BedNumber=$_POST['BedNumber'];
    $Reason=$_POST['Reason'];
    $Status=$_POST['status'];
    $CreatedBy=$_POST['CreatedBy'];
    $CreatedDate=$_POST['CreatedDate'];
    Add_Addmission($PatientId,$DoctorId1,$DoctorId2,$DoctorId3,$AdmissionDate, $Ward,$RoomNumber,$BedNumber,$Reason,$CreatedBy,$CreatedDate,$Status);
    header("location:admission.php");
}
elseif(isset($_POST['EditHospital']))
{
    $hid = $_POST['hospitalID'];
    $name = $_POST['hname'];
    $code = $_POST['hcode'];
    $address= $_POST['haddress'];
    $contact= $_POST['hcontact'];
    $email= $_POST['hemail'];
    $website= $_POST['hwebsite'];
    $status= $_POST['hstatus'];
    $ModifiedBy = $_POST['ModifiedBy'];
    $ModifiedDate = $_POST['ModifiedDate'];
    Update_Hospital($hid,$name,$code, $address, $contact,$email,$website,$status, $ModifiedBy,$ModifiedDate);
    header("location:hospitals.php");
}
elseif(isset($_POST['AddHospital']))
{
    $name = $_POST['hname'];
    $code = $_POST['hcode'];
    $address= $_POST['haddress'];
    $contact= $_POST['hcontact'];
    $email= $_POST['hemail'];
    $website= $_POST['hwebsite'];
    $status= $_POST['hstatus'];
    $CreatedBy = $_POST['CreatedBy'];
    $CreatedDate = $_POST['CreatedDate'];

    add_Hospital($name,$code, $address, $contact,$email,$website,$status, $CreatedBy,$CreatedDate);
    header("location:hospitals.php");
}
elseif(isset($_POST['AddDoctorSchedule']))
{
    $drid = $_POST['DoctorId'];
    $schedule_day = $_POST['schedule_day'];
    $TimeFrome = $_POST['TimeFrome'];
    $TimeTo = $_POST['TimeTo'];
    $status = $_POST['DrScheduleStatus'];
    $CreatedBy = $_POST['CreatedBy'];
    $CreatedDate = $_POST['CreatedDate'];
    add_DoctorSchedule($drid,$schedule_day,$TimeFrome,$TimeTo,$status, $CreatedBy,$CreatedDate);
    header("location:doctor_schedule.php");
}
elseif(isset($_POST['AddDoctor']))
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $specialty = $_POST['specialty'];
    $contact_number = $_POST['contact_number'];
    $DrEmail = $_POST['DrEmail'];
    $DrAddress = $_POST['DrAddress'];
    $gender = $_POST['gender'];
    $DrNIC = $_POST['DrNic'];
    $license_number = $_POST['license_number'];
    $credentials = $_POST['credentials'];
    $years_of_experience = $_POST['years_of_experience'];
    $DrStatus = $_POST['DrStatus'];
    $CreatedBy = $_POST['CreatedBy'];
    $CreatedDate = $_POST['CreatedDate'];
    if(!empty($_FILES['Drimage']['name']))
    {
        $ext = pathinfo($_FILES['Drimage']['name'],PATHINFO_EXTENSION);
        $dpicname = $first_name . $DrNIC .".". $ext;
        $spic = $_FILES['Drimage'];
        $Drimage = $_POST['Drimage'];

        if($spic['type']=="image/jpeg" || $spic['type']=="image/jpg" || $spic['type']=="image/png" )
        {  
            if( file_exists("images/DrPics/".$dpicname))
            {
                header("location:AddDoctor.php?err=File Already uploaded");
            }
            else
            {
                move_uploaded_file($spic['tmp_name'],"images/DrPics/".$dpicname);
                add_Doctor($first_name, $last_name, $specialty, $contact_number, $DrEmail, $DrAddress, $gender, $DrNIC, $dpicname, $license_number, $credentials, $years_of_experience,$DrStatus, $CreatedBy,$CreatedDate);
                header("location:doctors.php");
            }
        }
        else
        {
            header("location:AddDoctor.php?err=Invalid Image");
        }
    }
    else
    {
        $DRPic="";
        add_Doctor($first_name, $last_name, $specialty, $contact_number, $DrEmail, $DrAddress, $gender, $DrNIC, $DRPic, $license_number, $credentials, $years_of_experience,$DrStatus, $CreatedBy,$CreatedDate);
        header("location:doctors.php");
    }
}
else if(isset($_POST['EditDoctor']))
{
    $did = $_POST['doctor_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    
    $specialty = $_POST['specialty'];
    $contact_number = $_POST['contact_number'];
    $DrEmail = $_POST['DrEmail'];
    $DrAddress = $_POST['DrAddress'];
    $gender = $_POST['gender'];
    $DrNIC = $_POST['dr_nic'];
    // $Drimage = $_POST['Drimage'];
    $DRCurrPic = $_POST['DRCurrPic'];
    $license_number = $_POST['license_number'];
    $credentials = $_POST['credentials'];
    $years_of_experience = $_POST['years_of_experience'];
    $DrStatus = $_POST['DrStatus'];
    $ModifiedBy = $_POST['ModifiedBy'];
    $ModifiedDate = $_POST['ModifiedDate'];
    
    if(!empty($_FILES['Drimage']['name']))
    {
        $spic = $_FILES['Drimage'];
        if($spic['type']=="image/jpeg" || $spic['type']=="image/jpg" || $spic['type']=="image/png" )
        {  
            $ext = pathinfo($_FILES['Drimage']['name'],PATHINFO_EXTENSION);
            $dpicname = $first_name . $DrNIC .".". $ext;

            if( file_exists("images/DrPics/".$dpicname))
            {
                // move_uploaded_file($spic['tmp_name'],"images/DrPics/".$dpicname);
                unlink("images/DrPics/".$dpicname);
                move_uploaded_file($spic['tmp_name'],"images/DrPics/".$dpicname);          
            }
            else
            {
                move_uploaded_file($spic['tmp_name'],"images/DrPics/".$dpicname);                
            }
            Update_Doctor($did, $first_name, $last_name, $specialty, $contact_number, $DrEmail, $DrAddress, $gender, $DrNIC, $dpicname, $license_number, $credentials, $years_of_experience,$DrStatus, $ModifiedBy,$ModifiedDate);
            header("location:doctors.php");

        }
        else
        {
            header("location:EditDellDoctor.php?err=Invalid Image");
        }
    }
    else
    {
        Update_Doctor($did, $first_name, $last_name, $specialty, $contact_number, $DrEmail, $DrAddress, $gender, $DrNIC, $DRCurrPic, $license_number, $credentials, $years_of_experience,$DrStatus, $ModifiedBy,$ModifiedDate);
        header("location:doctors.php");
    }

}
else if(isset($_POST['EditPatient']))
{   
    $pid = $_POST['patient_id'];
    $hid = $_POST['hospitalId'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $contact_number = $_POST['contact_number'];
    $Email = $_POST['pEmail'];

    
    $PermanentAddress = $_POST['PermanentAddress'];
    $CurrentAddress = $_POST['CurrentAddress'];

    $PrivateCorporate = $_POST['PrivateCorporate'];
    $marital_status = $_POST['marital_status'];
    $nationality = $_POST['nationality'];
    $allergies = $_POST['allergies'];
    $emergency_contact_person = $_POST['emergency_contact_person'];
    $emergency_phone = $_POST['emergency_phone'];
    
    $Translator = $_POST['Translator'];
    $Translator_phone = $_POST['Translator_phone']; 
       
    $code_blue = $_POST['code_blue'];
    $doctor_ref = $_POST['doctor_ref'];
    $status = $_POST['status'];
    $ModifiedBy = $_POST['ModifiedBy'];
    $ModifiedDate = $_POST['ModifiedDate'];

    Update_Patients($pid,$hid, $first_name, $last_name,$date_of_birth, $gender, $contact_number,$Email,$PermanentAddress,$CurrentAddress, $PrivateCorporate,$marital_status,$nationality,$allergies,$emergency_contact_person,$emergency_phone,$Translator,$Translator_phone, $code_blue,$doctor_ref,$status, $ModifiedBy, $ModifiedDate);
    header("location:patients.php");
}

else if(isset($_POST['AddPatient']))
{
    $hid = $_POST['hospitalId'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $pnic = $_POST['pnic'];

    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $contact_number = $_POST['contact_number'];
    $emergency_phone = $_POST['emergency_phone'];
    $emergency_contact_person = $_POST['emergency_contact_person'];
    
    $translator = $_POST['translator'];
    $translator_phone = $_POST['translator_phone'];
    
    $Email = $_POST['pEmail'];
    $PermanentAddress = $_POST['PermanentAddress'];
    $CurrentAddress = $_POST['CurrentAddress'];

    $PrivateCorporate = $_POST['PrivateCorporate'];
    $marital_status = $_POST['marital_status'];
    $nationality = $_POST['nationality'];
    $allergies = $_POST['allergies'];
    $code_blue = $_POST['code_blue'];
    $doctor_ref = $_POST['doctor_ref'];
    $status = $_POST['status'];
    $CreatedBy = $_POST['CreatedBy'];
    $CreatedDate = $_POST['CreatedDate'];
    Add_Patient($hid, $first_name, $last_name,$pnic,$date_of_birth, $gender, $contact_number,$Email,$emergency_phone,$emergency_contact_person, $translator,$translator_phone,$PermanentAddress,$CurrentAddress, $PrivateCorporate,$marital_status,$nationality,$allergies, $code_blue,$doctor_ref,$status,$CreatedBy,$CreatedDate);
    header("location:patients.php");
}
else if(isset($_POST['AddVisitor']))
{
    $_DoctorId = $_POST['DoctorId'];
    $_PatientId = $_POST['PatientId'];
    $_VisitDate = $_POST['VisitDate'];
    $_visit_symptoms = $_POST['visit_symptoms'];
    $_visit_diagnosis = $_POST['visit_diagnosis'];
    $status =  $_POST['Status'];
    $_CreatedBy = $_POST['CreatedBy'];
    $_CreatedDate = $_POST['CreatedDate'];
    Add_Visitor($_DoctorId,$_PatientId,$_VisitDate,$_visit_symptoms,$_visit_diagnosis,$status,$_CreatedBy,$_CreatedDate);
    header("location:visit_log.php");
}
else if(isset($_POST['EditVisitLog']))
{   
    $vid = $_POST['VId'];
    $DrId = $_POST['DoctorId'];
    $PtId = $_POST['PatientId'];
    $VDate = $_POST['VDate'];
    $symptoms = $_POST['Symptoms'];
    $diagnosis = $_POST['Diagnosis'];
    $ModifiedBy = $_POST['ModifiedBy'];
    $ModifiedDate = $_POST['ModifiedDate'];
    Update_Visitor($vid,$DrId,$PtId,$VDate,$symptoms,$diagnosis,$ModifiedBy,$ModifiedDate);
    header("location:visit_log.php");
}
else
{
    header("location:logout.php");
}
?>
