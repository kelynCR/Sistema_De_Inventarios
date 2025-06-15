<?php

class ControladorCategorias {

	static public function ctrCrearCategorias() {

		if (isset($_POST['nombrecategoria'])) {

			$tabla = "categorias";
			$datos = ['nombre' => $_POST['nombrecategoria']];

			$respuesta = ModeloCategorias::mdlGuardarCategorias($tabla, $datos);

			if ($respuesta == "ok") {
				echo '<script>
					swal({
						type: "success",
						title: "La categoría ha sido registrada correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if (result.value) {
							window.location = "categorias";
						}
					});
				</script>';
			} else {
				echo '<script>
					swal({
						type: "error",
						title: "La categoría no pudo ser registrada",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if (result.value) {
							window.location = "categorias";
						}
					});
				</script>';
			}
		}
	}

	static public function ctrMostrarCategorias($item, $valor) {
		$tabla = "categorias";
		return ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);
	}

	static public function ctrEditarCategorias() {
		if (isset($_POST['editarCategoria'])) {

			$tabla = "categorias";
			$datos = [
				'idCategoria' => $_POST['idCategoria'],
				'nombre' => $_POST['editarCategoria']
			];

			$respuesta = ModeloCategorias::mdlEditarCategorias($tabla, $datos);

			if ($respuesta == "ok") {
				echo '<script>
					swal({
						type: "success",
						title: "La categoría ha sido modificada correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if (result.value) {
							window.location = "categorias";
						}
					});
				</script>';
			} else {
				echo '<script>
					swal({
						type: "error",
						title: "La categoría no ha sido modificada",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if (result.value) {
							window.location = "categorias";
						}
					});
				</script>';
			}
		}
	}

	static public function ctrBorrarCategorias() {
		if (isset($_GET["idCategoria"])) {
			$tabla = "categorias";
			$datos = $_GET['idCategoria'];

			$respuesta = ModeloCategorias::mdlBorrarCategorias($tabla, $datos);

			if ($respuesta == "ok") {
				echo '<script>
					swal({
						type: "success",
						title: "La categoría ha sido eliminada correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if (result.value) {
							window.location = "categorias";
						}
					});
				</script>';
			} else {
				echo '<script>
					swal({
						type: "error",
						title: "La categoría no ha sido eliminada",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if (result.value) {
							window.location = "categorias";
						}
					});
				</script>';
			}
		}
	}
}
