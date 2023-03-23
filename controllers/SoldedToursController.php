<?php

namespace app\controllers;

use app\models\SoldedTours;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SoldedToursController implements the CRUD actions for SoldedTours model.
 */
class SoldedToursController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['index', 'create', 'update', 'view', 'delete'],
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['index', 'create', 'update', 'view', 'delete'],
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all SoldedTours models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => SoldedTours::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'client_id' => SORT_DESC,
                    'tour_id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    protected function findModel($client_id, $tour_id)
    {
        if (($model = SoldedTours::findOne(['client_id' => $client_id, 'tour_id' => $tour_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
