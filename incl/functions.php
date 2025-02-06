<?php
function Get_Operation_Media_ByOPID($id){
    $qry = "SELECT * FROM surg_operation_media
    WHERE surg_op_id = $id";
    $records = run_qury($qry);
    return $records;
}
function Get_Operation_Media(){
    $qry = "SELECT * FROM surg_operation_media";
    $records = run_qury($qry);
    return $records;
}
function Get_Surg_Operation_ByID($id){
    $qry = "SELECT * FROM surg_operation
    WHERE surg_op_id = $id";
    $records = run_qury($qry);
    return $records;
}
function Get_Operations_ByADMID($id){
    $qry = "SELECT * FROM surg_operation
    WHERE admission_id = $id";
    $records = run_qury($qry);
    return $records;
}
function Get_Operations(){
    $qry = "SELECT * FROM surg_operation";
    $records = run_qury($qry);
    return $records;
}
function get_surge_pre_po_assesment_media_byID($id){
    $qry = "SELECT * FROM surg_pre_op_assessment_media
    WHERE pre_op_ass_media_id = $id";
    $records = run_qury($qry);
    return $records;
}
function get_visit_logs_by_patient($pid){
    $qry = "SELECT * FROM visit_log v
    INNER JOIN doctor d on v.doctor_id = d.doctor_id 
    INNER Join patient P on v.patient_id = P.patient_id
    WHERE v.patient_id = $pid
    ORDER BY v.visit_id DESC";
    $records = run_qury($qry);
    return $records;
}
function get_visit_logs(){
    $qry = "SELECT * FROM visit_log v
    INNER JOIN doctor d on v.doctor_id = d.doctor_id 
    INNER Join patient P on v.patient_id = P.patient_id
    ORDER BY v.visit_id DESC";
    $records = run_qury($qry);
    return $records;
}
function Get_Hospital_byID($id){
    $qry = "SELECT * FROM hospital_detail WHERE hospital_id=$id";
    $records = run_qury($qry);
    return $records;
}
function get_HospitalDetail(){
    $qry = "SELECT * FROM hospital_detail";
    $records = run_qury($qry);
    return $records;
}
function get_Patients(){
    $qry = "SELECT * FROM patient p
    INNER JOIN hospital_detail h on p.hospital_id = h.hospital_id
    WHERE p.patient_status=1
    ORDER BY patient_id DESC";
    $records = run_qury($qry);
    return $records;
}
function get_Active_Patients(){
    $qry = "SELECT * FROM patient p
    INNER JOIN hospital_detail h on p.hospital_id = h.hospital_id
    WHERE p.patient_status=1 ORDER BY patient_id DESC";
    $records = run_qury($qry);
    return $records;
}
function get_IN_Active_Patients(){
    $qry = "SELECT * FROM patient p 
    INNER JOIN hospital_detail h on p.hospital_id = h.hospital_id
    WHERE p.patient_status = 0 ORDER BY p.patient_id DESC";
    $records = run_qury($qry);
    return $records;
}
function Get_Dr_assesment_By_Vist($vid)
{
    $qry = "SELECT * FROM doctors_assessment DA
    INNER JOIN visit_log VL on DA.visit_id = VL.visit_id
    INNER JOIN patient P on VL.patient_id = P.patient_id
    WHERE DA.visit_id = $vid 
    ORDER BY DA.doctors_assessment_id DESC";
    $records = run_qury($qry);
    return $records;
}
function Get_Decision_Makings(){
    $qry = "SELECT * FROM decision_making DM
    INNER JOIN visit_log VL on DM.visit_id = VL.visit_id
    INNER JOIN patient P on VL.patient_id = P.patient_id
    ORDER BY DM.medication_id DESC";
    $records = run_qury($qry);
    return $records;
}
function Get_Pre_Op_Assesment_Media_ByADMID($PrOPid)
{
    $qry = "SELECT * FROM surg_pre_op_assessment_media WHERE pre_op_assid = $PrOPid";
    $records = run_qury($qry);
    return $records;
}
function Get_Pre_Op_Assesment_Media()
{
    $qry = "SELECT * FROM surg_pre_op_assessment_media";
    $records = run_qury($qry);
    return $records;
}
function Get_Pre_Op_Assesment_ByID($id)
{
    $qry = "SELECT * FROM surg_pre_op_assessment WHERE pre_op_assid = $id";
    $records = run_qury($qry);
    return $records;
}
function Get_Pre_Op_Assesment_ByADMID($admid)
{
    $qry = "SELECT * FROM surg_pre_op_assessment WHERE admission_id = $admid";
    $records = run_qury($qry);
    return $records;
}
function Get_Pre_Op_Assesment()
{
    $qry = "SELECT * FROM surg_pre_op_assessment";
    $records = run_qury($qry);
    return $records;
}
function Get_Decision_Makings_BYID($dmid)
{
    $qry = "SELECT * FROM decision_making DM
    INNER JOIN visit_log VL on DM.visit_id = VL.visit_id
    INNER JOIN patient P on VL.patient_id = P.patient_id
    WHERE DM.medication_id=$dmid";
    $records = run_qury($qry);
    return $records;
}
function Get_Decision_Makings_VID($vid)
{
    $qry = "SELECT * FROM decision_making DM
    INNER JOIN visit_log VL on DM.visit_id = VL.visit_id
    INNER JOIN patient P on VL.patient_id = P.patient_id
    WHERE DM.visit_id = $vid ";
    $records = run_qury($qry);
    return $records;
}
function Get_Dr_assesment_byID($id){
    
    $qry = "SELECT * FROM doctors_assessment DA
    INNER JOIN visit_log VL on DA.visit_id = VL.visit_id
    INNER JOIN patient P on VL.patient_id = P.patient_id
    WHERE DA.doctors_assessment_id = $id";
    $records = run_qury($qry);
    return $records;
}
function Get_Dr_assesment(){
    $qry = "SELECT * FROM doctors_assessment DA
    INNER JOIN visit_log VL on DA.visit_id = VL.visit_id
    INNER JOIN patient P on VL.patient_id = P.patient_id
    ORDER BY DA.doctors_assessment_id DESC";
    $records = run_qury($qry);
    return $records;
}
function get_pre_assesment_byID($id)
{
    $qry = "SELECT * FROM pre_assessment PA
    INNER JOIN visit_log VL on PA.visit_id = VL.visit_id
    INNER JOIN patient P on VL.patient_id = P.patient_id
    WHERE PA.pre_assessment_id = $id";
    $records = run_qury($qry);
    return $records;
}
function Get_Pre_assesment_By_Vist($id)
{
    $qry = "SELECT *  FROM pre_assessment PA 
    INNER JOIN visit_log VL on PA.visit_id = VL.visit_id 
    INNER JOIN patient P on VL.patient_id = P.patient_id
    WHERE PA.visit_id = $id ";
    $records = run_qury($qry);
    return $records;
}
function Get_Pre_assesment(){
    $qry = "SELECT * FROM pre_assessment PA 
    INNER JOIN visit_log VL on PA.visit_id = VL.visit_id 
    INNER JOIN patient P on VL.patient_id = P.patient_id
    ORDER BY PA.pre_assessment_id DESC";
    $records = run_qury($qry);
    return $records;
}
function Get_Active_Doctors_Schedule(){
    $qry = "SELECT * FROM doctor_schedule ds
    INNER JOIN doctor d on d.doctor_id = ds.doctor_id
     ORDER BY ds.doctor_id DESC";
    $records = run_qury($qry);
    return $records;
}
function Get_Active_Doctors_Schedule_By_Doctor($drid){
    $qry = "SELECT * FROM doctor_schedule ds
    INNER JOIN doctor d on d.doctor_id = ds.doctor_id
     WHERE ds.doctor_id = $drid 
     ORDER BY ds.doctor_id DESC
     ";
    $records = run_qury($qry);
    return $records;
}
function Get_Active_Doctors_Schedule_By_Day($day){
    $qry = "SELECT * FROM doctor_schedule ds
    INNER JOIN doctor d on d.doctor_id = ds.doctor_id
     WHERE ds.drSched_day = '$day'
     ORDER BY ds.doctor_id DESC
     ";
    $records = run_qury($qry);
    return $records;
}
function Get_LabTest_ByID($ltid){
    $qry = "SELECT * FROM lab_test
    WHERE lab_test_id=$ltid";
    $records = run_qury($qry);
    return $records;

}
function Get_Lab_Test_By_TYPID($tid){
    $qry = "SELECT * FROM lab_test
    WHERE lab_test_type_id=$tid";
    $records = run_qury($qry);
    return $records;

}
function Get_Lab_Test(){
    $qry = "SELECT * FROM lab_test LT
    INNER JOIN lab_test_sub_type LTST ON LT.lab_test_sub_type_id = LTST.lab_test_sub_type_id
    INNER JOIN lab_test_type LTT ON LTT.lab_test_type_id = LTST.lab_test_type_id
    INNER JOIN patient P on LT.patient_id = P.patient_id";
    $records = run_qury($qry);
    return $records;
}
function Get_TreatementPlan_ByID($id){
    $qry = "SELECT * FROM treatment_plan 
    WHERE treatment_id=$id
    ";
    $records = run_qury($qry);
    return $records;

}
function Get_Treatment_By_ADMID($id){
    $qry = "SELECT * FROM treatment_plan TP
    INNER JOIN admission ADM on TP.admission_id = ADM.admission_id
    INNER JOIN patient P on ADM.patient_id = P.patient_id
    WHERE TP.admission_id=$id
    ";
    $records = run_qury($qry);
    return $records;

}
function Get_Lab_Test_ByADMID($id){
    $qry = "SELECT * FROM lab_test LT
    INNER JOIN lab_test_sub_type LTST ON LT.lab_test_sub_type_id = LTST.lab_test_sub_type_id
    INNER JOIN lab_test_type LTT ON LTT.lab_test_type_id = LTST.lab_test_type_id
    INNER JOIN patient P on LT.patient_id = P.patient_id
    WHERE LT.admission_id=$id";
    $records = run_qury($qry);
    return $records;

}
function Get_Lab_Test_Type_ByID($id){
    $qry = "SELECT * FROM lab_test_type WHERE lab_test_type_id=$id";
    $records = run_qury($qry);
    return $records;
}
function Get_Lab_Test_sub_Type_ByLabTestTypeID($id){
    $qry = "SELECT * FROM lab_test_sub_type WHERE lab_test_type_id = $id";
    $records = run_qury($qry);
    return $records;
}
function Get_Lab_Test_sub_Type_ByID($id){
    $qry = "SELECT * FROM lab_test_sub_type WHERE lab_test_sub_type_id = $id";
    $records = run_qury($qry);
    return $records;
}
function Get_Lab_Test_sub_Type(){
    $qry = "SELECT * FROM lab_test_sub_type LTST
    INNER JOIN lab_test_type LTT ON LTST.lab_test_type_id = LTT.lab_test_type_id
    ";
    $records = run_qury($qry);
    return $records;
}
function Get_Lab_Test_Type(){
    $qry = "SELECT * FROM lab_test_type";
    $records = run_qury($qry);
    return $records;
}
function Is_Patient_Admit($pid){
    $qry = "SELECT * FROM admission 
    WHERE patient_id=$pid";
    $records = run_qury($qry);
    if(count($records) == 0){return false;}else{return true;}
}
function Get_Admissions_ByPID($pid){
    $qry = "SELECT * FROM admission adm
    INNER JOIN patient P on adm.patient_id = P.patient_id
    INNER JOIN doctor d on adm.doctorid_01 = d.doctor_id
    WHERE adm.patient_id=$pid";
    $records = run_qury($qry);
    return $records;
}
function Get_Admissions_By_ID($id){
    $qry = "SELECT * FROM admission adm
    INNER JOIN patient P on adm.patient_id = P.patient_id
    INNER JOIN doctor d on adm.doctorid_01 = d.doctor_id
    WHERE adm.admission_id=$id";
    $records = run_qury($qry);
    return $records;
}
function Get_Admissions(){
    $qry = "SELECT * FROM admission adm
    INNER JOIN patient P on adm.patient_id = P.patient_id
    WHERE 	adm_status=1 ORDER BY admission_id DESC";
    $records = run_qury($qry);
    return $records;
}
function Get_InActive_Admissions(){
    $qry = "SELECT * FROM admission WHERE adm_status=0 ORDER BY admission_id DESC";
    $records = run_qury($qry);
    return $records;
}
function Get_InActive_Hospitals(){
    $qry = "SELECT * FROM hospital_detail WHERE hospital_status=0 ORDER BY hospital_id DESC";
    $records = run_qury($qry);
    return $records;
}
function Get_Hospitals(){
    $qry = "SELECT * FROM hospital_detail WHERE hospital_status=1 ORDER BY hospital_id DESC";
    $records = run_qury($qry);
    return $records;
}
function get_doctors(){
    $qry = "SELECT * FROM doctor WHERE dr_status=1 ORDER BY doctor_id DESC";
    $records = run_qury($qry);
    return $records;
}
function Get_Active_Doctors(){
    $qry = "SELECT * FROM doctor WHERE dr_status=1 ORDER BY doctor_id DESC";
    $records = run_qury($qry);
    return $records;
}
function Get_IN_Active_Doctors(){
    $qry = "SELECT * FROM doctor WHERE dr_status=0 ORDER BY doctor_id DESC";
    $records = run_qury($qry);
    return $records;
}
function get_doctor_schedule_byID($id){
    $qry = "SELECT * FROM doctor_schedule ds
    INNER JOIN doctor d ON ds.doctor_id = d.doctor_id
    where schedule_id=$id";
    $records = run_qury($qry);
    return $records;
}
function get_doctor_byID($id){
    $qry = "SELECT * FROM doctor where doctor_id=$id";
    $records = run_qury($qry);
    return $records;
}
function get_patient_byID($id){
    $qry = "SELECT * FROM patient p
    INNER JOIN hospital_detail h on h.hospital_id = p.hospital_id
    where p.patient_id=$id";
    $records = run_qury($qry);
    return $records;

}
function get_visit_log_byID($id){
    $qry = "SELECT * FROM visit_log v
    INNER JOIN doctor d on v.doctor_id = d.doctor_id 
    INNER Join patient p on v.patient_id = p.patient_id
    where v.visit_id=$id";
    $records = run_qury($qry);
    return $records;
}
function get_visit_log_Only_byID($id){
    $qry = "SELECT * FROM visit_log 
    where visit_id=$id";
    $records = run_qury($qry);
    return $records;
}
function Total_Operation_Media_BySOPID($id){
    $qry = "SELECT COUNT(*) AS total_Opr_media FROM surg_operation_media 
    WHERE surg_op_id = $id";
    $records = run_qury($qry);
    return $records;
}
function Total_Pre_OP_Asses_Media_ByPOPID($id){
    $qry = "SELECT COUNT(*) AS total_pre_op_media FROM surg_pre_op_assessment_media 
    WHERE pre_op_assid = $id";
    $records = run_qury($qry);
    return $records;
}
function Tot_DR_Assesment_VNum_ByVID($vid){
    $qry = "SELECT COUNT(*) AS vists FROM doctors_assessment WHERE visit_id=$vid";
    $records = run_qury($qry);
    return $records;
}
function Total_Admissions(){
    $qry = "SELECT COUNT(*) AS total_Admission FROM admission";
    $records = run_qury($qry);
    return $records;
}
function Total_Hospitals(){
    $qry = "SELECT COUNT(*) AS total_hospitals FROM hospital_detail";
    $records = run_qury($qry);
    return $records;
}
function Total_Dcotors(){
    $qry = "SELECT COUNT(*) AS total_doctors FROM doctor";
    $records = run_qury($qry);
    return $records;
}
function Total_Patients(){
    $qry = "SELECT COUNT(*) AS total_patients FROM patient";
    $records = run_qury($qry);
    return $records;
}
function Total_VisitLog(){
    $qry = "SELECT COUNT(*) AS total_Visit_Log FROM visit_log";
    $records = run_qury($qry);
    return $records;
}

