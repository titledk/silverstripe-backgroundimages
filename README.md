# SilverStripe Background Images

Define background image based on images that your users upload.

**WORK IN PROGRESS**

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
