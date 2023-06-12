<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ServiceAccordion extends Component
{
    public $service;
    public $key;

    /**
     * Create a new component instance.
     */
    public function __construct($service, $key)
    {
        $this->service = $service;
        $this->key = $key;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.service-accordion');
    }
}
