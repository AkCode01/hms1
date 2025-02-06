<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

// 
if(isset($_POST['EditOperation']))
{   
    $sopid = $_POST['SOpId'];   
    $AdmId = $_POST['AdmId'];   
    $ot_date = $_POST['OperationDate'];
    $primary_consultant= $_POST['PrimaryConsultant'];
    $ot_consultant= $_POST['OtConsultant'];
    $anaesthetist= $_POST['Anaesthetist'];
    $operations= $_POST['Operations'];
    $post_remarks= $_POST['PostOfRemarks'];
    $surgical_remarks= $_POST['SurgicalRemarks'];
    $Status = $_POST['Status'];    
    $ModifiedBy = $_POST['ModifiedBy'];
    Update_Operations($sopid,$AdmId,$ot_date,$primary_consultant,$ot_consultant,$anaesthetist,$operations,$post_remarks,$surgical_remarks,$Status,$ModifiedBy);
    header("location:surg_operation.php?admid=$AdmId");

}
elseif(isset($_POST['EditDoctorSchedule']))
{   
    $SID = $_POST['SID'];
    $SchedDays = $_POST['SchedDays'];
    $StartTime = $_POST['StartTime'];
    $EndTime = $_POST['EndTime'];
    $status= $_POST['status'];
    $ModifiedBy = $_POST['ModifiedBy'];
    $ModifiedDate = $_POST['ModifiedDate'];
    Update_Doctor_Schedule($SID,$SchedDays,$StartTime,$EndTime,$status,$ModifiedBy,$ModifiedDate);
    header("location:doctors.php");
}
elseif(isset($_POST['EditLabTestSubType']))
{   
    $LTSTID = $_POST['LTSTID'];
    $TypeID = $_POST['TypeID'];
    $SubTypeName = $_POST['SubTypeName'];
    $status= $_POST['status'];
    $ModifiedBy = $_POST['ModifiedBy'];
    $ModifiedDate = $_POST['ModifiedDate'];
    Update_LabTestSubType($LTSTID,$TypeID,$SubTypeName,$status,$ModifiedBy,$ModifiedDate);
    header("location:lab_test_sub_type.php");
}
elseif(isset($_POST['EditLabTestType']))
{   
    $LTTID = $_POST['LTTID'];
    $TypeName = $_POST['TypeName'];
    $status= $_POST['status'];
    $ModifiedBy = $_POST['ModifiedBy'];
    $ModifiedDate = $_POST['ModifiedDate'];
    Update_LabTestType($LTTID,$TypeName,$status,$ModifiedBy,$ModifiedDate);
    header("location:lab_test_type.php");
}
elseif(isset($_POST['EditLabTest']))
{   
    $LTID = $_POST['LTID'];  
    $LTDate = $_POST['LTDate'];  
    $description = $_POST['description'];  
    $status= $_POST['status'];
    $ModifiedBy = $_POST['ModifiedBy'];
    $ModifiedDate = $_POST['ModifiedDate'];
    Update_LabTest($LTID,$LTDate,$description,$status,$ModifiedBy,$ModifiedDate);
    header("location:lab_test.php");
}
elseif(isset($_POST['EditTreatMentPlan']))
{   
    $TPID = $_POST['TPID'];  
    $ADMID = $_POST['ADMID']; 
    $TPDate = $_POST['TPDate'];  
    $description = $_POST['description'];  
    $status= $_POST['tpstatus'];
    $ModifiedBy = $_POST['ModifiedBy'];
    $ModifiedDate = $_POST['ModifiedDate'];
    Update_TreatmentPlan($TPID,$TPDate,$description,$status,$ModifiedBy,$ModifiedDate);
    header("location:admission.php?admid=$ADMID");
}
elseif(isset($_POST['EditAdmission']))
{  
    $admid = $_POST['admid'];  
    $PatientID = $_POST['PatientID'];  
    $DoctorID01 = $_POST['DoctorID01'];  
    $DoctorID02 = $_POST['DoctorID02'];  
    $DoctorID03 = $_POST['DoctorID03'];  
    $admdate = $_POST['admdate'];  
    $disdate = $_POST['disdate'];  
    $ward = $_POST['ward'];  
    $room = $_POST['room'];  
    $bed = $_POST['bed'];  
    $reason = $_POST['reason'];  
    
    $status= $_POST['Status'];
    $ModifiedBy = $_POST['ModifiedBy'];
    $ModifiedDate = $_POST['ModifiedDate'];
    Update_Admission($admid,$PatientID,$DoctorID01,$DoctorID02,$DoctorID03,$admdate,$disdate,$ward,$room,$bed,$reason,$status,$ModifiedBy,$ModifiedDate);
    header("location:admission.php");
}
elseif(isset($_POST['EditDecisionMaking']))
{  
    $dmid = $_POST['dmid'];  
    $vid=$_POST['vid'];
    $dmname=$_POST['dmname'];
    $dosage=$_POST['dosage'];
    $instructions=$_POST['instructions'];
    $status= $_POST['Status'];
    $ModifiedBy = $_POST['ModifiedBy'];
    $ModifiedDate = $_POST['ModifiedDate'];
    Update_Decision_Making($dmid,$vid,$dmname,$dosage,$instructions,$status,$ModifiedBy,$ModifiedDate);
    header("location:decision_making.php");
}
elseif(isset($_POST['EditDoctorAssement']))
{  
    $daid=$_POST['daid'];
    $vid=$_POST['vid'];
    $dadate=$_POST['dadate'];
    $followup=$_POST['followup'];
    $complain=$_POST['complain'];
    $duration=$_POST['duration'];
    $examination=$_POST['examination'];
    $history=$_POST['history'];
    $treatment=$_POST['treatment'];
    $location=$_POST['location'];
    $cycles=$_POST['cycles'];
    $dadfrom=$_POST['dadfrom'];
    $dadto=$_POST['dadto'];
    $fraction=$_POST['fraction'];
    $status= $_POST['Status'];
    $ModifiedBy = $_POST['ModifiedBy'];
    $ModifiedDate = $_POST['ModifiedDate'];
    Update_Doctor_Assesment($daid,$vid,$dadate,$followup,$complain,$duration,$examination,$history,$treatment,$location,$cycles,$dadfrom,$dadto,$fraction,$status,$ModifiedBy,$ModifiedDate);
    header("location:doctors_assesment.php");
}
elseif(isset($_POST['EditPreAssement']))
{
    $paid = $_POST['paid'];
    $vid = $_POST['vid'];
    $pasdate = $_POST['pasdate'];
    $bpsys = $_POST['bpsys'];
    $bpdia = $_POST['bpdia'];
    $pulse = $_POST['pulse'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $spo2 = $_POST['spo2'];
    $temp = $_POST['temp'];
    $status= $_POST['Status'];
    $ModifiedBy = $_POST['ModifiedBy'];
    $ModifiedDate = $_POST['ModifiedDate'];
    Update_Pre_Assesment($paid,$vid,$pasdate,$bpsys,$bpdia,$pulse,$weight,$height,$spo2,$temp,$status, $ModifiedBy,$ModifiedDate);
    header("location:pre_assesment.php");
}
else
{
    header("location:logout.php");
}
?>
