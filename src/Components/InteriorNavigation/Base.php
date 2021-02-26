<?php
namespace Northeastern\Blade\Components\InteriorNavigation;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Base extends Component
{
    public $title;

    public $links;

    public function __construct($title = null, $links = [])
    {
        $this->title = $title;
        $this->links = $links;
    }

    public function render()
    {
        return View::make('kernl-ui::interior-navigation.base');
    }
}
