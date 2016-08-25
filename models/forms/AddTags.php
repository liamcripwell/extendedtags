<?php

namespace humhub\modules\extendedtags\models\forms;

use Yii;

/**
 * Form model for adding tags to user
 *
 * @package modules\extendedtags\models\forms
 */
class AddTags extends \yii\base\Model
{
    public $tag;

    public function rules()
    {
        return array(
            ['tag', 'string', 'max' => 15]
        );
    }
}