function Update_Operations($sopid,$AdmId,$ot_date,$primary_consultant,$ot_consultant,$anaesthetist,$operations,$post_remarks,$surgical_remarks,$Status,$ModifiedBy){
    $qry = "UPDATE surg_operation SET  
    admission_id = $AdmId,
    surg_op_ot_date = '$ot_date',
    surg_op_primary_consultant = '$primary_consultant',
    surg_op_ot_consultant = '$ot_consultant',
    surg_op_anaesthetist = '$anaesthetist',
    surg_op_operations = '$operations',
    surg_op_post_of_remarks = '$post_remarks',
    surg_op_surgical_remarks = '$surgical_remarks',
    surg_op_status = '$Status',
    surg_op_modified_by ='$ModifiedBy',
    WHERE surg_op_id = $sopid";
    run_qury_only($qry);
}
function Update_Doctor_Schedule($SID,$SchedDays,$StartTime,$EndTime,$status,$ModifiedBy,$ModifiedDate){
    $qry = "UPDATE doctor_schedule SET  
    drSched_day = '$SchedDays',
    drSched_start_time = '$StartTime',
    drSched_end_time = '$EndTime',
    drSched_status='$status',
    drSched_modified_by ='$ModifiedBy',
    drSched_modified_date='$ModifiedDate'
    WHERE schedule_id =$SID";
    run_qury_only($qry);
}
function Update_LabTestSubType($LTSTID,$TypeID,$SubTypeName,$status,$ModifiedBy,$ModifiedDate){
    $qry = "UPDATE lab_test_sub_type SET  
    lab_test_type_id = $TypeID,
    lab_test_sub_type_name = '$SubTypeName',
    lab_test_sub_type_status='$status',
    lab_test_sub_type_modified_by ='$ModifiedBy',
    lab_test_sub_type_modified_date='$ModifiedDate'
    WHERE lab_test_sub_type_id=$LTSTID";
    run_qury_only($qry);
}
function Update_LabTestType($LTTID,$TypeName,$status,$ModifiedBy,$ModifiedDate){
    $qry = "UPDATE lab_test_type SET  
    lab_test_type_name = '$TypeName',
    lab_test_type_status='$status',
    lab_test_type_modified_by ='$ModifiedBy',
    lab_test_type_modified_date='$ModifiedDate'
    WHERE lab_test_type_id=$LTTID";
    run_qury_only($qry);
}
function Update_LabTest($LTID,$LTDate,$description,$status,$ModifiedBy,$ModifiedDate){
    $qry = "UPDATE lab_test SET  
    lab_test_date = '$LTDate',
    lab_test_description= '$description',
    lab_test_status='$status',
    lab_test_modified_by ='$ModifiedBy',
    lab_test_modified_date='$ModifiedDate'
    WHERE lab_test_id=$LTID";
    run_qury_only($qry);
}
function Update_TreatmentPlan($TPID,$TPDate,$description,$status,$ModifiedBy,$ModifiedDate){
    $qry = "UPDATE treatment_plan SET  
    treatment_date = '$TPDate',
    treatment_description= '$description',
    treatment_status='$status',
    treatment_modified_by ='$ModifiedBy',
    treatment_modified_on='$ModifiedDate'
    WHERE treatment_id=$TPID";
    run_qury_only($qry);
}
function Update_Admission($admid,$PatientID,$DoctorID01,$DoctorID02,$DoctorID03,$admdate,$disdate,$ward,$room,$bed,$reason,$status,$ModifiedBy,$ModifiedDate)
{
    $qry = "UPDATE admission SET  
    patient_id='$PatientID',
    doctorid_01='$DoctorID01',
    doctorid_02='$DoctorID02',
    doctorid_03='$DoctorID03',
    admission_date='$admdate',
    discharge_date='$disdate',
    ward='$ward',
    room_number='$room',
    bed_number='$bed',
    reason='$reason',
    adm_status='$status',
    adm_modified_by='$ModifiedBy',
    adm_modified_date='$ModifiedDate'
    WHERE admission_id=$admid";
    run_qury_only($qry);
}
function Update_Decision_Making($dmid,$vid,$dmname,$dosage,$instructions,$status,$ModifiedBy,$ModifiedDate){
    $qry = "UPDATE decision_making SET  
    visit_id=$vid,
    dm_medication_name='$dmname',
    dm_dosage='$dosage',
    dm_instructions='$instructions',
    dm_status='$status',
    dm_modified_by='$ModifiedBy',
    dm_modified_date='$ModifiedDate'
    WHERE medication_id=$dmid";
    run_qury_only($qry);
}
function Update_Doctor_Assesment($daid,$vid,$dadate,$followup,$complain,$duration,$examination,$history,$treatment,$location,$cycles,$dadfrom,$dadto,$fraction,$status,$ModifiedBy,$ModifiedDate){
    $qry = "UPDATE doctors_assessment SET  
    visit_id=$vid,
    doctor_assess_date='$dadate',
    doctor_assess_visit_no_followup='$followup',
    doctor_assess_active_complain='$complain',
    doctor_assess_duration='$duration',
    doctor_assess_examination='$examination',
    doctor_assess_past_medhistory='$history',
    doctor_assess_previous_treatment='$treatment',
    doctor_assess_chemo_radiation_location='$location',
    doctor_assess_chemo_radiation_cycles='$cycles',
    doctor_assess_chemo_radiation_date_from='$dadfrom',
    doctor_assess_chemo_radiation_date_to='$dadto',
    doctor_assess_radiation_fractions='$fraction',
    doctor_assess_status='$status',
    doctor_assess_modified_by='$ModifiedBy',
    doctor_assess_modified_date='$ModifiedDate'
    WHERE doctors_assessment_id=$daid";
    run_qury_only($qry);
}
function Update_Pre_Assesment($paid,$vid,$pasdate,$bpsys,$bpdia,$pulse,$weight,$height,$spo2,$temp,$status, $ModifiedBy,$ModifiedDate){
    $qry = "UPDATE pre_assessment SET   
    visit_id='$vid',
    pre_assess_date='$pasdate',
    pre_assess_bp_sys='$bpsys',
    pre_assess_bp_dia='$bpdia',
    pre_assess_pulse='$pulse',
    pre_assess_weight_kg='$weight',
    pre_assess_height_ft_inch='$height',
    pre_assess_spo2='$spo2',
    pre_assess_temp_f='$temp',
    pre_assess_status='$status',
    pre_assess_modified_by='$ModifiedBy',
    pre_assess_modified_date='$ModifiedDate'
    WHERE pre_assessment_id=$paid";
    run_qury_only($qry);
}
function Update_Hospital($id,$name,$code, $address, $contact,$email,$website,$status, $ModifiedBy,$ModifiedDate){
    $qry = "UPDATE hospital_detail SET   
    hospital_name = '$name',
    hospital_code = '$code',
    hospital_address = '$address',
    hospital_contact_number = '$contact',
    hospital_email = '$email',
    hospital_website = '$website',
    hospital_status = '$status',
    hospital_modified_by = '$ModifiedBy',
    hospital_modified_date = '$ModifiedDate'
    WHERE hospital_id = $id";
    run_qury_only($qry);
}
function Update_Visitor($vid,$DrId,$PtId,$VDate,$symptoms,$diagnosis,$ModifiedBy,$ModifiedDate){
    $qry = "UPDATE visit_log SET 
    doctor_id = $DrId,
    patient_id=$PtId,
    visit_date='$VDate',
    visit_symptoms='$symptoms',
    visit_diagnosis='$diagnosis',
    visit_modified_by='$ModifiedBy',
    visit_modified_date='$ModifiedDate'
    WHERE visit_id = $vid";
    run_qury_only($qry);
}
function SOFT_Dell_Doctor_byID($did){
    $qry = "UPDATE doctor SET dr_status='0' WHERE doctor_id = $did";
    run_qury_only($qry);
}
function Update_Doctor($did, $first_name, $last_name, $specialty, $contact_number, $email, $address, $gender, $dnic, $image, $license_number, $credentials, $years_of_experience,$DrStatus, $modifiedBy, $modifiedDate)
{
    $qry = "UPDATE doctor SET 
    dr_first_name='$first_name',
    dr_last_name='$last_name',
    dr_specialty='$specialty',
    dr_contact='$contact_number',
    dr_email='$email',
    dr_address='$address',
    dr_gender='$gender',
    dr_nic='$dnic',
    dr_pic='$image',
    dr_license_num='$license_number',
    dr_credentials='$credentials',
    dr_experience = $years_of_experience,
    dr_status = '$DrStatus',
    dr_modified_by='$modifiedBy',
    dr_modified_date='$modifiedDate'
    WHERE doctor_id = $did";
    run_qury_only($qry);
}
function add_SurgOperationMedia($SOPID,$url,$fname,$ftype,$status,$createBy,$CreatedDate){
    $sql = "INSERT INTO surg_operation_media(surg_op_id,surg_opration_media_url, surg_opration_media_filename, surg_opration_media_type,surg_opration_media_status,	surg_opration_media_created_by,	surg_opration_media_created_date)
    VALUES($SOPID,'$url','$fname','$ftype','$status','$createBy','$CreatedDate')";
    run_qury_only($sql) ;
}
function Add_Operations($AdmId,$ot_date,$primary_consultant,$ot_consultant,$anaesthetist,$operations,$post_remarks,$surgical_remarks,$Status,$CreatedBy){
    $sql = "INSERT INTO surg_operation(admission_id,surg_op_ot_date,surg_op_primary_consultant,surg_op_ot_consultant,surg_op_anaesthetist,surg_op_operations,surg_op_post_of_remarks,surg_op_surgical_remarks,surg_op_status,surg_op_created_by)
     VALUES($AdmId,'$ot_date','$primary_consultant',$ot_consultant,'$anaesthetist','$operations','$post_remarks','$surgical_remarks','$Status','$CreatedBy')";
    run_qury_only($sql) ; 
}
function add_SurgPreOpAssesmentMedia($poaid,$url,$fname,$ftype,$status,$createBy){
    $sql = "INSERT INTO surg_pre_op_assessment_media(pre_op_assid,pre_op_ass_media_url,pre_op_ass_media_filename,pre_op_ass_media_type,pre_op_ass_media_status,pre_op_ass_media_created_by)
    VALUES($poaid,'$url','$fname','$ftype','$status','$createBy')";
    run_qury_only($sql) ;
}

