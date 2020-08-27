<?php
namespace Northeastern\Blade\Components\Accordion;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Item extends Component
{
    public $title;
    public $id;

    public function __construct($title = '', $id = null)
    {
        $this->title = $title;
        $this->id = $id ?? Str::random(8);
    }

    public function render()
    {
        return View::make('kernl-ui::accordion.item');
    }
}
