<?php
// print_r($_FILES);
// die;
$action = $_REQUEST['action'];

if (!empty($action)) {
    require_once './partials/user.php';
    $obj = new User;
}

if ($action == 'adduser' && !empty($_POST)) {
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_mobile = $_POST['user_mobile'];
    $user_image = $_FILES['user_image'];
    
    $playerId = (!empty($_POST['userid'])) ? $_POST['userid'] : '';


    //file upload
    $imagename = '';
    if (!empty($user_image['name'])) {
        $imagename = $obj->uploadPhoto($user_image);
        $playerData = [
            'username' => $username,
            'user_email' => $user_email,
            'user_mobile' => $user_mobile,
            'user_image' => $imagename,
        ];
    }else{
        $playerData = [
            'username' => $username,
            'user_email' => $user_email,
            'user_mobile' => $user_mobile,
        ];
    }
    $playerId = $obj->add($playerData);

    if (!empty($playerId)) {
       $player = $obj->getRow('user_id', $playerId);
       echo json_encode($player);
       exit();
    }
}

?>