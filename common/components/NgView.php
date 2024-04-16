<?php

/**
 * Created by PhpStorm.
 * User: zdwiz
 * Date: 7/17/15 AD
 * Time: 1:31 AM
 */

namespace common\components;


use yii\web\View;

class NgView extends View
{
    public $disableTitleDisplay = false;
    public $subTitle = null;
    public $meta = null;
    public $identity = null;
}
