<?php

namespace ExoUNX\Entropic;

/**
 * Class Entropic
 * @package ExoUNX\Entropic
 */
class Entropic
{
    /**
     * Entropic constructor.
     * Gets arguments
     */
    public function __construct()
    {

    }

    /**
     * @return string
     * Generates random bytes, converts to charset, and returns password
     */
    public function genPassword(): string
    {
        $options = $this->getOptions();
        return $this->setCharset($options);
    }

    /**
     * @return array
     * Get Arguments/Options
     */
    private function getOptions(): array
    {
        $opts = "";
        $opts .= "g::";
        $opts .= "c::";
        $opts .= "l::";
        $opts .= "v";
        return getopt($opts);
    }

    /**
     * @param string $options
     * @return string
     * Gets user options and sets charset accordingly
     */
    private function setCharset(array $options): string
    {
        return $options[''];
    }
}