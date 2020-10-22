<?php
namespace Northeastern\Blade\Components\Carousel;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Split extends Component
{
    public $heightClasses;
    public $delay;

    public function __construct($heightClasses, $delay = 5000)
    {
        $this->heightClasses = $heightClasses;
        $this->delay = $delay;
    }

    public function render()
    {
        return View::make('kernl-ui::carousel.split');
    }
}
