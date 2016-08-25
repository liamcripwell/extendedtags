<?php
use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use \humhub\modules\user\models\User;
?>

<div class="panel panel-default">
    <div class="panel-heading"><strong>Manage Tags</strong></div>
    <div class="panel-body">
        <p>This module allows for extended management of user tags.</p>
        <hr/>
        <ul class="nav nav-pills">
            <li class="active">
                <a href="<?php echo Url::toRoute('index'); ?>">Overview</a>
            </li>
            <li>
                <a href="<?php echo Url::toRoute('add'); ?>">Add Tags</a>
            </li>
            <li>
                <a href="<?php echo Url::toRoute('remove'); ?>">Remove Tags</a>
            </li>
            <li>
                <a href="<?php echo Url::toRoute('survey'); ?>">Take Survey</a>
            </li>
        </ul>
        <hr/>

        <p>This page will contain some sort of guide or explanation of the module.</p>

    </div>
</div>

