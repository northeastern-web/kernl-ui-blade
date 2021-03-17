<?php
namespace Northeastern\Blade\Components\Cards;

use Exception;
use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class SimpleWithActions extends Component
{
    public $title;
    public $body;
    public $color;
    public $size;
    public $primaryActionText;
    public $primaryActionUrl;
    public $secondaryActionText;
    public $secondaryActionUrl;

    public function __construct($title = null, $body = null, $primaryActionText = null, $primaryActionUrl = null, $secondaryActionText = null, $secondaryActionUrl = null, $color = 'light', $size = 'default')
    {
        $this->title = $title;
        $this->body = $body;
        $this->color = $color;
        $this->size = $size;

        $this->primaryActionText = $primaryActionText;
        $this->primaryActionUrl = $primaryActionUrl;
        $this->secondaryActionText = $secondaryActionText;
        $this->secondaryActionUrl = $secondaryActionUrl;

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
                'flex',
                'flex-col',
                'shadow-sm',
            ])
            ->merge([
                $this->attributes->first('class'),
            ])
            // Size
            ->when($this->size === 'default', function ($classes) {
                return $classes->push('px-6', 'py-8');
            })
            ->when($this->size === 'sm', function ($classes) {
                return $classes->push('p-4');
            })
            // Color
            ->when($this->color === 'light', function ($classes) {
                return $classes->push('text-black', 'bg-white');
            })
            ->when($this->color === 'light-gray', function ($classes) {
                return $classes->push('text-black', 'bg-gray-200');
            })
            ->when($this->color === 'dark', function ($classes) {
                return $classes->push('text-white', 'bg-black');
            })
            ->when($this->color === 'red', function ($classes) {
                return $classes->push('text-white', 'bg-red-600');
            })
            ->join(' ')
            ;
    }

    public function titleClasses()
    {
        return collect()
            ->when($this->size === 'default', function ($classes) {
                return $classes->push('text-lg');
            })
            ->when($this->size === 'sm', function ($classes) {
                return $classes->push('text-sm');
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
                return $classes->push('text-sm');
            })
            ->when($this->size === 'sm', function ($classes) {
                return $classes->push('text-xs');
            })
            ->join(' ')
        ;
    }

    public function primaryActionClasses()
    {
        return collect()
            ->merge([
                'btn',
                'btn-sm',
            ])
            ->when($this->color === 'red', function ($classes) {
                return $classes->push('text-white',  'bg-black', 'hover:bg-gray-800');
            })
            ->when($this->color !== 'red', function ($classes) {
                return $classes->push('text-white', 'bg-red-600', 'hover:bg-red-800');
            })
            ->join(' ')
        ;
    }

    public function render()
    {
        return View::make('kernl-ui::cards.simple-with-actions');
    }
}
