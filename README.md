# Northeastern Support

Package of Blade components for Northeastern University websites

## Prequisites

In order to use this package, your project must be using the [@northeastern-web/kernl-ui JavaScript and CSS package](https://npmjs.com/package/@northeastern-web/kernl-ui).

Your project also must support the new Laravel Blade 7 components.

## Installation

You can install the package via composer:

```bash
composer require northeastern-web/kernl-ui-blade
```

> Note: You may need to add the following to your `composer.json` file before installing the package.

```json
    "minimum-stability": "dev",
    "prefer-stable": true
```

If your project is using PurgeCss, merge the default PurgeCss content from the `@northeaster-web/kernl-ui` package in your `tailwind.config.js`:

```js
// tailwind.config.js
const defaultConfig = require('@northeastern-web/kernl-ui/defaultConfig');

module.exports = {
    purge: {
        content: [
            ...defaultConfig.purge.content,
            // Your project specific content...
        ],
    },
    // Other stuff...
}
```

## Usage

### Tighten Jigsaw

To use the components in a [tightenco/jigsaw](https://jigsaw.tighten.co), load the `Northeastern\Blade\JigsawServiceProvider` class in the Jigsaw `beforeBuild` event:

```php
// bootstrap.php

use Northeastern\Blade\JigsawServiceProvider;
use TightenCo\Jigsaw\Jigsaw;

$events->beforeBuild(function (Jigsaw $jigsaw) {
    (new JigsawServiceProvider($jigsaw->app))->boot();
});
```

## Components

### Local Header

To use the local header component, add the following markup to your Blade template.

```blade
<x-kernl-local-header :links="$links" :current-path="$currentPath">
    <x-slot name="logo">
        <!-- Insert SVG logo here with class="w-full" applied -->
    </x-slot>
    <x-slot name="afterLinksMobile">
        <!-- Insert any additional elements that should be included after the links in the mobile menu (logout forms, etc.). This slot it optional. -->
    </x-slot>
    <x-slot name="afterLinksDesktop">
        <!-- Insert any additional elements that should be included after the links in the desktop menu (logout forms, search modal, etc.) -->
    </x-slot>
</x-kernl-local-header>
```

#### Props

- `links` = Array of links for the navigation sections of the header. Each link can have a `children` key that's an array of more links. These links will be displayed in a dropdown under the parent link. Example:
    ```php
    $links = [
        [
            'text' => 'Our Programs',
            'href' => '/programs',
            // The `match` key is used to determine if top-level links should have the active state show. Uses Laravel's Str::is() helper under the hood, so wildcards or arrays of possible matches are allowed. If no active state should be shown, omit this key.
            'match' => '/programs*',
        ],
        [
            'text' => 'About',
            'href' => '/about',
            'match' => '/about*',
            'children' => [
                [
                    'text' => 'Careers',
                    'href' => '/about/careers',
                ],
                [
                    'text' => 'Staff',
                    'href' => '/about/staff',
                ],
            ],
        ],
    ];
    ```
- `current-path` - Used to display the active state on each link. Pass the relative path of the current page (`/about/staff`).

### Accordions

To use the accordion component, add the following markup to your Blade template.

```blade
<x-kernl-accordion.base label="Leadership roles accordion" default-section="accordion-item-1">
    <x-kernl-accordion.item title="Accordion Item 1 Title" id="accordion-item-2">
        Accordion Item 1 Content
    </x-kernl-accordion.item>
    <x-kernl-accordion.item title="Accordion Item 2 Title" id="accordion-item-2">
        Accordion Item 2 Content
    </x-kernl-accordion.item>
</x-kernl-accordion.base>
```

Alertnatively, you can use the `x-kernl-accordion.with-left-icon` component for a slightly different design.

```blade
<x-kernl-accordion.base label="Leadership roles accordion" default-section="accordion-item-1">
    <x-kernl-accordion.with-left-icon title="Accordion Item 1 Title" id="accordion-item-2">
        Accordion Item 1 Content
    </x-kernl-accordion.with-left-icon>
    <x-kernl-accordion.item title="Accordion Item 2 Title" id="accordion-item-2">
        Accordion Item 2 Content
    </x-kernl-accordion.item>
</x-kernl-accordion.base>
```

#### `x-kernl-accordion.base` Props

- `label` = The aria-label for the accordion `ul` element
- `default-section` (optional) = The `id` of the accordion item that should be open by default

#### `x-kernl-accordion.item`/`x-kernl-accordion.with-left-icon` Props

- `title` - The title that should be shown on the accordion button
- `id` (optional) - The ID that should be assigned to the accordion. This should match the `default-section` prop passed to the base accordion component for the accordion item that should be open by default.

## Carousels

### Base and Base Slide

To use the Carousel Base and Base Slide component, add the following markup to your Blade template.

```blade
<x-kernl-carousel.base>
    <x-kernl-carousel.base.slide
        :index="0"
        background-classes="text-white bg-red-800"
    >
        Example carousel slide
    <x-kernl-carousel.base.slide
        :index="1"
        background-classes="text-white bg-blue-800 bg-cover bg-no-repeat bg-center"
        slot-classes="max-w-6xl"
        style="background-image: url('...background-image-url')"
    >
        Example carousel slide with background image
    </x-kernl-carousel.base.slide>
</x-kernl-carousel.base>
```

#### `x-kernl-carousel.base` Props

- `delay` - (optional) The delay that the slides should rotate at in milliseconds. Default value is 5000.

#### `x-kernl-carousel.base.slide` Props

- `index` - The index of the slide. *Each slide's index should increase by 1, starting at 0.*
- `background-classes` - (optional) Any classes you want to apply to the outter element.
- `slot-classes` - (optional) Any classes you want to apply to the element around the slot.
