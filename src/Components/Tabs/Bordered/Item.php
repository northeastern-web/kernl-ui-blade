<?php
namespace Northeastern\Blade\Components\Tabs\Bordered;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Item extends Component
{
    public $index;

    public function __construct($index = -1)
    {
        $this->index = $index;
    }

    public function render()
    {
        return View::make('kernl-ui::tabs.bordered.item');
    }
}
