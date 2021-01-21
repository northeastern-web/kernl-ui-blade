<?php
namespace Northeastern\Blade\Components\Banners;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class BottomTitle extends Component
{
    public $title;

    public $backgroundUrl;

    public function __construct(
        $title = null,
        $backgroundUrl = null
    )
    {
        $this->title = $title;
        $this->backgroundUrl = $backgroundUrl;
    }

    public function render()
    {
        return View::make('kernl-ui::banners.bottom-title');
    }
}
