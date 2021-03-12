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

    public function __construct($title = null, $body = null, $url = '#', $color = 'light', $size = 'default', $withFooter = false, $footerText = '')
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
        return collect()
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
            ])
            // Size
            ->when($this->size === 'default', function ($classes) {
                return $classes->push('max-w-xs', 'w-full', 'px-6', 'py-8');
            })
            ->when($this->size === 'sm', function ($classes) {
                return $classes->push('w-64', 'p-4');
            })
            // Color
            ->when($this->color === 'light', function ($classes) {
                return $classes->push('text-black', 'bg-white', 'hover:bg-gray-100');
            })
            ->when($this->color === 'light-gray', function ($classes) {
                return $classes->push('text-black', 'bg-gray-200', 'hover:bg-gray-300');
            })
            ->when($this->color === 'dark', function ($classes) {
                return $classes->push('text-white', 'bg-black', 'hover:bg-gray-800');
            })
            ->when($this->color === 'red', function ($classes) {
                return $classes->push('text-white', 'bg-red-600', 'hover:bg-red-800');
            })
            ->join(' ')
            ;
    }

    public function titleClasses()
    {
        return collect()
            ->when($this->size === 'default', function ($classes) {
                return $classes->merge(['text-lg']);
            })
            ->when($this->size === 'sm', function ($classes) {
                return $classes->merge(['text-sm']);
            })
            ->join(' ')
            ;
    }

    public function bodyClasses()
    {
        return collect()
            ->merge([
                'mt-2',
            ])
            ->when($this->size === 'default', function ($classes) {
                return $classes->merge(['text-sm']);
            })

            ->when($this->size === 'sm', function ($classes) {
                return $classes->merge(['text-xs']);
            })
            ->join(' ')
            ;
    }

    public function render()
    {
        return View::make('kernl-ui::cards.simple-link');
    }
}
