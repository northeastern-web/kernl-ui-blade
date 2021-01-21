<?php
namespace Northeastern\Blade\Components\Tabs;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Detached extends Component
{
    public $tabs;

    public function __construct($tabs = [])
    {
        $this->tabs = $tabs;
    }

    public function render()
    {
        return View::make('kernl-ui::tabs.detached');
    }
}
