<?php
//include database configuration file
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName     = 'schoolli_schoolling1';
//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if($db->connect_error){
    die("Unable to connect database: " . $db->connect_error);
}

//get records from database
$query = $db->query("SELECT * FROM tbl_register ORDER BY id DESC");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "members_" . date('Y-m-d') . ".csv";
    //create a file pointer
    $f = fopen('php://memory', 'w');
    //set column headers
    $fields = array('ID', 'First Name','Last Name', 'Email', 'Phone', 'Requested Call', 'Requested Date');
    fputcsv($f, $fields, $delimiter);
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        $status = ($row['status'] == '1')?'Active':'Inactive';
        $lineData = array($row['id'], $row['first_name'],$row['last_name'], $row['email'], $row['phone'], $row['requestcall'], $row['requestdate']);
        fputcsv($f, $lineData, $delimiter);
    }
    //move back to beginning of file
    fseek($f, 0);
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>