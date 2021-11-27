<?php

namespace Domain\Admin\View\Components\Layouts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class Logged extends Component
{
    /** @var \Illuminate\Database\Eloquent\Model */
    public $course;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Model $course)
    {
        $this ->course = $course;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin::components.layouts.logged');
    }
}
