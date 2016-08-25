<?php

namespace humhub\modules\extendedtags\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use \humhub\modules\user\models\User;

class Tags
{
    public function getTags(){
        $tags = explode(", ", Yii::$app->user->identity->tags);

        // list tags
        ?>
        <h5>Current Tags:</h5>
        <ul>
        <?php
        foreach ($tags as $tag) {
            echo("<li>" . $tag . "</li>");
        }
        ?>
        </ul>
        <?php
    }
}