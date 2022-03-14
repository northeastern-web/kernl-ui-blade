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
        'dark' => 'text-white bg-black hover:bg-gray-900',
        'light' => 'text-black bg-white hover:bg-gray-100',
        'medium-gray' => 'text-white bg-gray-600 hover:bg-gray-700',
        'light-gray' => 'text-gray-900 bg-gray-300 hover:bg-gray-200',
        'red' => 'text-white bg-red-600 hover:bg-red-700',
        'blue' => 'text-white bg-blue-700 hover:bg-blue-800',
        'green' => 'text-white bg-green-600 hover:bg-green-700',
        'aqua' => 'text-white bg-aqua-500 hover:bg-aqua-600',
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
        return View::make('kernl-ui::button.solid');
    }
}
