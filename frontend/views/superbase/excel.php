<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\superbase;

$objectPHPExcel = new PHPExcel();
$objectPHPExcel->setActiveSheetIndex(0);
$datas = superbase::find()->all();
$objectPHPExcel->getActiveSheet()->SetCellValue('A1', '地市');
$objectPHPExcel->getActiveSheet()->SetCellValue('B1', '县区');
$objectPHPExcel->getActiveSheet()->SetCellValue('C1', '基站名称');
$objectPHPExcel->getActiveSheet()->SetCellValue('D1', '厂家');
$i=1;
foreach ($datas as $data) {
    $i = $i+1;
    $objectPHPExcel->getActiveSheet()->SetCellValue('A'.$i, $data->city);
    $objectPHPExcel->getActiveSheet()->SetCellValue('B'.$i, $data->area);
    $objectPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $data->name);
    $objectPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $data->manu);
}
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition:attachment;filename="'.'信息导出-'.date("Y年m月j日").'.xls"');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
