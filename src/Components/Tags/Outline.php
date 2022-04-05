<?php
namespace Northeastern\Blade\Components\Tags;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;
use InvalidArgumentException;

class Outline extends Component
{
    public $color;

    public $pill;

    public $uppercase;

    protected $colors = [
        'dark' => ['text-black', 'border-black'],
        'light' => ['text-white', 'border-white'],
        'medium-gray' => ['text-gray-600', 'border-gray-600'],
        'light-gray' => ['text-gray-300', 'border-gray-300'],
        'red' => ['text-red-600', 'border-red-600'],
        'blue' => ['text-blue-700', 'border-blue-700'],
        'green' => ['text-green-600', 'border-green-600'],
        'yellow' => ['text-yellow-300', 'border-yellow-300'],
    ];

    public function __construct($color = 'dark', $pill = false, $uppercase = false)
    {
        if (! array_key_exists($color, $this->colors)) {
            throw new InvalidArgumentException('`' . $color . '` is not a supported color option.');
        }

        $this->color = $color;

        $this->pill = $pill;

        $this->uppercase = $uppercase;
    }

    public function compiledClasses()
    {
        return $this->attributes->merge([
            'class' => collect()
                ->merge([
                    'inline-flex',
                    'items-center',
                    'p-2',
                    'text-xs',
                    'whitespace-nowrap',
                    'leading-none',
                    'border',
                    'rounded',
                ])
                ->merge($this->colors[$this->color])
                ->push($this->pill ? 'rounded-full' : '')
                ->push($this->uppercase ? 'uppercase tracking-wide' : '')
                ->join(' '),
        ]);
    }

    public function render()
    {
        return View::make('kernl-ui::tags.outline');
    }
}
