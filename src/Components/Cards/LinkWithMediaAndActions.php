<?php
namespace Northeastern\Blade\Components\Cards;

use Exception;
use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class LinkWithMediaAndActions extends Component
{
    public $imageUrl;
    public $title;
    public $body;
    public $badge;
    public $preHeader;
    public $color;
    public $aspectRatio;
    public $orientation;
    public $primaryActionText;
    public $primaryActionUrl;
    public $secondaryActionText;
    public $secondaryActionUrl;

    public function __construct(
        $imageUrl,
        $title,
        $body = null,
        $badge = null,
        $preHeader = null,
        $color = 'light',
        $aspectRatio = '16:9',
        $orientation = 'vertical',
        $primaryActionText = null,
        $primaryActionUrl = null,
        $secondaryActionText = null,
        $secondaryActionUrl = null
    )
    {
        $this->imageUrl = $imageUrl;
        $this->title = $title;
        $this->body = $body;
        $this->badge = $badge;
        $this->preHeader = $preHeader;
        $this->color = $color;
        $this->aspectRatio = $aspectRatio;
        $this->orientation = $orientation;
        $this->primaryActionText = $primaryActionText;
        $this->primaryActionUrl = $primaryActionUrl;
        $this->secondaryActionText = $secondaryActionText;
        $this->secondaryActionUrl = $secondaryActionUrl;

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
                'block',
                'w-full',
                'shadow-sm',
            ])
            ->merge([
                $this->attributes->first('class'),
            ])
            // Color
            ->when($this->color === 'light', function ($classes) {
                return $classes->push('bg-white');
            })
            ->when($this->color === 'light-gray', function ($classes) {
                return $classes->push('bg-gray-200');
            })
            ->when($this->color === 'dark', function ($classes) {
                return $classes->push('bg-black');
            })
            // Orientation
            ->when($this->orientation === 'vertical', function ($classes) {
                return $classes->push('max-w-xs');
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

    public function render()
    {
        return View::make('kernl-ui::cards.link-with-media-and-actions');
    }
}
