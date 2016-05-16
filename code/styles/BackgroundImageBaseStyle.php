<?php

/**
 * BackgroundImageBaseStyle
 * Returns only the background image
 *
 * @author Anselm Christophersen <ac@anselm.dk>
 * @date   March 2016
 */
class BackgroundImageBaseStyle extends Object
{
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

    /**
     * @return string
     */
    public function getCSS()
    {
        return "background: " . $this->getBackgroundImageCSS(false);
    }
}
