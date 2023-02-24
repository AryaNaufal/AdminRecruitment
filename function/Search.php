<?php
include '../config.php';
if(isset($_POST['submit'])) {
    // define the list of fields
    $fields = array('nama', 'posisi', 'lulus', 'status', 'noTelp', 'tipe');
    $conditions = array();

    // loop through the defined fields
    foreach($fields as $field){
        // if the field is set and not empty
        if(isset($_POST[$field]) && $_POST[$field] != '') {
            // create a new condition while escaping the value inputed by the user (SQL Injection)
            $conditions[] = "`$field` LIKE '%" . mysqli_real_escape_string($conn, $_POST[$field]) . "%'";
        }
    }

    // builds the query
    $query = "SELECT * FROM cv ";
    // if there are conditions defined
    if(count($conditions) > 0) {
        // append the conditions
        $query .= "WHERE " . implode (' AND ', $conditions); // you can change to 'OR', but I suggest to apply the filters cumulative
    }

    $result = mysqli_query($conn, $query);
  }