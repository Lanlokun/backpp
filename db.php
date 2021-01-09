<?php

$db_server = 'localhost';
$db_username = 'malik';
$db_password = '12345';
$db_name = 'outboost';


$db_conn = new mysqli($db_server, $db_username, $db_password, $db_name);

if ($db_conn->connect_error) {
    die("Connection failed: " . $db_conn->connect_error);
}

$db_insert = function ($sql) use ($db_conn) {
    
    if ($db_conn->query($sql) === TRUE)
        return $db_conn->insert_id;

    echo "Error: " . $sql . "<br>" . $db_conn->error;
    return NULL;
    
};

$db_update = function ($sql) use ($db_conn) {
    
    if ($db_conn->query($sql) === TRUE)
        //print_r($db_conn);
        return TRUE;

    echo "Error: " . $sql . "<br>" . $db_conn->error;
    return NULL;
    
};

$db_select = function ($sql) use ($db_conn) {
    
    $data = [];

    $result = $db_conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc())
            array_push($data, $row);
    }

    return $data;
    
};