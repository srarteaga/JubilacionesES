<?php
namespace App\Http\Controllers\freeipa;


require_once ('bootstrap.php');
$host        = 'freeipa.vicepresidencia.gob.ve';
$certificate = __DIR__ ."/certs/ipa.demo1.freeipa.org_ca.crt";
$ipa         = new \FreeIPA\APIAccess\Main($host, $certificate);
$user     = 'consultasdev';
$password = 'DesarrolloVp4321';
$auth     = $ipa->connection()->authenticate($user, $password);
		