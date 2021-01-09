 <?php

include 'db.php'; 
session_start();

$app_name = "outboost";
$app_url = "/outboost";
$salt = "_43lklkj4343lk43lk43lkj43lkj4343";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$login = function($id) use ($app_url)  {
    $_SESSION['auth_time'] = time();
    $_SESSION['auth_id'] = $id;

    header('Location: '.$app_url."/admin");
};

$password_hash = function($password) use($salt)
{
    return md5($password.$salt);
};
$password_check = function($password, $hash) use($password_hash)
{
    return $password_hash($password) === $hash;
};

$get_app_title = function($page) use ($app_name) {
    return $app_name . " | " . $page;
};

$is_logged_in = function() {
    return  isset($_SESSION['auth_id']);
};

$kick_out_if_logged_in = function() use ($is_logged_in, $app_url) 
{
    if ($is_logged_in()) {
        header("Location: ".$app_url."/admin");
        exit();
    }

};

$kick_out_if_logged_out = function() use ($is_logged_in, $app_url) 
{
    if (!$is_logged_in()) {
        header("Location: ".$app_url."/admin/login.php");
        exit();
    }

};

$load_page = function($page) {
    header("Location: ".$page);
    exit();
};

$get_auth = function() use($db_select, $is_logged_in) {


    if ($is_logged_in()) {
        
        $id = $_SESSION['auth_id'];

        $data = $db_select(
            "SELECT * FROM users WHERE id='$id'"
        );

        return $data[0];
    }

};


$upload_img = function ($img)
{
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
        }     else {
                    echo "File is not an image.";
                    $uploadOk = 0;
        }
        }
};