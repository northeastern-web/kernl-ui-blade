<?php
namespace Northeastern\Blade\Components\Button;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;
use InvalidArgumentException;

class Solid extends Component
{
    public $sizeClasses = '';
    public $colorClasses;
    public $href;

    protected $sizes = [
        'small' => 'btn-sm',
        'large' => 'btn-lg',
    ];

    protected $colors = [
        'black' => 'text-white bg-black hover:bg-gray-900',
        'white' => 'text-black bg-white hover:bg-gray-100',
        'gray-600' => 'text-white bg-gray-600 hover:bg-gray-700',
        'gray-300' => 'text-gray-900 bg-gray-300 hover:bg-gray-200',
        'red' => 'text-white bg-red-700 hover:bg-red-800',
        'blue' => 'text-white bg-blue-700 hover:bg-blue-800',
        'green' => 'text-white bg-green-600 hover:bg-green-700',
    ];

    public function __construct($color = 'black', $href = '', $size = '')
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
        return View::make('kernl-ui::button.solid');
    }
}
