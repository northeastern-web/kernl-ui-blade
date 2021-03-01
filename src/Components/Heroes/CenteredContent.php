<?php
namespace Northeastern\Blade\Components\Heroes;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class CenteredContent extends Component
{
    public $title;
    public $subtitle;
    public $body;

    public function __construct($title = null, $subtitle = null, $body = null)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->body = $body;
    }

    public function render()
    {
        return View::make('kernl-ui::heroes.centered-content');
    }
}
