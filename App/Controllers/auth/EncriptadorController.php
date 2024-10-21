<?php
	
	namespace App\controllers\auth;
	
	class EncriptadorController
	{
		
		public function index(){
			require_once __DIR__ . '/../../../resources/views/auth/vw_encriptador.php';
		}
		public function encriptar(){
			
			if( isset( $_POST ) && isset( $_POST['password'] ) ) {
				$pass_encrip =password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 4]);
				require_once __DIR__ . '/../../../resources/views/auth/vw_encriptador.php';
			}
			
		}
	}