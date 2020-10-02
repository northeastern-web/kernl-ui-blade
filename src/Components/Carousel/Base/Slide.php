<?php
namespace Northeastern\Blade\Components\Carousel\Base;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Slide extends Component
{
    public $index;
    public $backgroundClasses;
    public $slotClasses;

    public function __construct($index, $backgroundClasses = '', $slotClasses = '')
    {
        $this->index = $index;
        $this->backgroundClasses = $backgroundClasses;
        $this->slotClasses = $slotClasses;
    }

    public function render()
    {
        return View::make('kernl-ui::carousel.base.slide');
    }
}
