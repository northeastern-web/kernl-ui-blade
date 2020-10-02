<?php
namespace Northeastern\Blade\Components\Carousel;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Base extends Component
{
    public $delay;
    // public $label;

    public function __construct($delay = 5000, $label = '')
    {
        $this->delay = $delay;
        $this->label = $label;
    }

    public function render()
    {
        return View::make('kernl-ui::carousel.base');
    }
}
