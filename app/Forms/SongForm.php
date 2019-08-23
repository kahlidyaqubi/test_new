<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class SongForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', Field::TEXT, [
                'rules' => 'required|min:5'
            ])
            ->add('lyrics', Field::TEXTAREA, [
                'rules' => 'max:5000'
            ])
            ->add('publish', Field::CHECKBOX)
            ->add('Save', 'submit', [
                'attr' => ['class' => 'btn btn-primary']
            ]);
    }
}