<?php
if (isset($_POST['main_category_id'])) {
    $main_category_id = intval($_POST['main_category_id']);

    include("incl/config.php");
    include("incl/functions.php");
    
    $result = Get_Lab_Test_sub_Type_ByLabTestTypeID($main_category_id);
// print_r($result);
    // Generate options for the subcategory dropdown
    echo "<option value=''>Select Sub Category</option>";
    foreach($result as $row){
        echo "<option value='" . $row['lab_test_sub_type_id'] . "'>" . $row['lab_test_sub_type_name'] . "</option>";
    }
}
?>
