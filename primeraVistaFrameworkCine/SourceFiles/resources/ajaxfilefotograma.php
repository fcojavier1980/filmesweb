
<?php
if (isset($_FILES['fileway2']['name'])) {

	move_uploaded_file($_FILES['fileway2']['tmp_name'], '../resources/images/'  . $_FILES['fileway2']['name']);

    $desired_dir = '../resources/images/';

    echo json_encode(array("filename" => $_FILES['fileway2']['name'],"filenametmp" => $desired_dir . "".basename($_FILES['fileway2']['tmp_name'])));
}
else {
    echo 'Please choose a file';
}
//var_dump($_FILES['fileway']);

//$prim = array_shift($_FILES['fileway1']);
//print_r($prim);

?>