function Add_Surg_Pre_Op_Assesment($AdmId,$AnaeshesologistID,$SurgeonID,$diagnosis,$SurgeryDate,$classification,$pre_op_mets,$pre_op_cvs_hr,$pre_op_cvs_hypertension,$pre_op_cvs_cong_defects,$pre_op_cvs_bp,$pre_op_cvs_temp,$pre_op_cvs_ml,$angina,$pre_op_cvs_ccf,$pre_op_cbvs_npo_time,$pre_op_cvs_orthoponea,$pre_op_cvs_anaemia,$cvs_edema,$pre_op_resp_dyspnoea,$pre_op_resp_cough,$pre_op_resp_cyanosis,$pre_op_resp_sputum,$pre_op_resp_smoking,$pre_op_resp_tuberculosis,$pre_op_resp_asthma,$pre_op_resp_copd,$pre_op_resp_uri,$pre_op_resp_stridor,$pre_op_resp_haemoptysis,$pre_op_renal,$pre_op_hepatic,$pre_op_cns,$pre_op_coag_problems,$pre_op_allergies,$pre_op_family_history,$pre_op_thyroid,$diabetes,$pre_op_current_medication_conc_disease_consultation,$pre_op_ecg,$pre_op_hb_hct,$pre_op_na,$pre_op_k,$pre_op_cl,$pre_op_hco3,$pre_op_cxr,$pre_op_pit,$pre_op_fbs_rbs,$pre_op_bun,$pre_op_cr,$pre_op_anaesthetic_history,$pre_op_ausculation,$pre_op_aa_teeth,$pre_op_aa_dentures,$pre_op_aa_neck_movement,$pre_op_aa_jaw_movement,$mallampatti,$pre_op_operative_orders,$pre_op_miscellaneous,$anaesthesia,$Status,$CreatedBy){
    $sql = "INSERT INTO surg_pre_op_assessment(admission_id,doctor_id_anaeshesologist,doctor_id_surgeon,pre_op_diagnosis,pre_op_surgery_date,pre_op_asa_classification,pre_op_mets,pre_op_cvs_hr,pre_op_cvs_hypertension,pre_op_cvs_cong_defects,pre_op_cvs_bp,pre_op_cvs_temp,pre_op_cvs_ml,pre_op_cvs_angina,pre_op_cvs_ccf,pre_op_cbvs_npo_time,pre_op_cvs_orthoponea,pre_op_cvs_anaemia,cvs_edema,pre_op_resp_dyspnoea,pre_op_resp_cough,pre_op_resp_cyanosis,pre_op_resp_sputum,pre_op_resp_smoking,pre_op_resp_tuberculosis,pre_op_resp_asthma,pre_op_resp_copd,pre_op_resp_uri,pre_op_resp_stridor,pre_op_resp_haemoptysis,pre_op_renal,pre_op_hepatic,pre_op_cns,pre_op_coag_problems,pre_op_allergies,pre_op_family_history,pre_op_thyroid,diabetes,pre_op_current_medication_conc_disease_consultation,pre_op_ecg,pre_op_hb_hct,pre_op_na,pre_op_k,pre_op_cl,pre_op_hco3,pre_op_cxr,pre_op_pit,pre_op_fbs_rbs,pre_op_bun,pre_op_cr,pre_op_anaesthetic_history,pre_op_ausculation,pre_op_aa_teeth,pre_op_aa_dentures,pre_op_aa_neck_movement,pre_op_aa_jaw_movement,pre_op_mallampatti,pre_op_operative_orders,pre_op_miscellaneous,pre_op_anaesthesia_plan,pre_op_status,pre_op_created_by)
     VALUES($AdmId,$AnaeshesologistID,$SurgeonID,'$diagnosis','$SurgeryDate','$classification','$pre_op_mets','$pre_op_cvs_hr','$pre_op_cvs_hypertension','$pre_op_cvs_cong_defects','$pre_op_cvs_bp','$pre_op_cvs_temp','$pre_op_cvs_ml','$angina','$pre_op_cvs_ccf','$pre_op_cbvs_npo_time','$pre_op_cvs_orthoponea','$pre_op_cvs_anaemia','$cvs_edema','$pre_op_resp_dyspnoea','$pre_op_resp_cough','$pre_op_resp_cyanosis','$pre_op_resp_sputum','$pre_op_resp_smoking','$pre_op_resp_tuberculosis','$pre_op_resp_asthma','$pre_op_resp_copd','$pre_op_resp_uri','$pre_op_resp_stridor','$pre_op_resp_haemoptysis','$pre_op_renal','$pre_op_hepatic','$pre_op_cns','$pre_op_coag_problems','$pre_op_allergies','$pre_op_family_history','$pre_op_thyroid','$diabetes','$pre_op_current_medication_conc_disease_consultation','$pre_op_ecg','$pre_op_hb_hct','$pre_op_na','$pre_op_k','$pre_op_cl','$pre_op_hco3','$pre_op_cxr','$pre_op_pit','$pre_op_fbs_rbs','$pre_op_bun','$pre_op_cr','$pre_op_anaesthetic_history','$pre_op_ausculation','$pre_op_aa_teeth','$pre_op_aa_dentures','$pre_op_aa_neck_movement','$pre_op_aa_jaw_movement','$mallampatti','$pre_op_operative_orders','$pre_op_miscellaneous','$anaesthesia','$Status','$CreatedBy')";
    run_qury_only($sql) ; 
}
function Add_Decision_Making($vid,$medication,$dosage,$instructions,$Status,$CreatedBy,$CreatedDate){
    $sql = "INSERT INTO decision_making(visit_id,dm_medication_name,dm_dosage,dm_instructions,dm_status,dm_created_by,dm_created_date)
    VALUES($vid,'$medication','$dosage','$instructions','$Status','$CreatedBy','$CreatedDate')";
    run_qury_only($sql) ; 
}
function Add_Doctor_Assesment($vid,$dadate,	$followup,	$complain,	$duration,	$examination,	$history, $treatment, $location,$cycles,$radiation_from,$radiation_to,$fractions,$Status,$CreatedBy,$CreatedDate){
    $sql = "INSERT INTO doctors_assessment(visit_id,doctor_assess_date,	doctor_assess_visit_no_followup,	doctor_assess_active_complain,	doctor_assess_duration,	doctor_assess_examination,	doctor_assess_past_medhistory,	doctor_assess_previous_treatment,	doctor_assess_chemo_radiation_location,	doctor_assess_chemo_radiation_cycles,	doctor_assess_chemo_radiation_date_from,	doctor_assess_chemo_radiation_date_to,	doctor_assess_radiation_fractions,	doctor_assess_status, doctor_assess_created_by,	doctor_assess_created_date)
    VALUES($vid,'$dadate','$followup','$complain','$duration','$examination','$history','$treatment','$location','$cycles','$radiation_from','$radiation_to','$fractions','$Status','$CreatedBy','$CreatedDate')";
    run_qury_only($sql) ; 
}
function Add_PreAssesment($vid,$adate,$ppa_bp_sys,$pa_bp_dia,$pa_pulse,$pa_weight_kg,$pa_height_ft_inch,$pa_spo2,$pa_temp_f,$Status,$CreatedBy,$CreatedDate){
    $sql = "INSERT INTO pre_assessment(visit_id,pre_assess_date,pre_assess_bp_sys,pre_assess_bp_dia,pre_assess_pulse,pre_assess_weight_kg,pre_assess_height_ft_inch,pre_assess_spo2,pre_assess_temp_f,pre_assess_status,pre_assess_created_by,pre_assess_created_date)
    VALUES($vid,'$adate','$ppa_bp_sys','$pa_bp_dia','$pa_pulse','$pa_weight_kg','$pa_height_ft_inch','$pa_spo2','$pa_temp_f','$Status','$CreatedBy','$CreatedDate')";
    run_qury_only($sql) ; 
}
function Add_TreatmentPlan($AdmissionID,$TreatmentDescription,$TreatmentDate,$Status,$CreatedBy,$CreatedDate){
    $sql = "INSERT INTO treatment_plan(admission_id,treatment_description,treatment_date,treatment_status,treatment_created_by,treatment_created_date)
    VALUES($AdmissionID,'$TreatmentDescription','$TreatmentDate','$Status','$CreatedBy','$CreatedDate')";
    run_qury_only($sql) ; 
}
function Add_LabTest($admID,$ptId,$doctor_id,$SubTypeId,$Description,$TestDate,$Status,$CreatedBy,$CreatedDate){
    $sql = "INSERT INTO lab_test(admission_id,patient_id,doctor_id,lab_test_sub_type_id,lab_test_description,lab_test_date,lab_test_status,lab_test_created_by,lab_test_created_date)
    VALUES($admID,$ptId,$doctor_id,$SubTypeId,'$Description','$TestDate','$Status','$CreatedBy','$CreatedDate')";
    run_qury_only($sql) ; 
}
function Add_LabTestSubType($TypeID,$SubName,$Status,$CreatedBy,$CreatedDate){
    $sql = "INSERT INTO lab_test_sub_type(lab_test_type_id,lab_test_sub_type_name,lab_test_sub_type_status,lab_test_sub_type_created_by,lab_test_sub_type_created_date)
    VALUES($TypeID,'$SubName','$Status','$CreatedBy','$CreatedDate')";
    run_qury_only($sql) ; 
}
function Add_LabTestType($LabTestTypeName,$LabTestStatus,$CreatedBy,$CreatedDate){
    $sql = "INSERT INTO lab_test_type(lab_test_type_name,lab_test_type_status,lab_test_type_created_by,lab_test_type_created_date)
    VALUES('$LabTestTypeName','$LabTestStatus','$CreatedBy','$CreatedDate')";
    run_qury_only($sql) ; 
}
function Add_Addmission($PatientId,$DoctorId1,$DoctorId2,$DoctorId3,$AdmissionDate,$Ward,$RoomNumber,$BedNumber,$Reason,$CreatedBy,$CreatedDate,$Status)
{
    $sql = "INSERT INTO admission(patient_id, doctorid_01,doctorid_02,doctorid_03,admission_date, ward,room_number,bed_number,reason,adm_created_by,adm_created_date,adm_status)
    VALUES($PatientId,$DoctorId1,'$DoctorId2','$DoctorId3','$AdmissionDate','$Ward','$RoomNumber','$BedNumber','$Reason','$CreatedBy','$CreatedDate','$Status')";
    run_qury_only($sql) ; 
}
function add_Hospital($name,$code, $address, $contact,$email,$website,$status, $CreatedBy,$CreatedDate)
{
    $sql = "INSERT INTO hospital_detail(hospital_name,hospital_code, hospital_address, hospital_contact_number, hospital_email, hospital_website, hospital_status, hospital_created_by, hospital_created_date)
    VALUES('$name', '$code','$address', '$contact','$email','$website','$status', '$CreatedBy','$CreatedDate')";
    run_qury_only($sql) ; 
}
function add_DoctorSchedule($drid,$schedule_day,$TimeFrome,$TimeTo,$status, $CreatedBy,$CreatedDate)
{
    $sql = "INSERT INTO doctor_schedule(doctor_id, drSched_day,drSched_start_time,drSched_end_time,drSched_status,drSched_created_by,drSched_created_date)
    VALUES($drid,'$schedule_day','$TimeFrome','$TimeTo','$status', '$CreatedBy','$CreatedDate')";
    run_qury_only($sql) ; 
}
function Add_Visitor($_DoctorId, $_PatientId, $_VisitDate, $_visit_symptoms, $_visit_diagnosis,$status, $_CreatedBy, $_CreatedDate)
{
    $sql = "INSERT INTO visit_log(doctor_id,patient_id,visit_date,visit_symptoms,visit_diagnosis,visit_status,visit_created_by,visit_created_date)
    VALUES($_DoctorId, $_PatientId, '$_VisitDate',' $_visit_symptoms','$_visit_diagnosis','$status','$_CreatedBy','$_CreatedDate')";
    run_qury_only($sql) ;  
}
function add_Doctor($first_name, $last_name, $specialty, $contact_number, $email, $address, $gender, $dnic, $image, $license_number, $credentials, $years_of_experience,$DrStatus, $CreatedBy, $CreatedDate)
{
    $sql = "INSERT INTO doctor(dr_first_name,dr_last_name,dr_specialty,dr_contact,dr_email,dr_address,dr_gender,dr_nic,dr_pic,dr_license_num,dr_credentials,dr_experience,dr_status,dr_created_by,dr_created_date)
    VALUES('$first_name', '$last_name', '$specialty', '$contact_number', '$email', '$address', '$gender', '$dnic', '$image', '$license_number', '$credentials', $years_of_experience, '$DrStatus' ,'$CreatedBy','$CreatedDate')";
     run_qury_only($sql) ;  
}
function Add_Patient($hid, $first_name, $last_name,$pnic,$date_of_birth, $gender, $contact_number,$Email,$emergency_phone,$emergency_contact_person, $translator,$translator_phone,$PermanentAddress,$CurrentAddress, $PrivateCorporate,$marital_status,$nationality,$allergies, $code_blue,$doctor_ref,$status,$CreatedBy,$CreatedDate)
{
    $sql = "INSERT INTO patient(hospital_id,patient_first_name,patient_last_name,patient_nic,patient_dob,patient_gender,patient_contact,patient_email,patient_address_permanent,patient_address_current,patient_private_corporate,patient_emergency_contact,patient_emergency_phone,patient_translator,patient_translator_phone,patient_marital_status,patient_nationality,patient_allergies,patient_code_blue,patient_doctor_ref,patient_status,patient_created_by,patient_created_date)
    VALUES($hid, '$first_name', '$last_name','$pnic','$date_of_birth','$gender', '$contact_number','$Email', '$PermanentAddress', '$CurrentAddress', '$PrivateCorporate', '$emergency_contact_person', '$emergency_phone','$translator','$translator_phone','$marital_status', '$nationality', '$allergies', '$code_blue' , '$doctor_ref','$status', '$CreatedBy','$CreatedDate')";
    run_qury_only($sql) ;  
}
function Update_Patients($pid,$hid, $first_name, $last_name,$date_of_birth, $gender, $contact_number,$Email, $PermanentAddress, $CurrentAddress, $PrivateCorporate, $marital_status, $nationality, $allergies, $emergency_contact_person, $emergency_phone, $translator, $translator_phone, $code_blue, $doctor_ref,$status, $ModifiedBy, $ModifiedDate)
{
    $qry = "UPDATE patient SET 
    hospital_id = $hid,
    patient_first_name='$first_name',
    patient_last_name='$last_name',
    patient_dob='$date_of_birth',
    patient_gender='$gender',
    patient_contact='$contact_number',
    patient_email='$Email',
    patient_address_permanent = '$PermanentAddress',
    patient_address_current = '$CurrentAddress',
    patient_private_corporate ='$PrivateCorporate',   
    patient_marital_status='$marital_status',
    patient_nationality='$nationality',
    patient_allergies='$allergies',
    patient_emergency_contact='$emergency_contact_person',
    patient_emergency_phone='$emergency_phone',
    patient_translator='$translator',
    patient_translator_phone='$translator_phone',
    patient_code_blue='$code_blue',
    patient_doctor_ref='$doctor_ref',
    patient_status = '$status',
    patient_modified_by='$ModifiedBy',
    patient_modified_date='$ModifiedDate'
    WHERE patient_id = $pid";
    run_qury_only($qry);
}
function del_PurchaseOrderItems($piid)
{
    $qry = "DELETE FROM purchase WHERE purchase_id=$piid";
    run_qury_only($qry);
}
function Run_Insert_Query($sql)
{
    try {
        $cn1 = conn();
        $last_id = 0;
        if (mysqli_query($cn1, $sql)) {
            $last_id = mysqli_insert_id($cn1);
        }
        return $last_id;
    } catch (Exception $e) {
        $data = 'Message: ' . $e->getMessage() . " Please check";
        return $data;
    }

}
function run_qury_only_Error($sql)
{
    try {
        $cn1 = conn();
        mysqli_query($cn1, $sql);

    } catch (Exception $e) {
        $data = 'Message: ' . $e->getMessage() . " Please check";
        return $data;
    }

}
function run_qury_only($sql)
{
    $cn1 = conn();
    mysqli_query($cn1, $sql);
}
function run_qury($sql)
{
    $cn1 = conn();
    $rs = mysqli_query($cn1, $sql);
    $data = array();
    while ($row = mysqli_fetch_assoc($rs)) {
        $data[] = $row;
    }
    return $data;
}