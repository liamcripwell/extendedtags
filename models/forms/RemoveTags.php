<?php

namespace humhub\modules\extendedtags\models\forms;

use Yii;
use yii\validators;

/**
 * Form model for removing tags from user
 *
 * @package modules\extendedtags\models\forms
 */
class RemoveTags extends \yii\base\Model
{
    public $tags;

    public function rules()
    {
        return array(
            array('tags', 'checkArray'),
        );
    }

    public function checkArray($attribute, $params){
        if (!is_array($this->$attribute)) {
            $this->addError($attribute, 'Not an array.');
        }

        if ($this->$attribute == "") {
            $this->addError($attribute, 'At least one tag must be selected for removal.');
        }
    }
}