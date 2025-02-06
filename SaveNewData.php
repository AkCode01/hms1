<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");
// 
if(isset($_POST['AddOperation']))
{
    $AdmId = $_POST['AdmId'];   
    $ot_date = $_POST['OperationDate'];
    $primary_consultant= $_POST['PrimaryConsultant'];
    $ot_consultant= $_POST['OtConsultant'];
    $anaesthetist= $_POST['Anaesthetist'];
    $operations= $_POST['Operations'];
    $post_remarks= $_POST['PostOfRemarks'];
    $surgical_remarks= $_POST['SurgicalRemarks'];
    $Status = $_POST['Status'];    
    $CreatedBy = $_POST['CreatedBy'];
    Add_Operations($AdmId,$ot_date,$primary_consultant,$ot_consultant,$anaesthetist,$operations,$post_remarks,$surgical_remarks,$Status,$CreatedBy);
    header("location:surg_operation.php?admid=$AdmId");
}elseif(isset($_POST['AddSurgOperationMedia']))
{
    $SOPID = $_POST['SOPID'];   
    $MediaUrl = $_POST['MediaUrl'];
    $MediaType = $_POST['MediaType'];
    $Status = $_POST['status'];
    $CreatedBy = $_POST['CreatedBy'];
    $CreatedDate = $_POST['CreatedDate'];

    $totMedia = Total_Operation_Media_BySOPID($SOPID);
    $tm = $totMedia[0]['total_Opr_media'];
    $medNewName = $SOPID . "_" . ($tm+1);

    if (!empty($_FILES['OperationImage']['name'][0])) {
        $totUpload = count($_FILES['OperationImage']['name']);
    }else{
        $totUpload = 0;
    }

if($totUpload>0)
        {
            for($c=0;$c<$totUpload;$c++)
            {
                $uploadedname = $_FILES['OperationImage']['name'][$c];
                $MedFileName = $medNewName ."_". $c+1 ."_". $uploadedname ;
                // echo "File: " . $MedFileName . "<br>";
                $spic = $_FILES['OperationImage'];
                // print_r($spic);
                
                if($spic['type'][$c]=="image/jpeg" || $spic['type'][$c]=="image/jpg" || $spic['type'][$c]=="image/png" ||$spic['type'][$c] == "video/video")
                {  
                     if(move_uploaded_file($spic['tmp_name'][$c],"images/OperationMedia/".$MedFileName))
                    {
                      add_SurgOperationMedia($SOPID,$MediaUrl,$MedFileName,$MediaType,$Status,$CreatedBy,$CreatedDate);
                    }        
                }
            }
            header("location:surg_operation.php");
        }
        else
        {
            //echo "<h2>Add without attachment</h2>";
            $MedFileName = "";
            add_SurgOperationMedia($SOPID,$MediaUrl,$MedFileName,$MediaType,$Status,$CreatedBy,$CreatedDate);
            header("location:surg_operation.php");
        }
}elseif(isset($_POST['AddPreOpAssesmentMedia']))
{      
    $POASSID = $_POST['POASSID'];
    $MediaUrl = $_POST['MediaUrl'];
    $MediaType = $_POST['MediaType'];
    $Status = $_POST['status'];
    $CreatedBy = $_POST['CreatedBy'];
    $totMedia = Total_Pre_OP_Asses_Media_ByPOPID($POASSID);
    $tm = $totMedia[0]['total_pre_op_media']; 
    $medNewName = $POASSID . "_" . ($tm+1);
    if (!empty($_FILES['PrePoAssesImage']['name'][0])) {
        $totUpload = count($_FILES['PrePoAssesImage']['name']);
    }else{
        $totUpload = 0;
    }
    if($totUpload>0)
        {
            for($c=0;$c<$totUpload;$c++)
            {
                $uploadedname = $_FILES['PrePoAssesImage']['name'][$c];
                $MedFileName = $medNewName ."_". $c+1 ."_". $uploadedname ;
                echo "File: " . $MedFileName . "<br>";
                $spic = $_FILES['PrePoAssesImage'];
                 print_r($spic);
                
                if($spic['type'][$c]=="image/jpeg" || $spic['type'][$c]=="image/jpg" || $spic['type'][$c]=="image/png" ||$spic['type'][$c] == "video/video")
                {  
                     if(move_uploaded_file($spic['tmp_name'][$c],"images/SurgeryMedia/".$MedFileName))
                    {
                      add_SurgPreOpAssesmentMedia($POASSID,$MediaUrl,$MedFileName,$MediaType,$Status,$CreatedBy);
                    }        
                }
            }
            header("location:surg_pre_op_assessment.php");
        }
        else
        {
            //echo "<h2>Add without attachment</h2>";
            $MedFileName = "";
            add_SurgPreOpAssesmentMedia($POASSID,$MediaUrl,$MedFileName,$MediaType,$Status,$CreatedBy);
            header("location:surg_pre_op_assessment.php");
        }
}
elseif(isset($_POST['AddSurgPreOpAssesment']))
{
    $AdmId = $_POST['AdmId'];    $AnaeshesologistID = $_POST['AnaeshesologistID'];
    $SurgeonID = $_POST['SurgeonID'];    $diagnosis = $_POST['diagnosis'];
    $SurgeryDate = $_POST['SurgeryDate'];    $classification = $_POST['classification'];
    $pre_op_mets = $_POST['pre_op_mets'];    $pre_op_cvs_hr = $_POST['pre_op_cvs_hr'];
    $pre_op_cvs_hypertension = $_POST['pre_op_cvs_hypertension'];    $pre_op_cvs_cong_defects = $_POST['pre_op_cvs_cong_defects'];    $pre_op_cvs_bp = $_POST['pre_op_cvs_bp'];
    $pre_op_cvs_temp = $_POST['pre_op_cvs_temp'];    $pre_op_cvs_ml = $_POST['pre_op_cvs_ml'];
    $angina = $_POST['angina'];    $pre_op_cvs_ccf = $_POST['pre_op_cvs_ccf'];
    $pre_op_cbvs_npo_time = $_POST['pre_op_cbvs_npo_time'];    $pre_op_cvs_orthoponea = $_POST['pre_op_cvs_orthoponea'];    $pre_op_cvs_anaemia = $_POST['pre_op_cvs_anaemia'];
    $cvs_edema = $_POST['cvs_edema'];    $pre_op_resp_dyspnoea = $_POST['pre_op_resp_dyspnoea'];
    $pre_op_resp_cough = $_POST['pre_op_resp_cough'];    $pre_op_resp_cyanosis = $_POST['pre_op_resp_cyanosis'];
    $pre_op_resp_sputum = $_POST['pre_op_resp_sputum'];    $pre_op_resp_smoking = $_POST['pre_op_resp_smoking'];
    $pre_op_resp_tuberculosis = $_POST['pre_op_resp_tuberculosis'];
    $pre_op_resp_asthma = $_POST['pre_op_resp_asthma'];    $pre_op_resp_copd = $_POST['pre_op_resp_copd'];
    $pre_op_resp_uri = $_POST['pre_op_resp_uri'];    $pre_op_resp_stridor = $_POST['pre_op_resp_stridor'];
    $pre_op_resp_haemoptysis = $_POST['pre_op_resp_haemoptysis'];
    $pre_op_renal = $_POST['pre_op_renal'];    $pre_op_hepatic = $_POST['pre_op_hepatic'];
    $pre_op_cns = $_POST['pre_op_cns'];    $pre_op_coag_problems = $_POST['pre_op_coag_problems'];
    $pre_op_allergies = $_POST['pre_op_allergies'];    $pre_op_family_history = $_POST['pre_op_family_history'];
    $pre_op_thyroid = $_POST['pre_op_thyroid'];    $diabetes = $_POST['diabetes'];
    $pre_op_current_medication_conc_disease_consultation = $_POST['pre_op_current_medication_conc_disease_consultation'];    $pre_op_ecg = $_POST['pre_op_ecg'];
    $pre_op_hb_hct = $_POST['pre_op_hb_hct'];    $pre_op_na = $_POST['pre_op_na'];
    $pre_op_k = $_POST['pre_op_k'];    $pre_op_cl = $_POST['pre_op_cl'];
    $pre_op_hco3 = $_POST['pre_op_hco3'];    $pre_op_cxr = $_POST['pre_op_cxr'];
    $pre_op_pit = $_POST['pre_op_pit'];    $pre_op_fbs_rbs = $_POST['pre_op_fbs_rbs'];
    $pre_op_bun = $_POST['pre_op_bun'];    $pre_op_cr = $_POST['pre_op_cr'];
    $pre_op_anaesthetic_history = $_POST['pre_op_anaesthetic_history'];
        $pre_op_ausculation = $_POST['pre_op_ausculation'];    $pre_op_aa_teeth = $_POST['pre_op_aa_teeth'];
    $pre_op_aa_dentures = $_POST['pre_op_aa_dentures'];    $pre_op_aa_neck_movement = $_POST['pre_op_aa_neck_movement'];
    $pre_op_aa_jaw_movement = $_POST['pre_op_aa_jaw_movement'];    $mallampatti = $_POST['mallampatti'];
    $pre_op_operative_orders = $_POST['pre_op_operative_orders'];    $pre_op_miscellaneous = $_POST['pre_op_miscellaneous'];    $anaesthesia = $_POST['anaesthesia'];
    $Status = $_POST['Status'];    $CreatedBy = $_POST['CreatedBy'];

   // Add_Surg_Pre_Op_Assesment($AdmId,$AnaeshesologistID,$SurgeonID,$diagnosis,$SurgeryDate,$Status,$CreatedBy);
    Add_Surg_Pre_Op_Assesment($AdmId,$AnaeshesologistID,$SurgeonID,$diagnosis,$SurgeryDate,$classification,$pre_op_mets,$pre_op_cvs_hr,$pre_op_cvs_hypertension,$pre_op_cvs_cong_defects,$pre_op_cvs_bp,$pre_op_cvs_temp,$pre_op_cvs_ml,$angina,$pre_op_cvs_ccf,$pre_op_cbvs_npo_time,$pre_op_cvs_orthoponea,$pre_op_cvs_anaemia,$cvs_edema,$pre_op_resp_dyspnoea,$pre_op_resp_cough,$pre_op_resp_cyanosis,$pre_op_resp_sputum,$pre_op_resp_smoking,$pre_op_resp_tuberculosis,$pre_op_resp_asthma,$pre_op_resp_copd,$pre_op_resp_uri,$pre_op_resp_stridor,$pre_op_resp_haemoptysis,$pre_op_renal,$pre_op_hepatic,$pre_op_cns,$pre_op_coag_problems,$pre_op_allergies,$pre_op_family_history,$pre_op_thyroid,$diabetes,$pre_op_current_medication_conc_disease_consultation,$pre_op_ecg,$pre_op_hb_hct,$pre_op_na,$pre_op_k,$pre_op_cl,$pre_op_hco3,$pre_op_cxr,$pre_op_pit,$pre_op_fbs_rbs,$pre_op_bun,$pre_op_cr,$pre_op_anaesthetic_history,$pre_op_ausculation,$pre_op_aa_teeth,$pre_op_aa_dentures,$pre_op_aa_neck_movement,$pre_op_aa_jaw_movement,$mallampatti,$pre_op_operative_orders,$pre_op_miscellaneous,$anaesthesia,$Status,$CreatedBy);
    
    header("location:surg_pre_op_assessment.php?admid=$AdmId");
}
else
{
    header("location:logout.php");
}
?>
