<?php


namespace humhub\modules\extendedtags\models\forms;

use Yii;

/**
 * @package humhub.modules.extendedtags.models.forms
 * @since 0.5
 */
class ImportTags extends \yii\base\Model {

    public $csv_file;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        /*return array(
            array('csv_file', 'file', 'types' => 'csv, xls', 'maxSize'=>5242880, 'allowEmpty' => true, 'wrongType'=>'Only .csv, .xls files are allowed.', 'tooLarge'=>'File too large! 5MB is the limit')
            // array('logo', 'file', 'types' => 'jpg, png, jpeg', 'maxSize' => 3 * 1024 * 1024, 'allowEmpty' => true),
        );*/
        return [
            [['cvs_file'], 'file'],
        ];
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels() {
        return array(
            // 'logo' => Yii::t('AdminModule.forms_BasicSettingsForm', 'Logo upload')
            'csv_file'=>'Upload CSV File',
        );
    }

}
