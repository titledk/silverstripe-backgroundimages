# SilverStripe Background Images

This module allows you define background image based on images that your users upload

## Usage

```php
/**
 * @return string
 */
public function getBackgroundCSS()
{
    return BackgroundImage::create(
        $this->getPrimaryImageScaled(),
        'BackgroundImageBaseStyle'
    )->getCSS();
}
```

```html
<div style="$BackgroundCSS">
</div>
```
