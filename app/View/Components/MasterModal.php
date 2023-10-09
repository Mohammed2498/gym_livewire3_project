<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MasterModal extends Component
{
    /**
     * Create a new component instance.
     */



    public function __construct(public string $modalId, public string  $functionName, public string $modalTitle)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.master-modal');
    }
}
