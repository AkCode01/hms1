<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");
if (!isset($_GET['POASSMID'])) {
    header("location:index.php");
}
$PreAssesment_media = get_surge_pre_po_assesment_media_byID($_GET['POASSMID']);
// print_r($PreAssesment_media);
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
            <h2 class="text-center text-white black-text-shadow">Surgery</h2>
            <h3 class="text-center text-white black-text-shadow">Pre OP Assessment Media</h3>
        </div>
    </div>
    <div class="container">
        <div class="row mb-1">
            <div class="col">
                <h5>Pre OP Assesment Media Detail</h5>
            </div>
            <div class="col text-end">
                <a class="btn btn-primary btn-sm mb-2" href="surg_pre_op_assessment_media.php">View All</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">


                <div class="table-responsive">
                    <table align="center" class="PrintAble table table-bordered border-secondary bg-light">
<tr><td>pre_op_ass_media_id</td><td><?php echo $PreAssesment_media[0]['pre_op_ass_media_id'];?></td></tr>
<tr><td>pre_op_assid</td><td><?php echo $PreAssesment_media[0]['pre_op_assid'];?></td></tr>
<tr><td>pre_op_ass_media_url</td><td>
<?php
$video_url = $PreAssesment_media[0]['pre_op_ass_media_url'] ?? '';
if (strpos($video_url, 'youtube.com/watch') !== false || strpos($video_url, 'youtu.be') !== false) {
    // Convert the URL into an embeddable YouTube link
    if (strpos($video_url, 'youtube.com/watch') !== false) {
        parse_str(parse_url($video_url, PHP_URL_QUERY), $query_params);
        $video_id = $query_params['v'] ?? '';
    } elseif (strpos($video_url, 'youtu.be') !== false) {
        $video_id = basename(parse_url($video_url, PHP_URL_PATH));
    }
    $embed_url = "https://www.youtube.com/embed/" . htmlspecialchars($video_id, ENT_QUOTES, 'UTF-8');
} else {
    $embed_url = '';
}
?>
<iframe src="<?php echo $embed_url; ?>" frameborder="0" allowfullscreen></iframe>

</td></tr>
<tr><td>pre_op_ass_media_filename</td><td><img src="./images/SurgeryMedia/<?php echo $PreAssesment_media[0]['pre_op_ass_media_filename'];?>"</td></tr>
<tr><td>pre_op_ass_media_type</td><td><?php echo $PreAssesment_media[0]['pre_op_ass_media_type'];?></td></tr>
<tr><td>pre_op_ass_media_status</td><td><?php echo $PreAssesment_media[0]['pre_op_ass_media_status'];?></td></tr>
<tr><td>pre_op_ass_media_created_by</td><td><?php echo $PreAssesment_media[0]['pre_op_ass_media_created_by'];?></td></tr>
<tr><td>pre_op_ass_media_created_date</td><td><?php echo $PreAssesment_media[0]['pre_op_ass_media_created_date'];?></td></tr>
<tr><td>pre_op_ass_media_modified_by</td><td><?php echo $PreAssesment_media[0]['pre_op_ass_media_modified_by'];?></td></tr>
<tr><td>pre_op_ass_media_modified_date</td><td><?php echo $PreAssesment_media[0]['pre_op_ass_media_modified_date'];?></td></tr>
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