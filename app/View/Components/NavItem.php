<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavItem extends Component
{
    public $group;
    public $category;
    public $label;
    /**
     * Create a new component instance.
     *
     * @param string $group
     * @param string|null $category
     * @param string $label
     */
    public function __construct(string $group, ?string $category = null, string $label)
    {
        $this->group    = $group;
        $this->category = $category;
        $this->label    = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav-item');
    }
}
