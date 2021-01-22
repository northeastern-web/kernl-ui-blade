<?php
namespace Northeastern\Blade\Components;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Scripts extends Component
{
    public function render()
    {
        return View::make('kernl-ui::scripts');
    }
}
