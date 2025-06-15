<?php
require_once "../modelos/conexion.php";
require_once "../vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

// Conexión
$pdo = Conexion::conectar();

// Consulta de las entradas
$stmt = $pdo->prepare("SELECT e.idEntrada, p.codigo, e.descripcion, e.entrada, e.fecha, u.usuario
                       FROM entradap e
                       JOIN productos p ON e.idProductos = p.idProductos
                       JOIN usuarios u ON e.idUsuario = u.idUsuario
                       ORDER BY e.fecha DESC");
$stmt->execute();
$entradas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Crear Excel
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Reporte Entradas');

// Estilo para los encabezados
$headerStyle = [
    'font' => [
        'bold' => true,
    ],
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => ['rgb' => 'ADD8E6'], // Un color azul claro de ejemplo
    ],
    'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_CENTER,
    ],
];

// Encabezados
$encabezados = ['IdProducto', 'Código', 'Descripción', 'Cantidad', 'Fecha', 'Usuario'];
$sheet->fromArray($encabezados, NULL, 'A1');

// Aplicar estilo a los encabezados
$sheet->getStyle('A1:F1')->applyFromArray($headerStyle);

// Ajustar el ancho de las columnas automáticamente
foreach (range('A', 'F') as $col) {
    $sheet->getColumnDimension($col)->setAutoSize(true);
}

// Agregar filas
$fila = 2;
foreach ($entradas as $entrada) {
    $sheet->setCellValue("A$fila", $entrada['idEntrada']);
    $sheet->setCellValue("C$fila", $entrada['codigo']);
    $sheet->setCellValue("D$fila", $entrada['descripcion']);
    $sheet->setCellValue("E$fila", $entrada['entrada']);
    $sheet->setCellValue("F$fila", $entrada['fecha']);
    $sheet->setCellValue("G$fila", $entrada['usuario']);
    $fila++;
}

// Aplicar filtros a las columnas
$sheet->setAutoFilter('A1:F1');

// Cabeceras de descarga
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="reporte_entradas.xlsx"');
header('Cache-Control: max-age=0');

// Descargar
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
?>
