<?php

namespace Northeastern\Blade\Components\Modals;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Base extends Component
{
    public $modalId;

    public $closeable;

    public $closeOnClickOutside;

    public $closeOnEscapeKey;

    public function __construct($modalId, $closeable = true, $closeOnClickOutside = true, $closeOnEscapeKey = true)
    {
        $this->modalId = $modalId;

        $this->closeable = $closeable;

        $this->closeOnClickOutside = $closeOnClickOutside;

        $this->closeOnEscapeKey = $closeOnEscapeKey;
    }

    public function render()
    {
        return View::make('kernl-ui::modals.base');
    }
}
