<?php
namespace Northeastern\Blade\Components;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class LocalHeader extends Component
{
    public $links;
    public $currentPath;
    public $dark;

    public function __construct($links, $currentPath, $dark = false)
    {
        $this->links = $links;
        $this->currentPath = $currentPath;
        $this->dark = $dark;
    }

    public function render()
    {
        return View::make('kernl-ui::local-header');
    }
}
