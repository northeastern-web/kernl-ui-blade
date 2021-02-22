<?php
namespace Northeastern\Blade\Components\Tabs\Detached;

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
        return View::make('kernl-ui::tabs.detached.item');
    }
}
