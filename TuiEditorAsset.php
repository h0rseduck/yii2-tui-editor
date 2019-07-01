<?php

namespace h0rseduck\tuieditor;

use yii\web\AssetBundle;

/**
 * Class MarkdownEditorAsset
 *
 * @package yii2mod\markdown
 */
class TuiEditorAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/tui-editor';

    /**
     * @var array
     */
    public $css = [
        'dist/tui-editor.min.css',
    ];

    /**
     * @var array
     */
    public $js = [
        'dist/tui-editor.min.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
