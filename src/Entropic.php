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
        $options = "a";
        return $this->setCharset($options);
    }

    /**
     * @param string $options
     * @return string
     * Gets user options and sets charset accordingly
     */
    private function setCharset(string $options): string
    {
        return $options;
    }


}