<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormTextArea extends Component
{
    public $name, $label, $value, $required;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label, $value = '', $required = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-text-area');
    }
}
