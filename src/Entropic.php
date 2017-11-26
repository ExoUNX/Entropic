<?php

namespace ExoUNX\Entropic;

use GetOpt\GetOpt;
use GetOpt\Option;

/**
 * Class Entropic
 * @package ExoUNX\Entropic
 */
class Entropic
{

    /**
     * Generates random bytes, converts to charset, and returns password
     */
    public function genPassword(): void
    {
        $options = $this->getOptions();
        var_dump($options);
    }

    /**
     * Get Options
     */
    private function getOptions()
    {
        return $this->setOptions()->process();
    }

    /**
     * Define Options
     */
    private function setOptions()
    {
        $setOpt = new GetOpt();
        $setOpt->addOptions([
            Option::create('V', 'version', GetOpt::NO_ARGUMENT)
                ->setDescription('Show version'),

            Option::create('?', 'help', GetOpt::NO_ARGUMENT)
                ->setDescription('Show help'),

            Option::create('g', 'gen', GetOpt::NO_ARGUMENT)
                ->setDescription('Automatically generate a secure password (default length = 24)')
        ]);

        return $setOpt;
    }

    /**
     * @param array $options
     * @return string
     * Gets user options and sets charset accordingly
     */
    private function setCharset(array $options): string
    {
        return $options['key1'] = "test";
    }
}