<?php

namespace h0rseduck\tuieditor;

use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\widgets\InputWidget;

/**
 * Class AutoloadExample
 * @package h0rseduck\tuieditor
 */
class TuiEditor extends InputWidget
{
    /**
     * @var array markdown options
     */
    public $editorOptions = [];

    /**
     * @return string|void
     */
    public function run()
    {
        if ($this->hasModel()) {
            echo Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textarea($this->attribute, $this->value, $this->options);
        }
        $this->registerAssets();
    }

    /**
     * Register client assets
     */
    protected function registerAssets()
    {
        $view = $this->getView();
        TuiEditorAsset::register($view);
        $varName = Inflector::variablize('editor_' . $this->id);
        $script = "var {$varName} = new tui.Editor(" . $this->getEditorOptions() . ');';
        $view->registerJs($script);
    }

    /**
     * Return editor options in json format
     * @return string
     */
    protected function getEditorOptions()
    {
        $this->editorOptions['el'] = new JsExpression('document.getElementById("' . $this->options['id'] . '")');
        return Json::encode($this->editorOptions);
    }
}
