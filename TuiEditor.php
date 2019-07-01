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
            $content = $this->model->{$this->attribute};
//            echo Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            $content = $this->value;
//            echo Html::textarea($this->attribute, $this->value, $this->options);
        }
        echo Html::tag('div', $content, [
            'id' => "editor_{$this->id}"
        ]);
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
        $this->editorOptions['el'] = new JsExpression('document.getElementById("editor_' . $this->id . '")');
        $this->editorOptions['initialEditType'] = 'markdown';
        $this->editorOptions['previewStyle'] = 'vertical';
        $this->editorOptions['height'] = '500px';
        $this->editorOptions['viewer'] = true;

        return Json::encode($this->editorOptions);
    }
}
