<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

if (!isset($_GET['admid'])) {
    header("location:visit_log.php");
}
$doctors = get_doctors();

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
        $(window).on('load', function() {
            $(".se-pre-con").fadeOut("slow");
            <?php if (isset($_GET['err']) == 1) { ?>
                $('#myModal').modal('show');
            <?php } ?>
        });
        $(document).ready(function() {
            $("#ItemstTable tr").click(function() {
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
            <h2 class="text-center text-white black-text-shadow">SURGERY</h2>
            <h3 class="text-center text-white black-text-shadow">Pre Op Assesment</h3>
        </div>
    </div>
    <div class="container">
        <div class="row mb-1">
            <div class="col">
                <h5>Add New Record</h5>
            </div>
            <div class="col text-end">
                <a class="btn btn-primary btn-sm" href="admission.php">Admission</a>
                <a class="btn btn-primary btn-sm" href="patients.php">Patients</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="SaveNewData.php" method="post">
                    <div class="p-2">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-4">
                                <label for="AdmId" class="form-label">Admission ID</label>
                                <input type="text" name="AdmId" value="<?php echo $_GET['admid'] ?>" readonly class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="AnaeshesologistID" class="form-label">Anaeshesologist</label>
                                <select class="form-control form-select form-select-sm" name="AnaeshesologistID" required>
                                    <option disabled selected value="">Select Anaeshesologist</option>
                                    <?php foreach ($doctors as $doctor) { ?>
                                        <option value="<?php echo $doctor['doctor_id'] ?>"><?php echo $doctor['dr_first_name'] . " " . $doctor['dr_last_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="SurgeonID" class="form-label">Surgeon</label>
                                <select class="form-control form-select form-select-sm" name="SurgeonID" required>
                                    <option disabled selected value="">Select Surgeon</option>
                                    <?php foreach ($doctors as $doctor) { ?>
                                        <option value="<?php echo $doctor['doctor_id'] ?>"><?php echo $doctor['dr_first_name'] . " " . $doctor['dr_last_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="diagnosis" class="form-label">Diagnosis</label>
                                <input type="text" name="diagnosis" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="SurgeryDate" class="form-label">Surgery Date</label>
                                <input type="date" name="SurgeryDate" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="classification" class="form-label">Classification</label>
                                <select class="form-control form-select form-select-sm" name="classification">
                                    <option disabled selected value="">Select Classification</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_mets" class="form-label">Mets</label>
                                <select class="form-control form-select form-select-sm" name="pre_op_mets">
                                    <option disabled selected value="">Select Mets</option>
                                    <option value="<3">&lt;3</option>
                                    <option value="3-6">3-6</option>
                                    <option value=">6">&gt;6</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_cvs_hr" class="form-label">CVS HR</label>
                                <input type="text" name="pre_op_cvs_hr" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_cvs_hypertension" class="form-label">CVS Hypertension</label>
                                <input type="text" name="pre_op_cvs_hypertension" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_cvs_cong_defects" class="form-label">CVS Cong Defects</label>
                                <input type="text" name="pre_op_cvs_cong_defects" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_cvs_bp" class="form-label">CVS BP</label>
                                <input type="text" name="pre_op_cvs_bp" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_cvs_temp" class="form-label">CVS Temp</label>
                                <input type="text" name="pre_op_cvs_temp" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_cvs_ml" class="form-label">CVS ML</label>
                                <input type="text" name="pre_op_cvs_ml" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="angina" class="form-label">Angina</label>
                                <select class="form-control form-select form-select-sm" name="angina">
                                    <option disabled selected value="">Select Angina</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="II">III</option>
                                    <option value="IV">IV</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_cvs_ccf" class="form-label">CVS CCF</label>
                                <input type="text" name="pre_op_cvs_ccf" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_cbvs_npo_time" class="form-label">CBVS NPO Time</label>
                                <input type="text" name="pre_op_cbvs_npo_time" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_cvs_orthoponea" class="form-label">CVS Orthoponea</label>
                                <input type="text" name="pre_op_cvs_orthoponea" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_cvs_anaemia" class="form-label">CVS Anaemia</label>
                                <input type="text" name="pre_op_cvs_anaemia" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="cvs_edema" class="form-label">CVS Edema</label>
                                <input type="text" name="cvs_edema" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_resp_dyspnoea" class="form-label">Resp Dyspnoea</label>
                                <input type="text" name="pre_op_resp_dyspnoea" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_resp_cough" class="form-label">Resp Cough</label>
                                <input type="text" name="pre_op_resp_cough" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_resp_cyanosis" class="form-label">Resp Cyanosis</label>
                                <input type="text" name="pre_op_resp_cyanosis" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_resp_sputum" class="form-label">Resp Sputum</label>
                                <input type="text" name="pre_op_resp_sputum" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_resp_smoking" class="form-label">Resp Smoking</label>
                                <input type="text" name="pre_op_resp_smoking" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_resp_tuberculosis" class="form-label">Resp Tuberculosis</label>
                                <input type="text" name="pre_op_resp_tuberculosis" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_resp_asthma" class="form-label">Resp Asthma</label>
                                <input type="text" name="pre_op_resp_asthma" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_resp_copd" class="form-label">Resp Copd</label>
                                <input type="text" name="pre_op_resp_copd" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_resp_uri" class="form-label">Resp Uri</label>
                                <input type="text" name="pre_op_resp_uri" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_resp_stridor" class="form-label">Resp Stridor</label>
                                <input type="text" name="pre_op_resp_stridor" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_resp_haemoptysis" class="form-label">Resp Haemoptysis</label>
                                <input type="text" name="pre_op_resp_haemoptysis" class="form-control form-control-sm">
                            </div>

                            <div class="col-md-4">
                                <label for="pre_op_renal" class="form-label">Renal</label>
                                <input type="text" name="pre_op_renal" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_hepatic" class="form-label">Hepatic</label>
                                <input type="text" name="pre_op_hepatic" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_cns" class="form-label">Cns</label>
                                <input type="text" name="pre_op_cns" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_coag_problems" class="form-label">Coag Problems</label>
                                <input type="text" name="pre_op_coag_problems" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_allergies" class="form-label">Allergies</label>
                                <input type="text" name="pre_op_allergies" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_family_history" class="form-label">Family History</label>
                                <input type="text" name="pre_op_family_history" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_thyroid" class="form-label">Thyroid</label>
                                <input type="text" name="pre_op_thyroid" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="diabetes" class="form-label">Diabetes</label>
                                <input type="text" name="diabetes" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_current_medication_conc_disease_consultation" class="form-label">Current Medication / Disease Consultation</label>
                                <input type="text" name="pre_op_current_medication_conc_disease_consultation" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_ecg" class="form-label">Ecg</label>
                                <input type="text" name="pre_op_ecg" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_hb_hct" class="form-label">Hct</label>
                                <input type="text" name="pre_op_hb_hct" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_na" class="form-label">Na</label>
                                <input type="text" name="pre_op_na" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_k" class="form-label">K</label>
                                <input type="text" name="pre_op_k" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_cl" class="form-label">Cl</label>
                                <input type="text" name="pre_op_cl" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_hco3" class="form-label">HCO3</label>
                                <input type="text" name="pre_op_hco3" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_cxr" class="form-label">Cxr</label>
                                <input type="text" name="pre_op_cxr" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_pit" class="form-label">Pit</label>
                                <input type="text" name="pre_op_pit" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_fbs_rbs" class="form-label">Fbs Rbs</label>
                                <input type="text" name="pre_op_fbs_rbs" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_bun" class="form-label">Bun</label>
                                <input type="text" name="pre_op_bun" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_cr" class="form-label">CR</label>
                                <input type="text" name="pre_op_cr" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_anaesthetic_history" class="form-label">Anaesthetic History</label>
                                <input type="text" name="pre_op_anaesthetic_history" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_ausculation" class="form-label">Ausculation</label>
                                <input type="text" name="pre_op_ausculation" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_aa_teeth" class="form-label">Teeth</label>
                                <input type="text" name="pre_op_aa_teeth" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_aa_dentures" class="form-label">Dentures</label>
                                <input type="text" name="pre_op_aa_dentures" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_aa_neck_movement" class="form-label">Neck_movement</label>
                                <input type="text" name="pre_op_aa_neck_movement" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_aa_jaw_movement" class="form-label">Jaw Movement</label>
                                <input type="text" name="pre_op_aa_jaw_movement" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="mallampatti" class="form-label">Mallampatti</label>
                                <select class="form-control form-select form-select-sm" name="mallampatti">
                                    <option disabled selected value="">Select Mallampatti</option>
                                    <option value="Class I">Class I</option>
                                    <option value="Class II">Class II</option>
                                    <option value="Class III">Class III</option>
                                    <option value="Class IV">Class IV</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_operative_orders" class="form-label">Operative Orders</label>
                                <input type="text" name="pre_op_operative_orders" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="pre_op_miscellaneous" class="form-label">Miscellaneous</label>
                                <input type="text" name="pre_op_miscellaneous" class="form-control form-control-sm">
                            </div>


                            <div class="col-md-4">
                                <label for="anaesthesia" class="form-label">Anaesthesia</label>
                                <select class="form-control form-select form-select-sm" name="anaesthesia">
                                    <option disabled selected value="">Select Anaesthesia</option>
                                    <option value="G.A">G.A</option>
                                    <option value="MAC">MAC</option>
                                    <option value="Epi">Epi</option>
                                    <option value="SAB">SAB</option>
                                    <option value="PNB">PNB</option>
                                    <option value="Invasive Monitor">Invasive Monitor</option>
                                    <option value="Non Invasive Monitor">Non Invasive Monitor</option>
                                </select>
                                <input type="hidden" name="Status" value="1">
                                <input type="hidden" name="CreatedBy" value="<?php echo $_SESSION['logeduser'] ?>">
                            </div>
                        </div>
                        <div class="mt-3">
                            <input type="submit" name="AddSurgPreOpAssesment" value="Save" class="btn btn-primary btn-sm">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>