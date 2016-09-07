<?php

/**
 * BackgroundImageStyle
 * Returns only the background image
 *
 * @author Anselm Christophersen <ac@anselm.dk>
 * @date   March 2016
 */
class BackgroundImageStyle extends Object
{
    private static $gradient_start_opacity = '0.8';
    private static $gradient_end_opacity = '0.2';
    private static $gradient_direction = 'to bottom right';
    private static $img_maxwidth = 1000;

    protected $image;

    /**
     * BackgroundImageBaseStyle constructor
     * @param $image
     */
    public function __construct($image)
    {
        $this->image = $image;
    }

    /**
     * Returns an image, if it has been set
     * @return null|Image
     */
    public function getImage()
    {
        $img = $this->image;
        if ($img && $img->exists()) {
            return $img;
        }
    }

    /**
     * Returns a scaled image, if an image has been set
     * @return null|Image
     */
    public function getScaledImage()
    {
        $img = $this->getImage();
        if ($img) {
            return $img->ScaleMaxWidth($this->config()->img_maxwidth);
        }
    }


    /**
     * CSS for the background image
     * @param bool $withComma
     * @return string
     */
    public function getBackgroundImageCSS($withComma = true)
    {
        $img = $this->getScaledImage();
        if ($img) {
            $str = '';
            if ($withComma) {
                $str .= ',';
            }
            $str .=
                "url({$img->Link()}) " .
                "{$img->PercentageX()}% {$img->PercentageY()}%;" .
                "background-size: cover;";
            return $str;
        }
    }

    /**
     * Gradient overlay
     * Based on identity colors - you need to have set primary-gradient-start and primary-gradient-end in order to use this
     * @return string
     */
    public function getBackgroundGradientCSS()
    {
        $colors = Identity::get_colors('rgb');
        return
            "linear-gradient(" .
            $this->config()->gradient_direction . ',' .
            "rgba({$colors['primary-gradient-start']}, " . $this->config()->gradient_start_opacity . ")," .
            "rgba({$colors['primary-gradient-end']}, " . $this->config()->gradient_end_opacity . ")" .
            ")";
    }

    /**
     * Background image CSS only
     * @return string
     */
    public function getCSS()
    {
        return "background: " . $this->getBackgroundImageCSS(false);
    }

    /**
     * Background image CSS with gradient overlay
     * @return string
     */
    public function getCSSWithGradient()
    {
        return
            "background: " .
            $this->getBackgroundGradientCSS() .
            $this->getBackgroundImageCSS()
            ;
    }
}
