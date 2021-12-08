<?php
namespace Northeastern\Blade\Components\Footers\PreFooter;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Base extends Component
{
    public $columns;
    public $featherIcon;
    public $title;
    public $link;
    public $description;


    public function __construct(
        $columns = null
    ) {
        $this->columns = $columns;
    }

    public function render()
    {
        return View::make('kernl-ui::footers.pre-footer.base');
    }
}
