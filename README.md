# kernl(ui) Blade

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

### Laravel app

To use the components in a Laravel app, the Service Provider should be loaded automatically, requiring no extra configuration.

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
<x-kernl-local-header :links="$links" :current-path="$currentPath" action="#">
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
- `dark` (optional) - Set the color scheme to dark. Default is false. If using dark mode, be sure to update all fills in the logo you're using to white (#ffffff).
- `action` (optional) - Adds search component to header. `action` should be the url the search form should GET to. `search` will be forwarded with the input value. 

### Accordions

To use the accordion component, add the following markup to your Blade template.

```blade
<x-kernl-accordion.base label="Leadership roles accordion" default-section="accordion-item-1">
    <x-kernl-accordion.item title="Accordion Item 1 Title" id="accordion-item-1">
        Accordion Item 1 Content
    </x-kernl-accordion.item>
    <x-kernl-accordion.item title="Accordion Item 2 Title" id="accordion-item-2">
        Accordion Item 2 Content
    </x-kernl-accordion.item>
</x-kernl-accordion.base>
```

Alternatively, you can use the `x-kernl-accordion.with-left-icon` component for a slightly different design.

```blade
<x-kernl-accordion.base label="Leadership roles accordion" default-section="accordion-item-1">
    <x-kernl-accordion.with-left-icon title="Accordion Item 1 Title" id="accordion-item-`">
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

### Alerts

To use the alert components, add the following markup to your Blade template.

```blade
<x-kernl-alert.contained
    label="COVID warning"
    class="absolute bottom-0 inset-x-0 py-4"
    :closable="false"
    :remember="true"
>
    <p>Questions about campus opening and COVID-19 testing? Go here to get the latest...</p>
</x-kernl-alert.contained>
```

Alternatively, you can use the `x-kernl-alert.full-width` component for a slightly different design.

```blade
<x-kernl-alert.full-width
    label="COVID warning"
    class="absolute bottom-0 inset-x-0"
    :closable="false"
    :remember="true"
>
    <p>Questions about campus opening and COVID-19 testing? Go here to get the latest...</p>
</x-kernl-alert.full-width>
```

#### `x-kernl-alert.container` and `x-kernl-alert.full-width` Props

- `label` - Used for the aria-label and "remember" functionality. Should be unique across your site if using the "remember" functionality.
- `closeable` (optional) - If true, show the close button. If false, do not show the close button. Default is true.
- `remember` (optional) - If true, the component will use localStorage to remember when the user has closed the alert and will not show it again.

Any additional classes or attributes you put on the component will be passed through.

### Banners

### With Offset Card

To use the With Offset Card Banner component, add the following markup to your Blade template.

```blade
<x-kernl-banners.with-offset-card
    background-url=""
>
    {{--Card content goes here--}}
</x-kernl-banners.with-offset-card>
```

#### `x-kernl-banners.with-offset-card` Props

- `background-url` - URL of background image to be applied.

### Bottom Title

To use the Bottom Title Banner component, add the following markup to your Blade template.

```blade
<x-kernl-banners.bottom-title
    background-url=""
    title=""
/>
```

#### `x-kernl-banners.bottom-title` Props

- `background-url` - URL of background image to be applied.
- `title` - Title to be presented.

### Buttons

To use the Solid Button and Outline Button components, add the following markup to your Blade template.

```blade
<x-kernl-button.solid color="black">
    Button Text
</x-kernl-button.solid>

<!-- or -->

<x-kernl-button.outline color="black">
    Button Text
</x-kernl-button.outline>
```

By default, the button components will render a `button` element. If you need an `anchor` element instead, just include the `href` prop.

Any additional classes or attributes you put on the component will be passed through.

```
<x-kernl-button.solid color="white" class="rounded-full" @click="doSomething">
    Button
</x-kernl-button.solid>
```

#### `x-kernl-button.solid` and `x-kernl-button.outline` Props

- color - The color the button should be. Options: `black`, `white`, `gray-600`, `gray-300`, `red`, `blue`, and `green`.
- size - (optional) Determines if the button should be smaller or larger than the default size. Options: `small` and `large`.
- href - (optional) Determines if the button should be rendered as an anchor tag and where the anchor should link to.

### Carousels

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
    <!-- More slides -->
