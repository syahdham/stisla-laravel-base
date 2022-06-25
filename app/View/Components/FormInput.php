<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInput extends Component
{
    public $label, $name, $type, $value, $required, $placeholder, $disabled;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $type, $value = null, $required = null, $placeholder = null, $disabled = null)
    {
        $this->name = $name;
        $this->type = $type;
        $this->label = $label;
        $this->value = $value;
        $this->required = $required;
        $this->placeholder = $placeholder;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-input');
    }
}
