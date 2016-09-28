<?php
namespace humhub\modules\extendedtags\models;
use yii\db\ActiveRecord;

class Tag extends ActiveRecord
{
    private $tag;

    /**
    ** @return string the name of the table associated with this ActiveRecord class.
    **/
    public static function tableName()
    {
        return 'extended_tags';
    }

}
