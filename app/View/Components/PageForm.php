<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageForm extends Component
{
    public $title, $needButtonSave, $buttonLabel, $page;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $needButtonSave = true, $buttonLabel = 'Simpan', $page = 'create')
    {
        $this->page = $page;
        $this->title = $title;
        $this->buttonLabel = $buttonLabel;
        $this->needButtonSave = $needButtonSave;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.page-form');
    }
}
