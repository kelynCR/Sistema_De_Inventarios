<?php

require_once '../controladores/usuarios.controlador.php';
require_once '../modelos/usuarios.modelo.php';


class AjaxUsuarios{

	public $idUsuario;

	public function AjaxEditarUsuarios(){


		$item = "idUsuario";
		$valor = $this->idUsuario;


		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);

		echo json_encode($respuesta);


	}


}



if (isset($_POST["idUsuario"])) {


	$editar =  new AjaxUsuarios();
	$editar->idUsuario = $_POST['idUsuario'];
	$editar->AjaxEditarUsuarios();


	
}