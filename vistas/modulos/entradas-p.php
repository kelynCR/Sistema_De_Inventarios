<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Tables
      <small>entradas de productos</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">entradas de productos</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
          <!-- puedes agregar botones o filtros aquí si lo deseas -->
          <a href="Reportes/reportesEntradas.php" class="btn btn-success">
            <i class="fa fa-file-excel-o"></i> Exportar a Excel
          </a>
        </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered table-striped tablas">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Código</th>
                  <th>Descripción</th>
                  <th>Entrada</th>
                  <th>Usuario</th>
                  <th>Fecha</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $item = null;
                  $valor = null;

                  $entrada = ControladorEntradas::ctrMostrarEntradas($item, $valor);

                  foreach ($entrada as $key => $valores) {
                    echo "
                      <tr>
                        <td>".$valores["idEntrada"]."</td>
                        <td>".$valores["codigo"]."</td>
                        <td>".$valores["descripcion"]."</td>
                        <td>".$valores["entrada"]."</td>
                        <td>".$valores["nombreusuario"]."</td>
                        <td>".$valores["fecha"]."</td>
                      </tr>
                    ";
                  }
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
