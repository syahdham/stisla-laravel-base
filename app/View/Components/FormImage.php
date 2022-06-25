<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormImage extends Component
{
    public $label, $name, $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $required = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-image');
    }
}
