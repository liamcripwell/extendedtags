<?php

use humhub\modules\admin\widgets\AdminMenu;
use humhub\modules\user\widgets\ProfileMenu;

return [
    'id' => 'extendedtags',
    'class' => 'humhub\modules\extendedtags\Module',
    'namespace' => 'humhub\modules\extendedtags',
    'events' => [

        [
            'class' => \humhub\widgets\TopMenu::className(),
            'event' => \humhub\widgets\TopMenu::EVENT_INIT,
            'callback' => ['humhub\modules\extendedtags\Events', 'onTopMenuInit'],
        ],
		[
		    'class' => AdminMenu::className(),
            'event' => AdminMenu::EVENT_INIT,
            'callback' => ['humhub\modules\extendedtags\Events', 'onAdminMenuInit']
        ],
		[
		    'class' => ProfileMenu::className(),
            'event' => ProfileMenu::EVENT_INIT,
            'callback' => ['humhub\modules\extendedtags\Events', 'onProfileMenuWidgetInit']
        ],
    ],
];
?>