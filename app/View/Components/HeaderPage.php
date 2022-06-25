<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HeaderPage extends Component
{
    public $title, $isNotIndex, $backUrl;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $isNotIndex = false, $backUrl = null)
    {
        $this->title = $title;
        $this->isNotIndex = $isNotIndex;
        $this->backUrl = $backUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header-page');
    }
}
