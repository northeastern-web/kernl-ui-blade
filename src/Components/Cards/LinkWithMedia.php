<?php
namespace Northeastern\Blade\Components\Cards;

use Exception;
use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class LinkWithMedia extends Component
{
    public $imageUrl;
    public $title;
    public $body;
    public $badge;
    public $preHeader;
    public $color;
    public $url;
    public $withFooter;
    public $footerText;
    public $aspectRatio;
    public $orientation;

    public function __construct($imageUrl, $title, $body = null, $badge = null, $preHeader = null, $url = '#', $color = 'light', $aspectRatio = '16:9', $withFooter = false, $footerText = '', $orientation = 'vertical')
    {
        $this->imageUrl = $imageUrl;
        $this->title = $title;
        $this->body = $body;
        $this->badge = $badge;
        $this->preHeader = $preHeader;
        $this->color = $color;
        $this->url = $url;
        $this->withFooter = $withFooter;
        $this->footerText = $footerText;
        $this->aspectRatio = $aspectRatio;
        $this->orientation = $orientation;

        if (! collect(['light', 'light-gray', 'dark'])->contains($this->color)) {
            throw new Exception('Provided color is not supported');
        }

        if (! collect(['16:9', '1:1', '4:5', '5:4'])->contains($this->aspectRatio)) {
            throw new Exception('Aspect ratio is not supported');
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
            ])
            ->merge([
                $this->attributes->first('class'),
            ])
            // Color
            ->when($this->color === 'light', function ($classes) {
                return $classes->push('bg-white', 'hover:bg-gray-100');
            })
            ->when($this->color === 'light-gray', function ($classes) {
                return $classes->push('bg-gray-200', 'hover:bg-gray-300');
            })
            ->when($this->color === 'dark', function ($classes) {
                return $classes->push('bg-black', 'hover:bg-gray-800');
            })
            // Orientation
            ->when($this->orientation === 'vertical', function ($classes) {
                return $classes->push('block', 'max-w-xs');
            })
            ->when($this->orientation === 'horizontal', function ($classes) {
                return $classes->push('flex', 'flex-col', 'max-w-sm', 'lg:flex-row', 'lg:max-w-xl');
            })
            ->when($this->orientation === 'horizontal-flipped', function ($classes) {
                return $classes->push('flex', 'flex-col', 'max-w-sm', 'lg:flex-row-reverse', 'lg:max-w-xl');
            })
            ->join(' ')
            ;
    }

    public function titleClasses()
    {
        return collect()
            ->merge([
                'text-lg',
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
                'px-5',
                'flex-1',
            ])
            ->when($this->withFooter, function ($classes) {
                return $classes->merge(['pt-8', 'pb-2']);
            })
            ->when(! $this->withFooter, function ($classes) {
                return $classes->merge(['py-8']);
            })
            ->join(' ')
            ;
    }

    public function preHeaderClasses()
    {
        return collect()
            ->merge([
                'pb-2',
                'text-xs',
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


    public function messageClasses()
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

    public function imageOuterImageContainerClasses()
    {
        return collect()
            ->merge([
                'relative',
                'w-full',
                'bg-black',
                'lg:max-w-xs',
            ])
            ->when($this->orientation !== 'vertical', function ($classes) {
                return $classes->push('flex-shrink-0', 'lg:w-72');
            })
            ->join(' ')
        ;
    }

    public function imageInnerImageContainerClasses()
    {
        return collect()
            ->merge([
                'h-full',
            ])
            ->when($this->aspectRatio === '1:1', function ($classes) {
                return $classes->push('aspect-w-1', 'aspect-h-1');
            })
            ->when($this->aspectRatio === '16:9', function ($classes) {
                return $classes->push('aspect-w-16', 'aspect-h-9');
            })
            ->when($this->aspectRatio === '4:5', function ($classes) {
                return $classes->push('aspect-w-4', 'aspect-h-5');
            })
            ->when($this->aspectRatio === '5:4', function ($classes) {
                return $classes->push('aspect-w-5', 'aspect-h-4');
            })
            ->join(' ')
            ;
    }

    public function footerClasses()
    {
        return collect()
            ->merge([
                'flex',
                'items-center',
                'justify-between',
                'px-5',
                'py-6',
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

    public function footerTextClasses()
    {
        return collect()
            ->merge([
                'py-1',
                'border-b-2',
                'border-transparent',
                'transition-colors',
                'duration-200',
            ])
            ->when($this->color === 'dark', function ($classes) {
                return $classes->merge([
                    'group-hover:border-gray-300',
                ]);
            })
            ->when($this->color !== 'dark', function ($classes) {
                return $classes->merge([
                    'group-hover:border-red-600',
                ]);
            })
            ->join(' ')
            ;
    }

    public function render()
    {
        return View::make('kernl-ui::cards.link-with-media');
    }
}
