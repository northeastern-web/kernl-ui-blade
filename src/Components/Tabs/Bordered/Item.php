<?php
namespace Northeastern\Blade\Components\Tabs\Bordered;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Item extends Component
{
    public $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function render()
    {
        return View::make('kernl-ui::tabs.bordered.item');
    }
}
