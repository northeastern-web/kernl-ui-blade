<?php
namespace Northeastern\Blade\Components\Cards;

use Exception;
use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class SimpleLink extends Component
{
    public $title;
    public $body;
    public $color;
    public $size;
    public $url;
    public $withFooter;
    public $footerText;

    public function __construct($title, $body, $url = '#', $color = 'light', $size = 'default', $withFooter = false, $footerText = '')
    {
        $this->title = $title;
        $this->body = $body;
        $this->color = $color;
        $this->size = $size;
        $this->url = $url;
        $this->withFooter = $withFooter;
        $this->footerText = $footerText;

        if (! collect(['light', 'light-gray', 'red', 'dark'])->contains($this->color)) {
            throw new Exception('Provided color is not supported');
        }

        if (! collect(['default', 'sm'])->contains($this->size)) {
            throw new Exception('Provided size is not supported');
        }
    }

    public function cardClasses()
    {
        $classes = collect()
            ->merge([
                'inline-flex',
                'flex-col',
                'shadow-sm',
                'transition-colors',
                'focus:outline-none',
                'focus:ring',
                'focus:ring-blue-500',
                'p-4',
            ])
            ->merge([
                $this->attributes->first('class'),
            ]);

        if ($this->color === 'light') {
            $classes = $classes->merge(['text-black bg-white hover:bg-gray-100']);
        }

        if ($this->color === 'light-gray') {
            $classes = $classes->merge(['text-black bg-gray-200 hover:bg-gray-300']);
        }

        if ($this->color === 'dark') {
            $classes = $classes->merge(['text-white bg-black hover:bg-gray-800']);
        }

        if ($this->color === 'red') {
            $classes = $classes->merge(['text-white bg-red-600 hover:bg-red-800']);
        }

        return $classes->join(' ');
    }

    public function titleClasses()
    {
        $classes = collect();

        if ($this->size === 'default') {
            $classes = $classes->merge(['text-lg']);
        }

        if ($this->size === 'sm') {
            $classes = $classes->merge(['text-sm']);
        }

        return $classes->join(' ');
    }

    public function bodyClasses()
    {
        $classes = collect([
            'mt-2',
        ]);

        if ($this->size === 'default') {
            $classes = $classes->merge(['text-sm']);
        }

        if ($this->size === 'sm') {
            $classes = $classes->merge(['text-xs']);
        }

        return $classes->join(' ');
    }

    public function render()
    {
        return View::make('kernl-ui::cards.simple-link');
    }
}
