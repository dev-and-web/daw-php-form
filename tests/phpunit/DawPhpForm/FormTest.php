<?php

namespace Tests\DawPhpForm;

use PHPUnit\Framework\TestCase;
use DawPhpForm\Form;

/**
 * On test que les méthodes de la classe Form renvoyent bien des string.
 * On fait les test sans préciser les paramètres optionels, et on refait le test en précisant tout les paramètres possibles
 */
class FormTest extends TestCase
{
    private $form;


    public function setUp()
    {
       $this->form = new Form();
    }


    public function testOpen()
    {
        $this->assertTrue(is_string($this->form->open(['action' => 'action', 'method' => 'put', 'class' => 'form-edit', 'files' => true])));

        $this->assertTrue(is_string($this->form->open()));
    }


    public function testLabel()
    {
        $this->assertTrue(is_string($this->form->label('for', 'Text :', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;'])));

        $this->assertTrue(is_string($this->form->label('for', 'Text :')));
    }


    public function testText()
    {
        $this->assertTrue(is_string($this->form->text('name', 'Value')));

        $this->assertTrue(is_string($this->form->text('name', 'Value', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;', 'placeholder'=>'Placeholder', 'required'=>true])));
    }


    public function testEmail()
    {
        $this->assertTrue(is_string($this->form->email('name', 'Value')));

        $this->assertTrue(is_string($this->form->email('name', 'Value', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;', 'placeholder'=>'Placeholder', 'required'=>true])));
    }


    public function testSearch()
    {
        $this->assertTrue(is_string($this->form->search('name', 'Value')));

        $this->assertTrue(is_string($this->form->search('name', 'Value', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;', 'placeholder'=>'Placeholder', 'required'=>true])));
    }


    public function testUrl()
    {
        $this->assertTrue(is_string($this->form->url('name', 'Value')));

        $this->assertTrue(is_string($this->form->url('name', 'Value', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;', 'placeholder'=>'Placeholder', 'required'=>true])));
    }


    public function testTel()
    {
        $this->assertTrue(is_string($this->form->tel('name', 'Value')));

        $this->assertTrue(is_string($this->form->tel('name', 'Value', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;', 'placeholder'=>'Placeholder', 'required'=>true])));
    }


    public function testPassword()
    {
        $this->assertTrue(is_string($this->form->password('name')));

        $this->assertTrue(is_string($this->form->password('name', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;', 'placeholder'=>'Placeholder', 'required'=>true])));
    }


    public function testHidden()
    {
        $this->assertTrue(is_string($this->form->hidden('name', 'Value')));

        $this->assertTrue(is_string($this->form->hidden('name', 'Value', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;'])));
    }


    public function testCheckbox()
    {
        $this->assertTrue(is_string($this->form->checkbox('name', 'Value')));

        $this->assertTrue(is_string($this->form->checkbox('name', 'Value', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;', 'checked'=>true])));
    }


    public function testRadio()
    {
        $this->assertTrue(is_string($this->form->radio('name', 'Value')));

        $this->assertTrue(is_string($this->form->radio('name', 'Value', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;', 'checked'=>true])));
    }


    public function testNumber()
    {
        $this->assertTrue(is_string($this->form->number('name', 'Value')));

        $this->assertTrue(is_string($this->form->number('name', 'Value', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;', 'step'=>"2", 'min'=>10, 'max'=>260])));
    }


    public function testRange()
    {
        $this->assertTrue(is_string($this->form->range('name', 'Value')));

        $this->assertTrue(is_string($this->form->range('name', 'Value', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;', 'step'=>"2", 'min'=>10, 'max'=>260])));
    }


    public function testSubmit()
    {
        $this->assertTrue(is_string($this->form->submit()));

        $this->assertTrue(is_string($this->form->submit('name', 'Value', ['id'=>'idsubmit', 'style'=>'margin-bottom: 20px;'])));
    }


    public function testFile()
    {
        $this->assertTrue(is_string($this->form->file('namefiles')));

        $this->assertTrue(is_string($this->form->file('namefiles[]', ['id'=>'idfile', 'class'=>'classfile', 'style'=>'margin-bottom: 20px;', 'multiple'=>true])));
    }


    public function testButton()
    {
        $this->assertTrue(is_string($this->form->button()));

        $this->assertTrue(is_string($this->form->button('Text Button', ['name'=>'Envoyer', 'style'=>'margin-bottom: 20px;'])));
    }


    public function testTextarea()
    {
        $this->assertTrue(is_string($this->form->textarea('name', 'Value')));

        $this->assertTrue(is_string($this->form->textarea('name', 'Value', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;', 'placeholder'=>'Ecrivez...', 'required'=>true])));
    }


    public function testSelect()
    {
        $this->assertTrue(is_string($this->form->select('name', [
            1=>'Publié',
            2=>'Brouillon',
            3=>'Corbeille',
        ])));

        $this->assertTrue(is_string($this->form->select('name', [
            1=>'Publié',
            2=>'Brouillon',
            3=>'Corbeille',
        ], 2, [
            'class'=>'classselect',
            'id'=>'idselect',
            'autosubmit'=>'idform',
            'style'=>'margin-bottom: 20px;',
        ])));
    }


    public function testSelectWithOptgroup()
    {
        $this->assertTrue(is_string($this->form->select('nameselect', [
            'articles'=>[
                1=>'Publié',
                2=>'Brouillon',
                3=>'Corbeille',
            ],
            'pages'=>[
                4=>'Publié',
                5=>'Brouillon',
                6=>'Corbeille',
            ],
        ], 2, [
            'class'=>'classselect',
            'id'=>'idselect',
        ])));
    }


    public function testClose()
    {
        $this->assertTrue(is_string($this->form->close()));
    }
}
