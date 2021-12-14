<?php
namespace Northeastern\Blade\Components;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class LocalHeader extends Component
{
    public $action;
    public $currentPath;
    public $dark;
    public $links;
    public $logoBlack;
    public $logoWhite;
    public $megaMenuCta;
    public $megaMenuAlert;
    public $megaMenuCopy;
    public $menuStyle;
    public $search;
    public $searchName;
    public $siteName;
    public $supportNav;

    public function __construct(
        $action = null,
        $currentPath = null,
        $dark = false,
        $links = [],
        $logoBlack = null,
        $logoWhite = null,
        $megaMenuCta = [],
        $megaMenuAlert = null,
        $megaMenuCopy = null,
        $menuStyle = null,
        $search = true,
        $searchName = null,
        $siteName = null,
        $supportNav = []
    ) {
        $this->action = $action;
        $this->currentPath = $currentPath;
        $this->dark = $dark;
        $this->links = $links;
        $this->logoBlack = $logoBlack;
        $this->logoWhite = $logoWhite;
        $this->megaMenuCta = $megaMenuCta;
        $this->megaMenuAlert = $megaMenuAlert;
        $this->megaMenuCopy = $megaMenuCopy;
        $this->menuStyle = $menuStyle;
        $this->search = $search;
        $this->searchName = $searchName;
        $this->siteName = $siteName;
        $this->supportNav = $supportNav;
    }

    public function render()
    {
        return View::make('kernl-ui::local-header');
    }
}
