<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

if(isset($_POST['AddDecisionMaking']))
{
    $vid = $_POST['VisitId'];
    $medication = $_POST['medication'];
    $dosage = $_POST['dosage'];
    $instructions = $_POST['instructions'];
    $Status = $_POST['Status'];
    $CreatedBy = $_POST['CreatedBy'];
    $CreatedDate = $_POST['CreatedDate'];
    Add_Decision_Making($vid,$medication,$dosage,$instructions,$Status,$CreatedBy,$CreatedDate);
    header("location:decision_making.php?vid=$vid");
}
elseif(isset($_POST['AddDoctorAssesment']))
{
    $vid = $_POST['VisitId'];
    $dadate= $_POST['DrAsDate'];	
    $followup= $_POST['DrAsVisitNo'];
    $complain= $_POST['DrAsActComplain'];
    $duration= $_POST['DrAsDuration'];
    $examination= $_POST['DrAsExamination'];
    $history= $_POST['DrAsPastMedHistory'];
    $treatment= $_POST['DrAsPreTreatment'];
    $location= $_POST['DrAsRadiationLocation'];
    $cycles= $_POST['DrAsRadiationCycles'];
    $radiation_from= $_POST['DrAsRadiationDateFrom'];
    $radiation_to= $_POST['DrAsRadiationDateTo'];
    $fractions= $_POST['DrAsFractions'];
    $Status = $_POST['Status'];
    $CreatedBy = $_POST['CreatedBy'];
    $CreatedDate = $_POST['CreatedDate'];
    Add_Doctor_Assesment($vid,$dadate,$followup,$complain,$duration,$examination,$history,$treatment,$location,$cycles,$radiation_from,$radiation_to,$fractions,$Status,$CreatedBy,$CreatedDate);
    header("location:doctors_assesment.php?vid=$vid");
}
else
{
    header("location:logout.php");
}
?>
