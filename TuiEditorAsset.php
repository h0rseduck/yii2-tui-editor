<?php

namespace h0rseduck\tuieditor;

use yii\web\AssetBundle;

/**
 * Class TuiEditorAsset
 *
 * @package h0rseduck\tuieditor
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
        'tui-editor-contents.min.css'
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
        'h0rseduck\tuieditor\CodemirrorAsset',
        'h0rseduck\tuieditor\HighlightAsset'
    ];
}
