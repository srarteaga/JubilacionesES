<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once ('../bootstrap.php');
$host        = 'freeipa.vicepresidencia.gob.ve';
$certificate = "../certs/ipa.demo1.freeipa.org_ca.crt";
$ipa         = new \FreeIPA\APIAccess\Main($host, $certificate);

$user     = 'sflores';
$password = 'Sam21282703.';
$auth     = $ipa->connection()->authenticate($user, $password);
if ($auth) {
	print'Logeado!';
} else {
	echo "NO ENTRASTE!!<p>";
	$auth_info = $ipa->connection()->getAuthenticationInfo();
	var_dump($auth_info);
	echo "<p>";
	echo $auth_info["message"];
}
$r = $ipa->user()->findBy('uid', 'jsanchez');
var_dump($r); 
//echo '<br>';
foreach ($r as $key) {
	echo $key->employeetype[0];
}
/*$new_user_data = array(
	/*'givenname'    => 'Richardi',
	'sn'           => 'Stallman',*/
//	'uid'          => "pruebadev",
	//'mail'         => "rms$random@fsf.org",
	//'userpassword' => '123456',
/*);
$data_change_pass = array(
	'userpassword' => 'Caracas2',
);
echo"Changing the password for user {$new_user_data['uid']} to {$data_change_pass['userpassword']}";
try {
	$change_pass = $ipa->user()->modify($new_user_data['uid'], $data_change_pass);
	if ($change_pass) {
		echo 'Password changed';
	} else {
		echo 'Error while changing the password';
	}
} catch (\Exception $e) {
	echo"[change password] Message: {$e->getMessage()} Code: {$e->getCode()}";
	die();
}*/





//$r = $ipa->user()->find();
//Datos de los empleados//
//=====================//
/*
$r = $ipa->user()->get('cliendo');
var_dump($r);
echo "<p>";
echo $r->employeenumber[0];
echo '<br>';
echo $r->givenname[0];
echo '<br>';
echo $r->sn[0];
echo '<br>';
echo $r->memberof_group[1];
echo '<br>';
echo "<p>";
*/
//======================//

//$cedula = $r->uid[0];
//echo $cedula;
//echo gettype($r);
//print $r[1]->uid[0];

/*$r = $ipa->user()->findBy('mail');
/*
if ($r) {
$t = count($r);
print"Found $t usuários. Names: ";
for ($i = 0; $i < $t; $i++) {
print$r[$i]->uid[0].' | ';
}
}*/
/*$n = 1;
foreach ($r as $s) {
	if ($s->nsaccountlock != 1) {
		if (isset($s->employeenumber[0]) and is_numeric($s->employeenumber[0]) ) {
			$cedula = $s->employeenumber[0];
			$serial = $s->employeenumber[0].$n;
			echo  $n.' '.$cedula.' '.$serial;
			$n++;
			echo '<br>';			
		}
	}
	
}*/