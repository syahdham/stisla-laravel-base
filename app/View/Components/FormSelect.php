<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormSelect extends Component
{
    public $name, $label, $values, $selected, $required, $placeholder;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label, $values, $selected = null, $required = null, $placeholder = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->values = $values;
        $this->selected = $selected;
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
        return view('components.form-select');
    }
}
