
<?php
if (isset($_FILES['fileway1']['name'])) {

	move_uploaded_file($_FILES['fileway1']['tmp_name'], '../resources/images/'  . $_FILES['fileway1']['name']);

    $desired_dir = '../resources/images/';

    echo json_encode(array("filename" => $_FILES['fileway1']['name'],"filenametmp" => $desired_dir . "".basename($_FILES['fileway1']['tmp_name'])));
}
else {
    echo 'Please choose a file';
}
//var_dump($_FILES['fileway']);

//$prim = array_shift($_FILES['fileway1']);
//print_r($prim);

?>