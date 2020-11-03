<?php
namespace Northeastern\Blade\Components\Alert;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class FullWidth extends Component
{
    public $label;
    public $closeable;
    public $remember;

    public function __construct($label, $closeable = true, $remember = false)
    {
        $this->label = $label;
        $this->closeable = $closeable;
        $this->remember = $remember;
    }

    public function render()
    {
        return View::make('kernl-ui::alert.full-width');
    }
}
