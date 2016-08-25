<?php
/**
 * Created by PhpStorm.
 * User: liam
 * Date: 26/04/16
 * Time: 10:28 AM
 */

namespace humhub\modules\extendedtags\models;


class SurveyPreferences
{
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function getBathrooms(){
        return $this->model->bathrooms;
    }
}