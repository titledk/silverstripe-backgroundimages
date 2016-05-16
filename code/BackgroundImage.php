<?php

/**
 * BackgroundImage
 *
 * @author Anselm Christophersen <ac@anselm.dk>
 * @date   March 2016
 */
class BackgroundImage extends Object
{
    protected $style;

    /**
     * BackgroundImage constructor.
     *
     * @param        $image
     * @param string $styleClass
     */
    public function __construct($image, $styleClass = 'BackgroundImageDefaultStyle')
    {
        $this->style = $styleClass::create($image);
    }

    /**
     * @return string
     */
    public function getCSS() {
        return $this->style->getCSS();
    }

    /**
     * TODO this should not be needed, and is more of a hack to get the darkened mode working for now
     * It should rather be possible to configure styles
     *
     * @return string
     */
    public function getCSSDarkened() {
        return $this->style->getCSSDarkened();
    }
}
