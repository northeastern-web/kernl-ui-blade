<?php
namespace Northeastern\Blade\Components\Selects;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Select extends Component
{
    public $name;
    public $options;
    public $listens;
    public $initialValue;
    public $multiple;
    public $placeholder;

    public function __construct($name, $options = [], $listens = [], $initialValue = null, $multiple = false, $placeholder = 'Select an option')
    {
        $this->name = $name;
        $this->options = $options;
        $this->listens = $listens;
        $this->initialValue = $initialValue;
        $this->multiple = $multiple;
        $this->placeholder = $placeholder;
    }

    public function render()
    {
        return View::make('kernl-ui::selects.select');
    }
}
