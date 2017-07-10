<?php

namespace frontend\controllers;

use Yii;
use app\models\exceed;
use frontend\models\exceedSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExceedController implements the CRUD actions for exceed model.
 */
class ExceedController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all exceed models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new exceedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionToexcel()
    {
        $session = \Yii::$app->session;
        $datas=$session->get('dataobj');
        $objectPHPExcel = new \PHPExcel();
        $objectPHPExcel->setActiveSheetIndex(0);
        $objectPHPExcel->getActiveSheet()->SetCellValue('A1', '日期');
        $objectPHPExcel->getActiveSheet()->SetCellValue('B1', '地市');
        $objectPHPExcel->getActiveSheet()->SetCellValue('C1', '设备类型');
        $objectPHPExcel->getActiveSheet()->SetCellValue('D1', '网元名称');
        $objectPHPExcel->getActiveSheet()->SetCellValue('E1', '告警量');
        $i=1;
        foreach ($datas as $data) {
            $i = $i+1;
            $objectPHPExcel->getActiveSheet()->SetCellValue('A'.$i, $data->date);
            $objectPHPExcel->getActiveSheet()->SetCellValue('B'.$i, $data->city);
            $objectPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $data->major);
            $objectPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $data->name);
            $objectPHPExcel->getActiveSheet()->SetCellValue('E'.$i, $data->ca_nums);
        }
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename="'.'数据导出.xlsx"');
        $objWriter = \ PHPExcel_IOFactory::createWriter($objectPHPExcel, 'Excel2007');
        $objWriter->save('php://output');


    }
    /**
     * Displays a single exceed model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionSearch()
    {
        $searchModel = new exceedSearch();
        return $this->render('search',['model' => $searchModel]);
    }
    /**
     * Creates a new exceed model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new exceed();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing exceed model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing exceed model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the exceed model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return exceed the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = exceed::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
