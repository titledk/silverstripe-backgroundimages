<?php

/**
 * BackgroundImageDefaultStyle
 * Returns background image + gradient
 *
 * @author Anselm Christophersen <ac@anselm.dk>
 * @date   March 2016
 */
class BackgroundImageDefaultStyle extends BackgroundImageBaseStyle
{

    private static $gradient_start_opacity = '0.8';
    private static $gradient_end_opacity = '0.2';

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
        return
            "background: " .
                $this->getBackgroundGradientCSS() .
                $this->getBackgroundImageCSS()
            ;
    }
}
