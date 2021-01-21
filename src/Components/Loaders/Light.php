<?php
namespace Northeastern\Blade\Components\Loaders;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Light extends Component
{
    public function render()
    {
        return View::make('kernl-ui::loaders.light');
    }
}
