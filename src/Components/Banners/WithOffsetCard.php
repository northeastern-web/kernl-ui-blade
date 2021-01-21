<?php
namespace Northeastern\Blade\Components\Banners;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class WithOffsetCard extends Component
{
    public $backgroundUrl;

    public function __construct($backgroundUrl = null)
    {
        $this->backgroundUrl = $backgroundUrl;
    }

    public function render()
    {
        return View::make('kernl-ui::banners.with-offset-card');
    }
}
