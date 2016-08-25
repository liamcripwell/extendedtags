<?php
use yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use humhub\modules\extendedtags\models\Tags;
use \humhub\modules\user\models\User;
use humhub\compat\CHtml;
use yii\widgets\ActiveForm;
?>

<div class="panel panel-default">
    <div class="panel-heading"><strong>Take Survey</strong></div>
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
            <li>
                <a href="<?php echo Url::toRoute('remove'); ?>">Remove Tags</a>
            </li>
            <li class="active">
                <a href="<?php echo Url::toRoute('survey'); ?>">Take Survey</a>
            </li>
        </ul>
        <hr/>

        <?php
        $form = ActiveForm::begin(['id' => 'basic-settings-form']);

        echo $form->field($model, 'goal')->radioList(array(
            'Buying my first home',
            'Upgrading my first home',
            'Buying an investment property',
        ), array('separator'=>'<br>'));

        echo $form->field($model, 'propertyType')->radioList(array(
            'House' => 'House',
            'Unit/Apartment' => 'Unit/Apartment',
            'Townhouse' => 'Townhouse',
            'Villa' => 'Villa',
            'Terrace' => 'Terrace',
            'Semi detached (duplex/triplex etc.)' => 'Semi detached (duplex/triplex etc.)',
        ), array('separator'=>'<br>'));

        echo $form->field($model, 'minBedrooms')->radioList(array(
            'Studio',
            '1',
            '2',
            '3',
            '4',
            '5',
            'Any',
        ), array('separator'=>'<br>'));

        echo $form->field($model, 'maxBedrooms')->radioList(array(
            'Studio',
            '1',
            '2',
            '3',
            '4',
            '5+',
            'Any',
        ), array('separator'=>'<br>'));

        echo $form->field($model, 'bathrooms')->radioList(array(
            1 => '1',
            2 => '2',
            3 => '3+',
        ), array('separator'=>'<br>'));

        echo $form->field($model, 'carSpaces')->radioList(array(
            '1',
            '2',
            '3',
            '4',
            '5+',
        ), array('separator'=>'<br>'));

        //TODO: insert price preference sliders here

        echo $form->field($model, 'buildFactors')->checkboxList(array(
            'Lock-up garage',
            'Fenced garden',
            'Large block',
            'Acreage',
            'Low maintenance garden',
            'Pool',
            'Air-conditioning',
            'Fans',
            'Gas cooking',
            'External entertaining area',
            'Verandah',
            'Shed/External storage',
            'Preference for brick and tile',
        ), array('separator'=>'<br>'));

        echo $form->field($model, 'econFactors')->checkboxList(array(
            'High capital growth potential',
            'High demand and low supply suburbs',
            'property must be able to be sold back into the mums and dads family market, not an investor market',
            'Property must be in a lifestyle driven suburb which has significant future growth',
            'It should be new, or near new to qualify for full depreciation',
            'Lowest vacancy',
            'Excellent transport facilities',
            'Located close to schools',
            'Approved by banks and insurance companies',
            'Close proximity to shopping centres',
            'High employment area',
            'In high demand by tenants',
            'Foreign Investment Review Board qualification',
        ), array('separator'=>'<br>'));

        echo CHtml::submitButton(Yii::t('UserModule.views_account_editSettings', 'Submit Preferences'), array('class' => 'btn btn-primary'));
        ?>

    </div>
</div>

