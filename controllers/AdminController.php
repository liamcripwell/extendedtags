<?php

namespace humhub\modules\extendedtags\controllers;

use humhub\modules\extendedtags\models\forms\TakeSurvey;
use yii;
use humhub\modules\extendedtags\models\forms\AddTags;
use humhub\modules\extendedtags\models\forms\RemoveTags;
use humhub\modules\extendedtags\models\forms\ImportTags;
use humhub\modules\extendedtags\models\SurveyPreferences;
use yii\helpers\Url;
use humhub\modules\user\models\User;

class AdminController extends \humhub\modules\admin\components\Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'acl' => [
                'class' => \humhub\components\behaviors\AccessControl::className(),
                'adminOnly' => true
            ]
        ];
    }

    /**
     * Configuration Action for Super Admins
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAdd()
    {
        $user = Yii::$app->user->getIdentity();
        $model = new AddTags();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if (!in_array($model->tag, $tags = explode(", ", $user->tags)) && $model->tag != "") {
                $user->tags = $user->tags . ", " . $model->tag;
                $user->save();
            } else{
                Yii::$app->getSession()->setFlash('error', "The entered tag already exists.");
            }

            // clears text field content
            $model = new AddTags();
        }

        return $this->render('add', Array('model' => $model));
    }

    public function actionRemove()
    {
        $user = Yii::$app->user->getIdentity();
        $model = new RemoveTags();

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->tags != ""){
            $newTagList = explode(", ", $user->tags);

            foreach ($model->tags as $toRemove) {
                unset($newTagList[$toRemove]);
            }

            $user->tags = implode(", ", $newTagList);
            $user->save();

            // deselects all checkbox items
            $model = new RemoveTags();
        }

        return $this->render('remove', Array('model' => $model));
    }

    public function actionSurvey()
    {
        $user = Yii::$app->user->getIdentity();
        $model = new TakeSurvey();

        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            $prefs = new SurveyPreferences($model);

            if ($prefs->getBathrooms() == 2){
                print_r($model->outputPrefs());
                exit();
            } else{
                print_r("bad");
                exit();
            }
        }

        return $this->render('survey', Array('model' => $model));
    }

    public function actionImport(){
        $form = new ImportTags();

        return $this->render('import', array(
            'model' => $form
        ));
    }

    public function actionUpload(){
        require_once(dirname(__FILE__) . "/../lib/parsecsv.lib.php");
        $csv = new \parseCSV();
        $model = new ImportTags();

        $validImports = array();

        if(isset($_POST['ImportTags']))
	    {

	        $model->attributes=$_POST['ImportTags'];
	        if(!empty($_FILES['ImportTags']['tmp_name']['csv_file']))
	        {

	            $file = \yii\web\UploadedFile::getInstance($model,'csv_file');
	            $group_id = 1;

				$csv->auto($file->tempName);

				foreach($csv->data as $data) {

    			    $importData = $data;

    			    $validImports[] = $importData;
                }

	        }

	    }

        return $this->render('import_complete', array(
            'validImports' => $validImports
        ));
    }
}
