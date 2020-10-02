<?php
namespace Northeastern\Blade\Components\Carousel;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Split extends Component
{
    public $delay;

    public function __construct($delay = 5000)
    {
        $this->delay = $delay;
    }

    public function render()
    {
        return View::make('kernl-ui::carousel.split');
    }
}
