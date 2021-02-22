<?php
namespace Northeastern\Blade\Components\Tabs;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Bordered extends Component
{
    public $defaultActive;

    public $activeTabClass = 'text-gray-800 bg-white border-gray-300';

    public $inactiveTabClass = 'text-gray-600 bg-transparent';

    public function __construct($defaultActive = 0)
    {
        $this->defaultActive = $defaultActive;
    }

    public function render()
    {
        return View::make('kernl-ui::tabs.bordered');
    }
}
