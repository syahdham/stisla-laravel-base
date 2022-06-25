<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SideNavLink extends Component
{
    public $route, $name, $icon;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route, $name, $icon)
    {
        $this->icon = $icon;
        $this->name = $name;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.side-nav-link');
    }
}
