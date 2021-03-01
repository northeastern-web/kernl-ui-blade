<?php
namespace Northeastern\Blade\Components;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class LocalHeader extends Component
{
    public $links;
    public $currentPath;
    public $dark;
    public $action;

    public function __construct($links, $currentPath, $dark = false, $action = null)
    {
        $this->links = $links;
        $this->currentPath = $currentPath;
        $this->dark = $dark;
        $this->action = $action;
    }

    public function render()
    {
        return View::make('kernl-ui::local-header');
    }
}
