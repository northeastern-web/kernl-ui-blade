<?php
namespace Northeastern\Blade\Components\Button;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;
use InvalidArgumentException;

class Outline extends Component
{
    public $sizeClasses = '';
    public $colorClasses;
    public $href;

    protected $sizes = [
        'small' => 'btn-sm',
        'large' => 'btn-lg',
    ];

    protected $colors = [
        'dark' => 'text-black border-black hover:text-white hover:bg-black',
        'light' => 'text-white border-white hover:text-black',
        'medium-gray' => 'text-gray-600 border-gray-600 hover:text-white hover:bg-gray-600',
        'light-gray' => 'text-gray-300 border-gray-300 hover:text-gray-900 hover:bg-gray-300',
        'red' => 'text-red-600 border-red-600 hover:text-white hover:bg-red-600',
        'blue' => 'text-blue-700 border-blue-700 hover:text-white hover:bg-blue-700',
        'green' => 'text-green-600 border-green-600 hover:text-white hover:bg-green-600',
        'aqua' => 'text-aqua-500 border-aqua-500 hover:text-white hover:bg-aqua-500',
    ];

    public function __construct($color = 'dark', $href = '', $size = '')
    {
        if (isset($this->colors[$color])) {
            $this->colorClasses = $this->colors[$color];
        } else {
            throw new InvalidArgumentException('`' . $color . '` is not a supported color option.');
        }

        $this->href = $href;

        if ($size && isset($this->sizes[$size])) {
            $this->sizeClasses = $this->sizes[$size];
        } elseif ($size && ! isset($this->sizes[$size])) {
            throw new InvalidArgumentException('`' . $size . '` is not a supported size option.');
        }
    }

    public function render()
    {
        return View::make('kernl-ui::button.outline');
    }
}
