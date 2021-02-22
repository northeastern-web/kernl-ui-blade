<?php
namespace Northeastern\Blade\Components\Tabs;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Underlined extends Component
{
    public $defaultActive;

    public $activeTabClass = 'border-red-600 text-gray-800';

    public $inactiveTabClass = 'text-gray-600';

    public function __construct($defaultActive = 0)
    {
        $this->defaultActive = $defaultActive;
    }

    public function render()
    {
        return View::make('kernl-ui::tabs.underlined');
    }
}
