<?php 
/**
 * 
 * @package Login With Sngine
 * @author pvspike
 * @download https://github.com/pvspike/Login-With-Sngine
 */

require_once 'config.php';

$app_url = $SNGINE_URL;
$app_id = $SNGINE_APP_ID; // your app id
$app_secret = $SNGINE_APP_KEY; // your app secret
$auth_key = $_GET['auth_key']; // the returned auth key from previous step

$get = file_get_contents(''.$app_url.'/api/authorize?app_id='.$app_id.'&app_secret='.$app_secret.'&auth_key='.$auth_key.'');

$json = json_decode($get, true);
if(!empty($json['access_token'])) {
    $access_token = $json['access_token']; // your access token
}

if(!empty($json['access_token'])) {
   $access_token = $json['access_token']; // your access token
   $get2 = file_get_contents(''.$app_url.'/api/get_user_info?access_token='.$access_token.'');

    $decode = json_decode($get2);
    $get3 = $decode->user_info->user_name;
    $getEmail = $decode->user_info->user_email;
	
	$userSngine = $decode->user_info; //get user info 	
	//$userSngine = $service->userinfo->get(); //get user info 


	$oauthid = $userSngine->user_id;
	$f_name = $userSngine->user_firstname;
	$l_name = $userSngine->user_lastname;
	$email_id = $userSngine->user_email;
	$picture = ''.$app_url.'/content/uploads/'.$userSngine->user_picture;	
	$sql = "SELECT * FROM usersdata WHERE oauthid='".$userSngine->user_id."'";
	$result = $conn->query($sql);
	if ($result->num_rows == 1) {
	   $conn->query("update usersdata set f_name='".$f_name."', l_name='".$l_name."', email_id='".$email_id."', picture='".$picture."' where oauthid='".$oauthid."' ");
	} else {
		$conn->query("INSERT INTO usersdata (oauth_pro, oauthid, f_name, l_name, email_id, picture) VALUES ('".$oauthpro."', '".$oauthid."', '".$f_name."', '".$l_name."', '".$email_id."', '".$picture."')");  
	}
	$res = $conn->query($sql);
	$userData = $res->fetch_assoc();

	$_SESSION['userData'] = $userData;
	$_SESSION['message'] = ''.$lang['HELLO'].' '.$_SESSION['userData']['f_name'].' '.$_SESSION['userData']['l_name'].' !';
	header("Location: index.php");
	

} else {
	header("Location:/");
}


?>