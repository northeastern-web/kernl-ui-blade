<?php
namespace Northeastern\Blade\Components\Alert;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;
use InvalidArgumentException;

class FullWidth extends Component
{
    public $label;
    public $closeable;
    public $remember;
    public $colorClasses;

    protected $colors = [
        'red' => 'text-white bg-red-600',
        'yellow' => 'text-black bg-yellow-400',
        'cool' => 'text-black bg-gray-cool-300',
    ];

    public function __construct($label, $closeable = true, $remember = false, $color = 'yellow')
    {
        $this->label = $label;
        $this->closeable = $closeable;
        $this->remember = $remember;

        if (isset($this->colors[$color])) {
            $this->colorClasses = $this->colors[$color];
        } else {
            throw new InvalidArgumentException('`' . $color . '` is not a supported color option.');
        }
    }

    public function render()
    {
        return View::make('kernl-ui::alert.full-width');
    }
}
