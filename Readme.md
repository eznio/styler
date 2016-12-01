# Simple CLI style helper

## Overview

Simple CLI styling helper. Generates ASCII sequences to change console bg/fg-colors and some text effects

```php
echo Styler::get(Styles::HYPERLINK) . 'this looks like a link' . Styler::reset() . "\n";

echo Styler::get([
    BackgroundColors::WHITE,
    ForegroundColors::BLUE,
    TestStyles::UNDERLINE
]) . 'this looks like a link too!' . Styler::reset() . "\n";
```

## Reference

```php
Styler::get(array $style)
```

Returns sequence for given style(-s). Preferred one.

```php
Styler::single($style)
```
Returns sequence for single given style

```php
Styler::combined(array $styles)
```
Returns sequence for multiple given styles

```php
Styler::reset()
```
Returns reset sequence (return to console default colors)

## Style reference files

 * `ForegroundColors` - foreground colors list
 * `BackgroundColors` - background colors list
 * `TextStyles` - list of text styles. Some of them may be not supported by your console!
 * `StyleSets` - some useful (sometimes) shortcuts
 