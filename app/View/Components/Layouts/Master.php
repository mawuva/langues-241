<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class Master extends Component
{
    /** @var string */
    public $title;

    /** @var string */
    public $description;

    /** @var string */
    public $section;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title = '', string $description = '', string $section = '')
    {
        $this ->title           = $title;
        $this ->description     = $description;
        $this ->section         = $section;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layouts.master');
    }
}
