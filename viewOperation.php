<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");
if (!isset($_GET['opid'])) {
    header("location:index.php");
}
$operation = Get_Surg_Operation_ByID($_GET['opid']);
//print_r($operation);
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
            <h3 class="text-center text-white black-text-shadow">Operation</h3>
        </div>
    </div>
    <div class="container">
        <div class="row mb-1">
            <div class="col">
                <h5>Surg Operation Detail</h5>
            </div>
            <div class="col text-end">
                <a class="btn btn-primary btn-sm mb-2" href="surg_operation.php">View All</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table align="center" class="PrintAble table table-bordered border-secondary bg-light">

                        <tr>
                            <td>Id</td>
                            <td class="fw-bold"><?php echo $operation[0]['surg_op_id'] ?></td>
                            <td>Admission Id</td>
                            <td class="fw-bold"><?php echo $operation[0]['admission_id'] ?></td>
                        </tr>
                        <tr>
                            <td>Operation Date</td>
                            <td class="fw-bold"><?php echo $operation[0]['surg_op_ot_date'] ?></td>
                            <td>Primary Consultant</td>
                            <td class="fw-bold"><?php echo $operation[0]['surg_op_primary_consultant'] ?></td>
                        </tr>
                        <tr>
                            <td>Ot Consultant</td>
                            <td class="fw-bold"><?php echo $operation[0]['surg_op_ot_consultant'] ?></td>
                            <td>Anaesthetist</td>
                            <td class="fw-bold"><?php echo $operation[0]['surg_op_anaesthetist'] ?></td>
                        </tr>
                        <tr>
                            <td>Operations</td>
                            <td class="fw-bold"><?php echo $operation[0]['surg_op_operations'] ?></td>
                            <td>Post of Remarks</td>
                            <td class="fw-bold"><?php echo $operation[0]['surg_op_post_of_remarks'] ?></td>
                        </tr>
                        <tr>
                            <td>Surgical Remarks</td>
                            <td class="fw-bold"><?php echo $operation[0]['surg_op_surgical_remarks'] ?></td>
                            <td>Status</td>
                            <td class="fw-bold"><?php echo $operation[0]['surg_op_status'] ?></td>
                        </tr>
                        <tr>
                            <td>Created By</td>
                            <td class="fw-bold"><?php echo $operation[0]['surg_op_created_by'] ?></td>
                            <td>Created Date</td>
                            <td class="fw-bold"><?php echo $operation[0]['surg_op_created_date'] ?></td>
                        </tr>
                        <tr>
                            <td>Modified By</td>
                            <td class="fw-bold"><?php echo $operation[0]['surg_op_modified_by'] ?></td>
                            <td>Modified Date</td>
                            <td class="fw-bold"><?php echo $operation[0]['surg_op_modified_date'] ?></td>
                        </tr>
                    </table>
                    <div>
                        <form action="EditDellOperation.php" method="post">
                            <input type="hidden" name="SurgOperationID" value="<?php echo $operation[0]['surg_op_id'];?>">
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
        function printTable(){
            const printableTable = document.querySelector('.PrintAble');
            if (printableTable) {
                const printWindow = window.open('', '', 'width=800,height=600');
                printWindow.document.write(`<html>
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
                </html>`);
                printWindow.document.close();
                printWindow.print();
                printWindow.close();
            } else {
                alert('No table found to print.');
            }
        }
    </script>
</body>

</html>