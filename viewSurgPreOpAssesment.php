<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");
if (!isset($_GET['POASSID'])) {
    header("location:index.php");
}
$PreOpAssesment = Get_Pre_Op_Assesment_ByID($_GET['POASSID']);
//print_r($PreOpAssesment);
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
    <style>

    </style>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script>
        $(window).on('load', function() {
            $(".se-pre-con").fadeOut("slow");
            <?php if (isset($_GET['err']) == 1) { ?>
                $('#myModal').modal('show');
            <?php } ?>
        });

        function yesnoFun() {
            var yesno = confirm("Click OK to delete this record");
            return yesno;
        }
    </script>
</head>

<body>
    <div class="se-pre-con"></div>
    <?php include "Header.php"; ?>
    <div class="container-fluid bg-light pt-3 pb-3 mt-0 mb-3 drPage">
        <div class="p-5">
            <h2 class="text-center text-white black-text-shadow">SURGERY</h2>
            <h3 class="text-center text-white black-text-shadow">Pre OP Assesment</h3>
        </div>
    </div>
    <div class="container">
        <div class="row mb-1">
            <div class="col">
                <h5>Pre OP Assesment Detail</h5>
            </div>
            <div class="col text-end">
                <a class="btn btn-primary btn-sm mb-2" href="surg_pre_op_assessment.php">View All</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table align="center" class="PrintAble table table-bordered border-secondary bg-light">

                        <tr>
                            <td>Id</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_assid'] ?></td>
                            <td>Admission Id</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['admission_id'] ?></td>
                        </tr>
                        <tr>
                            <td>Anaeshesologist</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['doctor_id_anaeshesologist'] ?></td>
                            <td>Surgeon</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['doctor_id_surgeon'] ?></td>
                        </tr>
                        <tr>
                            <td>Diagnosis</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_diagnosis'] ?></td>
                            <td>Surgery Date</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_surgery_date'] ?></td>
                        </tr>
                        <tr>
                            <td>Classification</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_asa_classification'] ?></td>
                            <td>Mets</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_mets'] ?></td>
                        </tr>
                        <tr>
                            <td>CVS Hr</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_cvs_hr'] ?></td>
                            <td>cvs Hypertension</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_cvs_hypertension'] ?></td>
                        </tr>
                        <tr>
                            <td>CVS Cong Defects</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_cvs_cong_defects'] ?></td>
                            <td>CVS BP</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_cvs_bp'] ?></td>
                        </tr>
                        <tr>
                            <td>CVS Temp</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_cvs_temp'] ?></td>
                            <td>CVS ML</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_cvs_ml'] ?></td>
                        </tr>
                        <tr>
                            <td>CVS Angina</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_cvs_angina'] ?></td>
                            <td>CVS CCF</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_cvs_ccf'] ?></td>
                        </tr>
                        <tr>
                            <td>CBVS NPO Time</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_cbvs_npo_time'] ?></td>
                            <td>CVS Orthoponea</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_cvs_orthoponea'] ?></td>
                        </tr>
                        <tr>
                            <td>CVS Anaemia</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_cvs_anaemia'] ?></td>
                            <td>CVS Edema</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['cvs_edema'] ?></td>
                        </tr>
                        <tr>
                            <td>Resp Dyspnoea</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_resp_dyspnoea'] ?></td>
                            <td>Resp Cough</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_resp_cough'] ?></td>
                        </tr>
                        <tr>
                            <td>Resp Cyanosis</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_resp_cyanosis'] ?></td>
                            <td>Resp Sputum</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_resp_sputum'] ?></td>
                        </tr>
                        <tr>
                            <td>Resp Smoking</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_resp_smoking'] ?></td>
                            <td>Resp Tuberculosis</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_resp_tuberculosis'] ?></td>
                        </tr>
                        <tr>
                            <td>Resp Asthma</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_resp_asthma'] ?></td>
                            <td>Resp Copd</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_resp_copd'] ?></td>
                        </tr>
                        <tr>
                            <td>Resp Uri</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_resp_uri'] ?></td>
                            <td>Resp Stridor</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_resp_stridor'] ?></td>
                        </tr>
                        <tr>
                            <td>Resp Haemoptysis</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_resp_haemoptysis'] ?></td>
                            <td>Renal</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_renal'] ?></td>
                        </tr>
                        <tr>
                            <td>Hepatic</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_hepatic'] ?></td>
                            <td>CNS</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_cns'] ?></td>
                        </tr>
                        <tr>
                            <td>Coag Problems</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_coag_problems'] ?></td>
                            <td>Allergies</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_allergies'] ?></td>
                        </tr>
                        <tr>
                            <td>Family History</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_family_history'] ?></td>
                            <td>Thyroid</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_thyroid'] ?></td>
                        </tr>
                        <tr>
                            <td>Diabetes</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['diabetes'] ?></td>
                            <td>Current Medication / Conc Disease Consultation</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_current_medication_conc_disease_consultation'] ?></td>
                        </tr>
                        <tr>
                            <td>ECG</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_ecg'] ?></td>
                            <td>HB HCT</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_hb_hct'] ?></td>
                        </tr>
                        <tr>
                            <td>NA</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_na'] ?></td>
                            <td>K</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_k'] ?></td>
                        </tr>
                        <tr>
                            <td>CL</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_cl'] ?></td>
                            <td>HCO3</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_hco3'] ?></td>
                        </tr>
                        <tr>
                            <td>Cxr</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_cxr'] ?></td>
                            <td>Pit</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_pit'] ?></td>
                        </tr>
                        <tr>
                            <td>FBS RBS</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_fbs_rbs'] ?></td>
                            <td>Bun</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_bun'] ?></td>
                        </tr>
                        <tr>
                            <td>CR</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_cr'] ?></td>
                            <td>Anaesthetic History</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_anaesthetic_history'] ?></td>
                        </tr>
                        <tr>
                            <td>Ausculation</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_ausculation'] ?></td>
                            <td>AA Teeth</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_aa_teeth'] ?></td>
                        </tr>
                        <tr>
                            <td>Dentures</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_aa_dentures'] ?></td>
                            <td>Neck Movement</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_aa_neck_movement'] ?></td>
                        </tr>
                        <tr>
                            <td>AA Jaw Movement</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_aa_jaw_movement'] ?></td>
                            <td>Mallampatti</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_mallampatti'] ?></td>
                        </tr>
                        <tr>
                            <td>Operative Orders</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_operative_orders'] ?></td>
                            <td>Miscellaneous</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_miscellaneous'] ?></td>
                        </tr>
                        <tr>
                            <td>Anaesthesia Plan</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_anaesthesia_plan'] ?></td>
                            <td>Status</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_status'] ?></td>
                        </tr>
                        <tr>
                            <td>Created By</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_created_by'] ?></td>
                            <td>Created Date</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_created_date'] ?></td>
                        </tr>
                        <tr>
                            <td>Modified By</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_modified_by'] ?></td>
                            <td>Modified Date</td>
                            <td class="fw-bold"><?php echo $PreOpAssesment[0]['pre_op_modified_date'] ?></td>
                        </tr>
                    </table>
                    <div>
                        <form action="EditDellPreAssement.php" method="post">
                            <input type="hidden" name="PreAssesmentID" value="<?php echo $PreAssesment[0]['pre_assessment_id'] ?>">
                            <input type="button" value="Print" class="btn btn-primary btn-sm" onclick="printTable()">
                            <input type="submit" name="EditBtn" value="Edit" class="btn btn-primary btn-sm">
                            <input type="submit" name="DelBtn" value="Delete" onClick="return yesnoFun()" class="btn btn-danger btn-sm">
                        </form>
                    </div>
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
                            table { width: 90%; border-collapse: collapse; }
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