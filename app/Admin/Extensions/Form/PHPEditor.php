<?php

namespace App\Admin\Extensions\Form;
use Encore\Admin\Form\Field;

class PHPEditor extends Field
{
    protected $view = 'admin.php-editor';

    protected static $css = [
        '/packages/editor/codemirror-5.31.0/lib/codemirror.css',
    ];

    protected static $js = [
        '/packages/editor/codemirror-5.31.0/lib/codemirror.js',
        '/packages/editor/codemirror-5.31.0/addon/edit/matchbrackets.js',
        '/packages/editor/codemirror-5.31.0/mode/htmlmixed/htmlmixed.js',
        '/packages/editor/codemirror-5.31.0/mode/xml/xml.js',
        '/packages/editor/codemirror-5.31.0/mode/javascript/javascript.js',
        '/packages/editor/codemirror-5.31.0/mode/css/css.js',
        '/packages/editor/codemirror-5.31.0/mode/clike/clike.js',
        '/packages/editor/codemirror-5.31.0/mode/php/php.js',
    ];

    public function render()
    {
        $this->script = <<<EOT

CodeMirror.fromTextArea(document.getElementById("{$this->id}"), {
    lineNumbers: true,
    mode: "text/x-php",
    extraKeys: {
        "Tab": function(cm){
            cm.replaceSelection("    " , "end");
        }
     }
});

EOT;
        return parent::render();

    }
}