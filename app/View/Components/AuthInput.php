<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AuthInput extends Component
{
    public $label, $name, $type, $value, $required, $placeholder;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $type, $value = null, $required = null, $placeholder = null)
    {
        $this->name = $name;
        $this->type = $type;
        $this->label = $label;
        $this->value = $value;
        $this->required = $required;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.auth-input');
    }
}
