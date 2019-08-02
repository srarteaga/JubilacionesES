<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class controladorLogin extends Controller
{
	public function login(Request $request) 
	{
		
		$user = request('user');
		$pass  = request('pass');
		require (__DIR__.'/freeipa/login.php' );
		/* REFERENCIA A LA TABLA DE BD DEL FREEIPA */
		$auth = $ipa->connection()->authenticate($user, $pass);

		if ($auth) {

				/* REFERENCIA A LA TABLA DE BD DE USERS EN POSTGRES (BD LOCALHOST) */
				$permiso = User::where('user', $user)->get();
				echo $permiso;
			if ($permiso != "[]") {

				$nombre  = $ipa->user()->findBy('uid', $user);
				$_SESSION['intervalo']  = 9999; //tiempo de vida de la sesión en minutos
				$_SESSION['inicio'] = time();
				$_SESSION['nombre'] = $nombre[0]->cn[0];
				$_SESSION['user'] = $user;
				$_SESSION['rol'] = $permiso[0]->rol;
				$_SESSION['id'] = $permiso[0]->id;
				


				return redirect('/home');

			} else {
				
				return back()->with('msj', '¡No tienes permiso para ingresar a este sistema!');
			}	

			} else {

		 		return back()->with('errormsj', 'Usuario o contraseña incorrectos');

			}	

	} 

	public function logout()
	{
			session_destroy(); 
			return redirect('/');
	}


	
}