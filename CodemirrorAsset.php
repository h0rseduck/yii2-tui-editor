<?php

namespace h0rseduck\tuieditor;

use yii\web\AssetBundle;

/**
 * Class CodemirrorAsset
 * @package h0rseduck\tuieditor
 */
class CodemirrorAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/codemirror/lib';

    /**
     * @var array
     */
    public $css = [
        'codemirror.css',
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