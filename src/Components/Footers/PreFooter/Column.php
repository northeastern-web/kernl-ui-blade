<?php
namespace Northeastern\Blade\Components\Footers\PreFooter;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Column extends Component
{
    public $featherIcon;
    public $title;
    public $link;
    public $description;


    public function __construct(
        $featherIcon = null,
        $title = null,
        $link = [],
        $description = null
    ) {
        $this->featherIcon = $featherIcon;
        $this->title = $title;
        $this->link = $link;
        $this->description = $description;
    }

    public function render()
    {
        return View::make('kernl-ui::footers.pre-footer.column');
    }
}
