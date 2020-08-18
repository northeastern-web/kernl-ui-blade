<?php
namespace Northeastern\Blade\Components;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class LocalHeader extends Component
{
    public $links;
    public $currentPath;

    public function __construct($links, $currentPath)
    {
        $this->links = $links;
        $this->currentPath = $currentPath;
    }

    public function render()
    {
        return View::make('kernl-ui::local-header');
    }
}
