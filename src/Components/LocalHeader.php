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
    public $logoDark;
    public $logoLight;
    public $megaMenuCta;
    public $megaMenuAlert;
    public $megaMenuCopy;
    public $menuStyle;
    public $search;
    public $searchName;
    public $siteHome;
    public $siteName;
    public $supportNav;

    public function __construct(
        $action = null,
        $currentPath = null,
        $dark = false,
        $links = [],
        $logoDark = null,
        $logoLight = null,
        $megaMenuCta = [],
        $megaMenuAlert = null,
        $megaMenuCopy = null,
        $menuStyle = null,
        $search = true,
        $searchName = null,
        $siteHome = null,
        $siteName = null,
        $supportNav = []
    ) {
        $this->action = $action;
        $this->currentPath = $currentPath;
        $this->dark = $dark;
        $this->links = $links;
        $this->logoDark = $logoDark;
        $this->logoLight = $logoLight;
        $this->megaMenuCta = $megaMenuCta;
        $this->megaMenuAlert = $megaMenuAlert;
        $this->megaMenuCopy = $megaMenuCopy;
        $this->menuStyle = $menuStyle;
        $this->search = $search;
        $this->searchName = $searchName;
        $this->siteHome = $siteHome;
        $this->siteName = $siteName;
        $this->supportNav = $supportNav;
    }

    public function render()
    {
        return View::make('kernl-ui::local-header');
    }
}
