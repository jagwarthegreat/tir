<?php
/* Core functions */
// edit only the sql query
//

function getSessionID(){
	$ses_id = $_SESSION['system']['userid'];
	
	return $ses_id;
}

function checkLoginStatus(){
	if (!isset($_SESSION['system']['userid'])){
		header("Location: app/system/login.php");
		exit;
	}
}

function clean($str) {
        $str = @trim($str);
        if(get_magic_quotes_gpc()) {
            $str = stripslashes($str);
        }
        return mysql_real_escape_string($str);
}

function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}

function createRandomPassword(){
		$chars = "003232303232023232023456789";
		srand((double)microtime()*1000000);
		$i = 0;
		$pass = '' ;
	while ($i <= 4) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
		return $pass;
}

function getonlineusers()
{
	$getUser = mysql_query("SELECT * FROM user WHERE online_stats = 1 ORDER BY alias ASC");
	while ($getRow = mysql_fetch_array($getUser)) {
		$data[] = array(
    		"user" => $getRow["alias"]
    	);
	}

	return $data;
}

/* end */
?>


