<?php
namespace Northeastern\Blade\Components\Footers;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Local extends Component
{
    public $links;

    public $logoHref;

    public $facebookUrl;

    public $twitterUrl;

    public $youtubeUrl;

    public $linkedinUrl;

    public $instagramUrl;

    public $snapchatUrl;

    public function __construct(
        $links = [],
        $logoHref = '#',
        $facebookUrl = null,
        $twitterUrl = null,
        $youtubeUrl = null,
        $linkedinUrl = null,
        $instagramUrl = null,
        $snapchatUrl = null
    ) {
        $this->links = $links;

        $this->logoHref = $logoHref;

        $this->facebookUrl = $facebookUrl;
        $this->twitterUrl = $twitterUrl;
        $this->youtubeUrl = $youtubeUrl;
        $this->linkedinUrl = $linkedinUrl;
        $this->instagramUrl = $instagramUrl;
        $this->snapchatUrl = $snapchatUrl;
    }

    public function render()
    {
        return View::make('kernl-ui::footers.local');
    }
}
