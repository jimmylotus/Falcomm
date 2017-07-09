<?php

namespace frontend\controllers;
use Yii;
use app\models\superbase;
use frontend\models\SuperbaseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SuperbaseController implements the CRUD actions for superbase model.
 */
class SuperbaseController extends Controller
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
     * Lists all superbase models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SuperbaseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionExcel()
    {

        $objectPHPExcel = new \PHPExcel();
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
        header('Content-Disposition:attachment;filename="'.'信息导出-'.date("Y年m月j日").'.xlsx"');
        $objWriter = \ PHPExcel_IOFactory::createWriter($objectPHPExcel, 'Excel2007');
        $objWriter->save('php://output');

        /*$searchModel = new SuperbaseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/
    }


    /**
     * Displays a single superbase model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new superbase model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new superbase();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing superbase model.
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
     * Deletes an existing superbase model.
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
     * Finds the superbase model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return superbase the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = superbase::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
