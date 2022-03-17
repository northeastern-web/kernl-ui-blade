<?php
namespace Northeastern\Blade\Components\Tags;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;
use InvalidArgumentException;

class Solid extends Component
{
    public $color;

    public $pill;

    public $uppercase;

    protected $colors = [
        'dark' => ['text-white', 'bg-black'],
        'light' => ['text-gray-900', 'bg-white'],
        'medium-gray' => ['text-white', 'bg-gray-600'],
        'light-gray' => ['text-gray-900', 'bg-gray-300'],
        'red' => ['text-white', 'bg-red-600'],
        'blue' => ['text-white', 'bg-blue-700'],
        'green' => ['text-white', 'bg-green-600'],
        'yellow' => ['text-black', 'bg-yellow-300'],
    ];

    public function __construct($color = 'black', $pill = false, $uppercase = false)
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
                    'border-transparent',
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
        return View::make('kernl-ui::tags.solid');
    }
}
