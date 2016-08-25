<?php

namespace humhub\modules\extendedtags;

use Yii;
use yii\helpers\Url;

class Events extends \yii\base\Object
{


    /**
     * Defines what to do if admin menu is initialized.
     *
     * @param type $event
     */
    public static function onAdminMenuInit($event)
    {
        $event->sender->addItem(array(
            'label' => 'ExtendedTags',
            'url' => Url::to(['/extendedtags/admin']),
            'group' => 'manage',
            'icon' => '<i class="fa fa-trophy"></i>',
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'extendedtags' && Yii::$app->controller->id == 'admin'),
            'sortOrder' => 510,
        ));
    }

    /**
     * Add the Karma menu to the user
     * profile page
     * @param type $event
     */
    public static function onProfileMenuWidgetInit($event)
    {
        $event->sender->addItem(array(
            'label' => 'ExtendedTags',
            'group' => 'profile',
            'url' => $event->sender->user->createUrl('//extendedtags/profile/view'),
            'sortOrder' => 400,
            'isActive' => (Yii::$app->controller->module->id == "extendedtags" && Yii::$app->controller->id == "profile" && Yii::$app->controller->action->id == "view"),
        ));
    }

}
