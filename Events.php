<?php

namespace humhub\modules\extendedtags;

use Yii;
use yii\helpers\Url;

class Events extends \yii\base\Object
{

    public static function onTopMenuInit($event)
    {
        if (Yii::$app->user->isGuest) {
            return;
        }

        $event->sender->addItem(array(
            'label' => "My Tags",
            'url' => Url::to(['/extendedtags/user']),
            'icon' => '<i class="fa fa-tags"></i>',
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'extendedtags'),
            'sortOrder' => 600,
        ));
    }

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
            'icon' => '<i class="fa fa-tags"></i>',
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