</x-kernl-carousel.base>
```

#### `x-kernl-carousel.base` Props

- `delay` - (optional) The delay that the slides should rotate at in milliseconds. Default value is 5000.

#### `x-kernl-carousel.base.slide` Props

- `index` - The index of the slide. *Each slide's index should increase by 1, starting at 0.*
- `background-classes` - (optional) Any classes you want to apply to the outter element.
- `slot-classes` - (optional) Any classes you want to apply to the element around the slot.

Any additional attributes you add to the Base Slide component (`style`, etc.), will be passed through to the background element.

### Split and Split Slide

To use the Split Carousel and Split Slide component, add the following markup to your Blade template.

```blade
<x-kernl-carousel.split height-classes="h-192 md:h-128 lg:h-96">
    <x-kernl-carousel.split.slide :index="0" class="h-96 md:h-128 lg:h-96">
        <div class="w-full flex items-center px-8 py-20 bg-black md:w-1/2 lg:w-2/3 lg:px-16">
            <div>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo doloremque culpa iure cumque voluptatum! Iure provident eligendi ex. Quidem atque commodi vero facilis totam maxime alias, cum quod voluptate nulla!</p>
            </div>
        </div>
        <img class="h-96 md:h-128 lg:h-96 w-full object-cover md:w-1/2 lg:w-1/3" src="...image-url">
    </x-kernl-carousel.split.slide>
    <!-- More slides -->
</x-kernl-carousel.split>
```

#### `x-kernl-carousel.split` Props

- `height-classes` - Classes to set the overall height on the carousel. Should be double each slide height when slides are stacked (mobile).
- `delay` - (optional) The delay that the slides should rotate at in milliseconds. Default value is 5000.

#### `x-kernl-carousel.split.slide` Props

- `index` - The index of the slide. *Each slide's index should increase by 1, starting at 0.*
- `class` - Any classes you want to apply to the element around the slot. This should be used to pass in the height classes.

Any additional attributes you add to the Split Slide component (`style`, etc.), will be passed through to the background element.

### Loaders

To use the Loader component, light or dark, add the following markup to your Blade template.

#### Light

```blade
<div x-data="{ busy: true|false }" class="relative" >
    {{-- Some other content --}}
    <x-kernl-loaders.dark
        x-show="busy"
    />
</div>
```

#### `x-kernl-loaders.light` Props

- `x-show` - (optional) Used to show/hide the loader based on an Alpine.js property

#### Dark

```blade
<div x-data="{ busy: true|false }" class="relative" >
    {{-- Some other content --}}
    <x-kernl-loaders.light
        x-show="busy"
    />
</div>
```

#### `x-kernl-loaders.dark` Props

- `x-show` - (optional) Used to show/hide the loader based on an Alpine.js property

### Tags

### Solid

To use the Solid Tag component, add the following markup to your Blade template.

```blade
<x-kernl-tags.solid
    color="black|white|red|gray-600|gray-300|blue|green|yellow"
    :pill="true|false"
    :uppercase="true|false"
>
    {{-- Content here --}}
</x-kernl-tags.solid>
```

#### `x-kernl-tags.solid` Props

- `color` - Color for text/background. Default is `black`
- `pill` - (optional) Rounds corners for a pill-like appearance. Default is `false`
- `uppercase` - (optional) Uppercase content. Default is `false`

### Outline

To use the Outline Tag component, add the following markup to your Blade template.

```blade
<x-kernl-tags.outline
    color="black|white|red|gray-600|gray-300|blue|green|yellow"
    :pill="true|false"
    :uppercase="true|false"
>
    {{-- Content here --}}
</x-kernl-tags.outline>
```

#### `x-kernl-tags.outline` Props

- `color` - Color for text/border. Default is `black`
- `pill` - (optional) Rounds corners for a pill-like appearance. Default is `false`
- `uppercase` - (optional) Uppercase content. Default is `false`

### Modals

### Base Modal

To use the Base Modal component, add the following markup to your Blade template. The modal can be triggered from anywhere on your page using the `NUModals.open` and `NUModals.close` methods.

```blade
<x-kernl-modals.base
    id="unique-modal-id"
    :closeable="true|false"
    :close-on-click-outside="true|false"
    :close-on-escape-key="true|false"
>
    {{-- Content here --}}
</x-kernl-modals.base>

<button x-data x-on:click="NUModals.open('unique-modal-id')">Open Modal</button>
<button x-data x-on:click="NUModals.close('unique-modal-id')">Close Modal</button>
```

#### `x-kernl-modals.base` Props

- `id` - ID of the modal. Must be unique throughout the app. This ID can be used with `window.NUModals` methods
- `closeable` - (optional) Adds close button at the top right corner. `true` by default
- `close-on-click-outside` - (optional) Adds behavior to close when clicking outside the modal. `true` by default
- `close-on-escape-key` - (optional) Adds behavior to close when pressing the Esc key. `true` by default


### Footer

### Local

To use the Local Footer component, add the following markup to your Blade template.

```blade
<x-kernl-footers.local
    :links="$links"
    logo-url=""
    facebook-url=""
    youtube-url=""
    instagram-url=""
    snapchat-url=""
    linkedin-url=""
    twitter-url=""
>
    <x-slot name="logo">
        {{-- Insert SVG logo here --}}
    </x-slot>
    <x-slot name="address">
        {{-- Insert address here --}}
    </x-slot>
