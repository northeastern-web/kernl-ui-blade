<?php
namespace Northeastern\Blade\Components\Carousel\Split;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Slide extends Component
{
    public $index;

    public function __construct($index)
    {
        $this->index = $index;
    }

    public function render()
    {
        return View::make('kernl-ui::carousel.split.slide');
    }
}
