<?php

namespace App\Utilitarios;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel
{
    public static function GenerarArchivoExcel(Request $request)
    {
        $data = $request->input('table_data');
        $nombre_archivo = $request->input('NombreArchivo');
        $ListaHeaders = $request->input('ListaHeaders');
        $NombreTitulo = $request->input('NombreTitulo');
        $archivo = "";
        try {
            $styleArray = [
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ],
                ],
                'font' => array(
                    'name'      =>  'Calibri',
                    'size'      =>  12,
                    'color' => ['argb' => 'FFFFFF'],
                )
            ];
            $styleArrayTitulo = [
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ],
                ],
                'font' => array(
                    'name'      =>  'Calibri',
                    'size'      =>  12,
                    'color' => ['argb' => 'ffffff'],
                )
            ];
            $styleArrayDetalle = [
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ],
                ],
                'font' => array(
                    'name'      =>  'Calibri',
                    'size'      =>  12,
                    'color' => ['argb' => '000000'],
                )
            ];
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $header = $ListaHeaders;
            $arrayKeys = array_keys($data[0]);
            $columns = ['B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
            $ultima_fila = "";
            $sheet->setTitle($nombre_archivo);
            //Cabeceras
            for ($i = 0; $i < count($header); $i++) {
                $sheet->setCellValue($columns[$i] . '3', ucwords($header[$i]))->getColumnDimension($columns[$i])->setAutoSize(true);
                $valor = $columns[$i] . '3';
                $sheet->getStyle($valor)->applyFromArray($styleArray);
                $sheet->getStyle($valor)->getAlignment()->setHorizontal('center');
                $sheet->getStyle($valor)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('2196F3');
                $ultima_fila = $columns[$i];
            }
            $fila = 4;
            //Cuerpo Columnas Data
            for ($x = 0; $x < count($data); $x++) {
                for ($i = 0; $i < count($arrayKeys); $i++) {
                    $sheet->setCellValue($columns[$i] . $fila, $data[$x][$arrayKeys[$i]]);
                    $valor = $columns[$i] . $fila;
                    $sheet->getStyle($valor)->applyFromArray($styleArrayDetalle);
                    $sheet->getStyle($valor)->getAlignment()->setHorizontal('left');
                    $sheet->getStyle($valor)->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('ffffff');
                }
                $fila++;
            }
            $sheet->mergeCells('B2:' . $ultima_fila . '2')->setCellValue('B2', $nombre_archivo . ' ' . $NombreTitulo); //->getColumnDimension('B1')->setAutoSize(true);
            $sheet->getStyle('B2:' . $ultima_fila . '2')->applyFromArray($styleArrayTitulo);
            $sheet->getStyle('B2')->getAlignment()->setHorizontal('center');
            $sheet->getStyle('B2')->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('2196F3');
            $archivo = "Excels/" . $nombre_archivo . '_' . time() . '.xlsx';
            $writer = new Xlsx($spreadsheet);
            $writer->save($archivo);
        } catch (Exception $e) {
        }

        return $archivo;
    }
}
