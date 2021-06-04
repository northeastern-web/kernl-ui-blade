<?php
namespace Northeastern\Blade\Components\Alert;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;
use InvalidArgumentException;

class Contained extends Component
{
    public $label;
    public $closeable;
    public $remember;
    public $colorClasses;

    protected $colors = [
        'black' => 'text-black bg-white hover:text-white hover:bg-black',
        'white' => 'text-white bg-black hover:text-black',
        'gray-600' => 'text-gray-600 bg-white hover:text-white hover:bg-gray-600',
        'gray-300' => 'text-gray-300 bg-gray-900 hover:text-gray-900 hover:bg-gray-300',
        'red' => 'text-red-600 bg-white hover:text-white hover:bg-red-600',
        'yellow' => 'text-black bg-yellow-400 hover:bg-black hover:text-yellow-400',
        'blue' => 'text-blue-700 bg-blue-700 hover:text-white hover:bg-blue-700',
        'green' => 'text-green-600 bg-green-600 hover:text-white hover:bg-green-600',
        'aqua' => 'text-aqua-500 bg-aqua-500 hover:text-white hover:bg-aqua-500',
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
        return View::make('kernl-ui::alert.contained');
    }
}
