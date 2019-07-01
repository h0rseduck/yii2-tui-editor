<?php

namespace h0rseduck\tuieditor;

use yii\web\AssetBundle;

/**
 * Class HighlightAsset
 * @package h0rseduck\tuieditor
 */
class HighlightAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/highlight/src/styles';

    /**
     * @var array
     */
    public $css = [
        'github.css'
    ];

    /**
     * @var array
     */
    public $js = [
    ];

    /**
     * @var array
     */
    public $depends = [
    ];
}
