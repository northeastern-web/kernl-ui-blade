<?php

namespace Northeastern\Blade;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Northeastern\Blade\Components\Accordion\Base as AccordionBase;
use Northeastern\Blade\Components\Accordion\Item as AccordionItem;
use Northeastern\Blade\Components\Accordion\WithLeftIcon as AccordionWithLeftIcon;
use Northeastern\Blade\Components\Alert\Contained as AlertContained;
use Northeastern\Blade\Components\Alert\FullWidth as AlertFullWidth;
use Northeastern\Blade\Components\Button\Outline as ButtonOutline;
use Northeastern\Blade\Components\Button\Solid as ButtonSolid;
use Northeastern\Blade\Components\Carousel\Base as CarouselBase;
use Northeastern\Blade\Components\Carousel\Base\Slide as CarouselBaseSlide;
use Northeastern\Blade\Components\Carousel\Split as CarouselSplit;
use Northeastern\Blade\Components\Carousel\Split\Slide as CarouselSplitSlide;
use Northeastern\Blade\Components\LocalHeader;
use Northeastern\Blade\Components\Tabs\Bordered as TabsBordered;
use Northeastern\Blade\Components\Tabs\Detached as TabsDetached;
use Northeastern\Blade\Components\Tabs\Underlined as TabsUnderlined;

class ServiceProvider extends BaseServiceProvider
{
    const COMPONENTS = [
        LocalHeader::class => 'kernl-local-header',
        AccordionBase::class => 'kernl-accordion.base',
        AccordionItem::class => 'kernl-accordion.item',
        AccordionWithLeftIcon::class => 'kernl-accordion.with-left-icon',
        AlertContained::class => 'kernl-alert.contained',
        AlertFullWidth::class => 'kernl-alert.full-width',
        ButtonOutline::class => 'kernl-button.outline',
        ButtonSolid::class => 'kernl-button.solid',
        CarouselBase::class => 'kernl-carousel.base',
        CarouselBaseSlide::class => 'kernl-carousel.base.slide',
        CarouselSplit::class => 'kernl-carousel.split',
        CarouselSplitSlide::class => 'kernl-carousel.split.slide',

        TabsUnderlined::class => 'kernl-tabs.underlined',
        TabsUnderlined\Item::class => 'kernl-tabs.underlined.item',
        TabsBordered::class => 'kernl-tabs.bordered',
        TabsBordered\Item::class => 'kernl-tabs.bordered.item',
        TabsDetached::class => 'kernl-tabs.detached',
        TabsDetached\Item::class => 'kernl-tabs.detached.item',
    ];
}
