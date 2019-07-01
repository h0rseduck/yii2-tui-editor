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
    public $sourcePath = '@bower/tui-editor-dist/dist';

    /**
     * @var array
     */
    public $css = [
        'tui-editor.min.css',
    ];

    /**
     * @var array
     */
    public $js = [
        'tui-editor-Editor-full.min.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
