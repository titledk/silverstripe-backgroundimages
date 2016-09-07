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
    
    protected $image;


    /**
     * BackgroundImageBaseStyle constructor.
     *
     * @param $image
     */
    public function __construct($image)
    {
        $this->image = $image;
    }

    /**
     * CSS for the background image
     * @param bool $withComma
     * @return string
     */
    public function getBackgroundImageCSS($withComma = true)
    {
        $img = $this->image;
        if ($img) {
            //$img = $img->ScaleMaxWidth(1000);
            //ScaleMaxWidth doesn't exist in 3.1
            $rImg = $img->SetWidth(1000);
            if ($rImg && $rImg->exists()) {

                $str = '';
                if ($withComma) {
                    $str .= ',';
                }
                $str .=
                    "url({$rImg->Link()}) " .
                    "{$img->PercentageX()}% {$img->PercentageY()}%;" .
                    "background-size: cover;";
                return $str;
            }
        }
    }

    public function getBackgroundGradientCSS()
    {
        $colors = Identity::get_colors('rgb');
        return
            "linear-gradient(" .
            "to bottom right," .
            "rgba({$colors['primary-gradient-start']}, " . $this->config()->gradient_start_opacity . ")," .
            "rgba({$colors['primary-gradient-end']}, " . $this->config()->gradient_end_opacity . ")" .
            ")";
    }

    /**
     * @return string
     */
    public function getCSS()
    {
        return "background: " . $this->getBackgroundImageCSS(false);
    }

    /**
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
