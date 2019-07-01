<?php

namespace h0rseduck\tuieditor;

use yii\helpers\ArrayHelper;
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
     * @var null|string
     */
    protected $varName = null;

    /**
     * @return string|void
     */
    public function run()
    {
        if ($this->hasModel()) {
            echo Html::activeTextarea($this->model, $this->attribute,
                ArrayHelper::merge($this->options, ['style' => 'display: none;']));
        } else {
            echo Html::textarea($this->attribute, $this->value,
                ArrayHelper::merge($this->options, ['style' => 'display: none;']));
        }
        echo Html::tag('div', null, [
            'id' => "editor_{$this->id}"
        ]);
        $this->registerAssets();
    }

    /**
     * @return string|null
     */
    protected function getVarName()
    {
        if (is_null($this->varName)) {
            $this->varName = Inflector::variablize('editor_' . $this->id);
        }
        return $this->varName;
    }

    /**
     * Register client assets
     */
    protected function registerAssets()
    {
        $view = $this->getView();
        TuiEditorAsset::register($view);
        $script = "var {$this->getVarName()} = new tui.Editor(" . $this->getEditorOptions() . ');';
        $view->registerJs($script);
    }

    /**
     * Return editor options in json format
     * @return string
     */
    protected function getEditorOptions()
    {
        $this->editorOptions['el'] = new JsExpression('document.getElementById("editor_' . $this->id . '")');
        $this->editorOptions['events']['change'] = new JsExpression('function() {$("#' . $this->options['id'] . '").val(' . $this->getVarName() . '.getValue())}');
        $this->editorOptions['initialValue'] = $this->hasModel()
            ? $this->model->{$this->attribute}
            : $this->value;

        return Json::encode($this->editorOptions);
    }
}
