<?php
namespace Northeastern\Blade\Components\Cards;

use Exception;
use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Event extends Component
{
    public $imageUrl;
    public $title;
    public $body;
    public $color;
    public $url;
    public $withFooter;
    public $footerText;
    public $date;
    public $time;

    public function __construct(
        $title,
        $body,
        $imageUrl,
        $url = '#',
        $color = 'light',
        $withFooter = false,
        $footerText = '',
        $date = null,
        $time = null
    ) {
        $this->imageUrl = $imageUrl;
        $this->title = $title;
        $this->body = $body;
        $this->color = $color;
        $this->url = $url;
        $this->withFooter = $withFooter;
        $this->footerText = $footerText;
        $this->date = $date;
        $this->time = $time;

        if (! collect(['light', 'light-gray', 'dark'])->contains($this->color)) {
            throw new Exception('Provided color is not supported');
        }
    }

    public function cardClasses()
    {
        return collect()
            ->merge([
                'w-full',
                'shadow-sm',
                'transition-colors',
                'group',
                'focus:outline-none',
                'focus:ring',
                'focus:ring-blue-500',
                'block',
                'max-w-xs',
            ])
            ->merge([
                $this->attributes->first('class'),
            ])
            // Color
            ->when($this->color === 'light', function ($classes) {
                return $classes->push('bg-white', 'hover:bg-gray-100', 'text-gray-900');
            })
            ->when($this->color === 'light-gray', function ($classes) {
                return $classes->push('bg-gray-200', 'hover:bg-gray-300', 'text-gray-900');
            })
            ->when($this->color === 'dark', function ($classes) {
                return $classes->push('bg-black', 'hover:bg-gray-800', 'text-white');
            })
            ->join(' ')
            ;
    }

    public function titleClasses()
    {
        return collect()
            ->merge([
                'text-lg',
                'font-bold',
            ])
            ->when($this->color === 'dark', function ($classes) {
                return $classes->merge([
                    'text-white',
                ]);
            })
            ->when($this->color !== 'dark', function ($classes) {
                return $classes->merge([
                    'text-gray-900',
                ]);
            })
            ->join(' ')
            ;
    }

    public function bodyClasses()
    {
        return collect()
            ->merge([
                'mt-2',
                'text-sm',
            ])
            ->when($this->color === 'dark', function ($classes) {
                return $classes->merge([
                    'text-gray-300',
                ]);
            })
            ->when($this->color !== 'dark', function ($classes) {
                return $classes->merge([
                    'text-gray-700',
                ]);
            })
            ->join(' ')
            ;
    }

    public function eventClasses()
    {
        return collect()
            ->merge([
                'space-y-2',
            ])
            ->when($this->color === 'dark', function ($classes) {
                return $classes->push('text-white');
            })
            ->when($this->color !== 'dark', function ($classes) {
                return $classes->push('text-gray-900');
            })
            ->join(' ');
    }

    public function footerClasses()
    {
        return collect()
            ->merge([
                'flex',
                'items-center',
                'justify-between',
                'mt-10',
            ])
            ->when($this->color === 'dark', function ($classes) {
                return $classes->merge([
                    'text-gray-300',
                ]);
            })
            ->when($this->color !== 'dark', function ($classes) {
                return $classes->merge([
                    'text-gray-700',
                ]);
            })
            ->join(' ')
            ;
    }

    public function footerTextClasses()
    {
        return collect()
            ->merge([
                'text-sm',
            ])
            ->join(' ')
            ;
    }

    public function render()
    {
        return View::make('kernl-ui::cards.event');
    }
}
