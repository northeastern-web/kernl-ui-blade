<?php

namespace Northeastern\Blade;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Northeastern\Blade\Components\Accordion\Base as AccordionBase;
use Northeastern\Blade\Components\Accordion\Item as AccordionItem;
use Northeastern\Blade\Components\Accordion\WithLeftIcon as AccordionWithLeftIcon;
use Northeastern\Blade\Components\Alert\Contained as AlertContained;
use Northeastern\Blade\Components\Alert\FullWidth as AlertFullWidth;
use Northeastern\Blade\Components\Banners\BottomTitle as BannersBottomTitle;
use Northeastern\Blade\Components\Banners\WithOffsetCard as BannersWithOffsetCard;
use Northeastern\Blade\Components\Button\Outline as ButtonOutline;
use Northeastern\Blade\Components\Button\Solid as ButtonSolid;
use Northeastern\Blade\Components\Carousel\Base as CarouselBase;
use Northeastern\Blade\Components\Carousel\Base\Slide as CarouselBaseSlide;
use Northeastern\Blade\Components\Carousel\Split as CarouselSplit;
use Northeastern\Blade\Components\Carousel\Split\Slide as CarouselSplitSlide;
use Northeastern\Blade\Components\Loaders\Dark as LoadersDark;
use Northeastern\Blade\Components\Loaders\Light as LoadersLight;
use Northeastern\Blade\Components\LocalHeader;
use Northeastern\Blade\Components\Tags\Outline as TagsOutline;
use Northeastern\Blade\Components\Tags\Solid as TagsSolid;
use Northeastern\Blade\Components\Modals\Base as ModalsBase;
use Northeastern\Blade\Components\Scripts;

class ServiceProvider extends BaseServiceProvider
{
    const COMPONENTS = [
        LocalHeader::class => 'kernl-local-header',
        AccordionBase::class => 'kernl-accordion.base',
        AccordionItem::class => 'kernl-accordion.item',
        AccordionWithLeftIcon::class => 'kernl-accordion.with-left-icon',
        AlertContained::class => 'kernl-alert.contained',
        AlertFullWidth::class => 'kernl-alert.full-width',
        BannersWithOffsetCard::class => 'kernl-banners.with-offset-card',
        BannersBottomTitle::class => 'kernl-banners.bottom-title',
        ButtonOutline::class => 'kernl-button.outline',
        ButtonSolid::class => 'kernl-button.solid',
        CarouselBase::class => 'kernl-carousel.base',
        CarouselBaseSlide::class => 'kernl-carousel.base.slide',
        CarouselSplit::class => 'kernl-carousel.split',
        CarouselSplitSlide::class => 'kernl-carousel.split.slide',
        LoadersLight::class => 'kernl-loaders.light',
        LoadersDark::class => 'kernl-loaders.dark',
        TagsSolid::class => 'kernl-tags.solid',
        TagsOutline::class => 'kernl-tags.outline',
        ModalsBase::class => 'kernl-modals.base',
        Scripts::class => 'kernl-scripts',
    ];
}
