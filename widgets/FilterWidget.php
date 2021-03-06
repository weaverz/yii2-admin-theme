<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2018/11/14
 * Time: 12:19
 */
namespace app\widgets;

use app\assets\FormAsset;
use app\widgets\models\FilterForm;
use Yii;
class FilterWidget extends \yii\base\Widget
{
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        FormAsset::register($this->getView());
    }

    public function run()
    {
        $model = new FilterForm();
        $model->date = date('Y-m-d',strtotime('-7 days')) . ' - ' . date('Y-m-d');
        if($model->load(Yii::$app->request->post())) {
            $model->join =  $model->join ? explode(',',$model->join) : null;
            $model->system = $model->system ? explode(',',$model->system) : null;
            $model->partner = $model->partner ? explode(',',$model->partner) : null;
            $model->platform = $model->platform ? explode(',',$model->platform) : null;
        }
        return $this->render('filter-widget',[
            'model' => $model
        ]);
    }
}