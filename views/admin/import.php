<?php
/**
 * Connected Communities Initiative
 * Copyright (C) 2016  Queensland University of Technology
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */


use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="panel panel-default">
    <div class="panel-heading"><strong>Bulk</strong> Import</div>
    <div class="panel-body">
        <h4>Upload CSV</h4>
        <div class="well">
        <?php $form = ActiveForm::begin(array(
            'id'=>'registration-form',
            'enableAjaxValidation'=>true,
            'options' => array('enctype' => 'multipart/form-data'),
            'action' => Url::to(['/extendedtags/admin/upload'])
        )); ?>
        <?php echo $form->errorSummary($model); ?>
        <?php echo $form->field($model,'csv_file')->fileInput(); ?>
        <br />
        <?php echo Html::submitButton('Upload CSV', array('class' => '')); ?>
        <?php $form->end(); ?>
        </div>

    </div>
</div>
