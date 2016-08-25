<?php

namespace humhub\modules\extendedtags\models\forms;

use Yii;
use yii\validators;

/**
 * Form model for removing tags from user
 *
 * @package modules\extendedtags\models\forms
 */
class TakeSurvey extends \yii\base\Model
{
    public $goal;
    public $propertyType;
    public $minBedrooms;
    public $maxBedrooms;
    public $bathrooms;
    public $carSpaces;
    //public $minPrice;
    //public $maxPrice;
    public $buildFactors;
    public $econFactors;

    public function rules()
    {
        return array(
            array('goal', 'string'),
            array('propertyType', 'string'),
            array('minBedrooms', 'string'),
            array('maxBedrooms', 'string'),
            array('bathrooms', 'string'),
            array('carSpaces', 'string'),
            //array('minPrice', 'string'),
            //array('maxPrice', 'string'),
            array_flip(array('buildFactors', 'checkArray')),
            array('econFactors', 'checkArray'),
        );
    }

    public function checkArray($attribute, $params){
        if (!is_array($this->$attribute)) {
            $this->addError($attribute, 'Not an array.');
        }

        // TODO: I don't believe this actually works
        if ($this->$attribute == "") {
            $this->addError($attribute, 'At least one item must be selected.');
        }
    }

    public function outputPrefs(){
        return $this->buildFactors;
    }
}