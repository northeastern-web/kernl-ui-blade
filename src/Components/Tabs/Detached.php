<?php
namespace Northeastern\Blade\Components\Tabs;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Detached extends Component
{
    public $defaultActive;

    public $activeTabClass = 'border-gray-900 text-gray-900';

    public $inactiveTabClass = 'text-gray-600 hover:border-gray-600';

    public function __construct($defaultActive = 0)
    {
        $this->defaultActive = $defaultActive;
    }

    public function render()
    {
        return View::make('kernl-ui::tabs.detached');
    }
}
