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

$r = $ipa->user()->find();

foreach ($r as $key) {
	$ci = trim($key->employeenumber[0]);
	if ($key->nsaccountlock != 1) {
		if (isset($ci) and is_numeric($ci)) {
			if ($key->uid[0] != 'sflores') {
				if ($key->uid[0] != 'rcfernandez') {
					if ($key->uid[0] != 'mpuglia') {
						if ($key->uid[0] != 'mfernandez') {
							if ($key->uid[0] != 'gurribarri') {
								

									/*$new_user_data = array(
										'uid'          => $key->uid[0],
									);
									$data_change_pass = array(
										'userpassword' => $ci,
									);
									echo"Cambio de contraseña para el usuario {$new_user_data['uid']} a {$data_change_pass['userpassword']} ";
									try {
										$change_pass = $ipa->user()->modify($new_user_data['uid'], $data_change_pass);
										if ($change_pass) {
											echo 'Exitosa!!<br>';
										} else {
											echo '¡¡¡¡ERROR!!!!!!!';
										}
									} catch (\Exception $e) {
										echo"[change password] Message: {$e->getMessage()} Code: {$e->getCode()}";
										die();
									}*/


							}
							
						}
					}
				}
			}
			
		}
	}
}

/*$new_user_data = array(
	'uid'          => "pruebadev",
);
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
