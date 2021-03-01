<?php
namespace Northeastern\Blade\Components\Heroes;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class SplitLayoutContentMedia extends Component
{
    public $mediaUrl;
    public $title;
    public $body;
    public $callToAction;
    public $callToActionUrl;

    public function __construct($mediaUrl, $title = null, $body = null, $callToAction = null, $callToActionUrl = null)
    {
        $this->mediaUrl = $mediaUrl;
        $this->title = $title;
        $this->body = $body;
        $this->callToAction = $callToAction;
        $this->callToActionUrl = $callToActionUrl;
    }

    public function render()
    {
        return View::make('kernl-ui::heroes.split-layout-content-media');
    }
}
