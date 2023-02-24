<?php
$conn = mysqli_connect('localhost', 'root', '', 'web_mks2');
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
} else {
    echo "Database Connected successfully";
}

if (isset($_REQUEST['date']) && isset($_REQUEST['company']) && isset($_REQUEST['gate']) && isset($_REQUEST['class']) && isset($_REQUEST['traffic']) && isset($_REQUEST['source'])) {
    $sql = 'SELECT * FROM info_traffic WHERE date="' . $_REQUEST['date'] . '" AND company="' . $_REQUEST['company'] . '" AND gate="' . $_REQUEST['gate'] . '" AND class="' . $_REQUEST['class'] . '" AND source="' . $_REQUEST['source'] . '"';

    // $result = mysqli_query($conn, $sql);
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result)>0){
            $upd='UPDATE info_traffic SET traffic="' . $_REQUEST['traffic'] . '" WHERE date="' . $_REQUEST['date'] . '" AND company="' . $_REQUEST['company'] . '" AND gate="' . $_REQUEST['gate'] . '" AND class="' . $_REQUEST['class'] . '" AND source="' . $_REQUEST['source'] . '"';
            mysqli_query($conn, $upd);
        } else{
            $ins='INSERT INTO info_traffic (date, company, gate, class, traffic, source) VALUES ("' . $_REQUEST['date'] . '", "' . $_REQUEST['company'] . '", "' . $_REQUEST['gate'] . '", "' . $_REQUEST['class'] . '", "' . $_REQUEST['traffic'] . '", "' . $_REQUEST['source'] . '")';
            mysqli_query($conn, $ins);
        }
        
    } else {
        echo ("Error description: " . mysqli_error($conn));
    }
} else {
    echo "Please fill all the fields";
}