</x-kernl-footers.local>
```

#### Props

- `links` = Array of titles and links for the navigation sections of the footer. Each title can have a `children` key that's an array of more titles/links. These titles/links will be displayed below the parent title.
Example:
```php
$links = [
    [
        'text' => 'About',
        'href' => '/about', // (optional)
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
    // ... More links
];
```
- `logo-url` - (optional) URL for the footer logo.
- `facebook-url` - (optional) Facebook URL for the footer. Adding the URL will display the respective social network icon.
- `youtube-url` - (optional) Youtube URL for the footer. Adding the URL will display the respective social network icon.
- `linkedin-url` - (optional) Linkedin URL for the footer. Adding the URL will display the respective social network icon.
- `snapchat-url` - (optional) Snapchat URL for the footer. Adding the URL will display the respective social network icon.
- `twitter-url` - (optional) Twitter URL for the footer. Adding the URL will display the respective social network icon.
- `instagram-url` - (optional) Instagram URL for the footer. Adding the URL will display the respective social network icon.


### Tabs

### Underlined

```blade
<x-kernl-tabs.underlined :default-active="0">
    <x-kernl-tabs.underlined.item title="Zero">
        Content for panel zero
    </x-kernl-tabs.underlined.item>

    <x-kernl-tabs.underlined.item title="One">
        Content for panel one
    </x-kernl-tabs.underlined.item>

    <x-kernl-tabs.underlined.item title="Two">
        Content for panel two
    </x-kernl-tabs.underlined.item>
</x-kernl-tabs.underlined>
```

#### `x-kernl-tabs.underlined` Props

- `default-active` - (optional) Index of the initial active tab. Default is 0 (zero).

#### `x-kernl-tabs.underlined.item` Props

- `title` - Title of the tab contents

Any additional classes or attributes you put on the `item` component will be passed through.

### Bordered

```blade
<x-kernl-tabs.bordered :default-active="0">
    <x-kernl-tabs.bordered.item title="Zero">
        Content for panel zero
    </x-kernl-tabs.bordered.item>

    <x-kernl-tabs.bordered.item title="One">
        Content for panel one
    </x-kernl-tabs.bordered.item>

    <x-kernl-tabs.bordered.item title="Two">
        Content for panel two
    </x-kernl-tabs.bordered.item>
</x-kernl-tabs.bordered>
```

#### `x-kernl-tabs.bordered` Props

- `default-active` - (optional) Index of the initial active tab. Default is 0 (zero).

#### `x-kernl-tabs.bordered.item` Props

- `title` - Title of the tab contents

Any additional classes or attributes you put on the `item` component will be passed through.

### Detached

```blade
<x-kernl-tabs.detached :default-active="0">
    <x-kernl-tabs.detached.item title="Zero">
        Content for panel zero
    </x-kernl-tabs.detached.item>

    <x-kernl-tabs.detached.item title="One">
        Content for panel one
    </x-kernl-tabs.detached.item>

    <x-kernl-tabs.detached.item title="Two">
        Content for panel two
    </x-kernl-tabs.detached.item>
</x-kernl-tabs.detached>
```

#### `x-kernl-tabs.detached` Props

- `default-active` - (optional) Index of the initial active tab. Default is 0 (zero).

#### `x-kernl-tabs.detached.item` Props

- `title` - Title of the tab contents

Any additional classes or attributes you put on the `item` component will be passed through.

### Heroes

### Split Layout Media Content

```blade
<x-kernl-heroes.split-layout-content-media
    media-url="https://media-url"
    title="Title"
    body="Body"
    call-to-action="Call to Action"
    call-to-action-url="https://call-to-action-url"
/>

{{-- OR --}}
<x-kernl-heroes.split-layout-content-media
    media-url="https://media-url"
>
    {{-- Your content --}}
</x-kernl-heroes.split-layout-content-media>
```

#### `x-kernl-heroes.split-layout-content-media` Props

- `media-url` - Url of image to show
- `title` - Title of content
- `body` - Body of content
- `call-to-action` - Call To Action button label
- `call-to-action-url` - Url of call to action button

Any additional classes or attributes you put on the component will be passed through.

> Note: when using the $slot version, title, body, call-to-action and call-to-action-url are not required.

### Full Background Media Centered Content

```blade
<x-kernl-heroes.full-centered-content
    title="Title"
    subtitle="Title"
    body="Body"
/>

{{-- OR --}}
<x-kernl-heroes.full-centered-content>
    {{-- Your content --}}
</x-kernl-heroes.full-centered-content>
```

#### `x-kernl-heroes.full-centered-content` Props

- `title` - Title of content
- `subtitle` - Subtitle of content
- `body` - Body of content

Any additional classes or attributes you put on the component will be passed through.

> Note: when using the $slot version, title, body, call-to-action and call-to-action-url are not required.
