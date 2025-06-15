<?php

class ControladorLogin{



	static public function ctrIngresarUsuario(){


		if (isset($_POST["ingresoUsuario"])) {

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingresoUsuario"])){

				$encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG');


			$tabla = "usuarios";

			$item = "usuario";
			$valor = $_POST['ingresoUsuario'];

			$respuesta = ModeloLogin::mdlMostrarUsuarios($tabla,$item,$valor);

			if ($respuesta && isset($respuesta["usuario"], $respuesta["password"])) {
				
				if ($respuesta["usuario"] == $_POST["ingresoUsuario"] && $respuesta["password"] == $encriptar) {
					$_SESSION['iniciarSesion'] = "ok";
					$_SESSION["idUsuario"] = $respuesta["idUsuario"];
					$_SESSION["nombre"] = $respuesta["nombre"];
					$_SESSION["usuario"] = $respuesta["usuario"];
					$_SESSION["perfil"] = $respuesta["perfil"];
			
					echo '<script>window.location = "index.php";</script>';
				} else {
					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
				}
			
			} else {
				echo '<br><div class="alert alert-danger">Usuario no encontrado</div>';
			}
			







				
			}

			
		}


	}

}