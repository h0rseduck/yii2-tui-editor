Tui Editor for Yii2
===================
Tui Editor for Yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist h0rseduck/yii2-tui-editor "*"
```

or add

```
"h0rseduck/yii2-tui-editor": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \h0rseduck\tuieditor\TuiEditor::widget([
    'editorOptions' => [
        'initialEditType' => 'markdown',
        'previewStyle' => 'vertical',
        'height' => '500px'
    ]
]); ?>
```

```php
<?= $form->field($model, 'content')->widget(\h0rseduck\tuieditor\TuiEditor::class, [
    'editorOptions' => [
        'initialEditType' => 'markdown',
        'previewStyle' => 'vertical',
        'height' => '500px'
    ]
]); ?>
```