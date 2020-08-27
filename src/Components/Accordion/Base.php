<?php
namespace Northeastern\Blade\Components\Accordion;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Base extends Component
{
    public $defaultSection;
    public $label;

    public function __construct($defaultSection = '', $label = '')
    {
        $this->defaultSection = $defaultSection;
        $this->label = $label;
    }

    public function render()
    {
        return View::make('kernl-ui::accordion.base');
    }
}
