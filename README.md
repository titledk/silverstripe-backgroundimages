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
    return BackgroundImageStyle::create(
        $this->PrimaryImage()
    )
        ->getCSS();
}
```

```html
<div style="$BackgroundCSS">
</div>
```

```yml
Identity:
  colors:
    primary: '#111'
    primary-gradient-start: '#222'
    primary-gradient-end: '#333'
```
