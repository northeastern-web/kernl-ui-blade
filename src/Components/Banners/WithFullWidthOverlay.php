<?php
namespace Northeastern\Blade\Components\Banners;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class WithFullWidthOverlay extends Component
{
    public $includeImage;
    public $backgroundUrl;
    public $height;
    public $solidBackgroundColor;

    public function __construct($includeImage = null, $backgroundUrl = null, $height = null, $solidBackgroundColor = null)
    {
        $this->includeImage = $includeImage;
        $this->backgroundUrl = $backgroundUrl;
        $this->height = $height;
        $this->solidBackgroundColor = $solidBackgroundColor;
    }



    public function render()
    {
        return View::make('kernl-ui::banners.with-full-width-overlay');
    }
}
