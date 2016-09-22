<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use humhub\modules\extendedtags\models\Tags;
use \humhub\modules\user\models\User;
use humhub\compat\CHtml;
use yii\widgets\ActiveForm;
?>

<div class="panel panel-default">
    <div class="panel-heading"><strong>Manage Tags</strong></div>
    <div class="panel-body">
        <p>This module allows for extended management of user tags.</p>
        <hr/>
        <ul class="nav nav-pills">
            <li>
                <a href="<?php echo Url::toRoute('index'); ?>">Overview</a>
            </li>
            <li>
                <a href="<?php echo Url::toRoute('add'); ?>">Add Tags</a>
            </li>
            <li class="active">
                <a href="<?php echo Url::toRoute('remove'); ?>">Remove Tags</a>
            </li>
            <li>
                <a href="<?php echo Url::toRoute('survey'); ?>">Take Survey</a>
            </li>
        </ul>
        <hr/>

        <?php $form = ActiveForm::begin(['id' => 'basic-settings-form']);?>
        <?php echo $form->field($model, 'tags')->checkboxList(explode(", ", Yii::$app->user->getIdentity()->tags), array('separator'=>'<br>')); ?>
        <br>
        <?php echo CHtml::submitButton(Yii::t('UserModule.views_account_editSettings', '- Remove Tag(s)'), array('class' => 'btn btn-primary')); ?>
        <?php $form->end(); ?>
    </div>
</div>

