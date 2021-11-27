<?php

namespace App\View\Components\Partials;

use Illuminate\View\Component;

class UserDashboardNavbar extends Component
{
    /** @var string */
    public $page;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $page = '')
    {
        $this ->page = $page;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.partials.user-dashboard-navbar');
    }
}
