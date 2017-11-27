<?php

namespace ExoUNX\Entropic;

use GetOpt\ArgumentException;
use GetOpt\ArgumentException\Missing;
use GetOpt\GetOpt;
use GetOpt\Option;

/**
 * Class Entropic
 * @package ExoUNX\Entropic
 */
class Entropic
{


    /**
     * @param $length
     * @return string
     */
    public function genPassword(int $length): string

    {
        return $this->generateRandomString($length);
    }

    /**
     * @param int $length
     * @return string
     */
    private function generateRandomString(int $length): string

    {
        return $this->translateBin($this->xorBytes(random_bytes($length), random_bytes($length)));
    }

    /**
     * @param string $str
     * @return string
     */
    private function translateBin(string $str): string
    {
        $charset = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9), str_split("!@#$%^&*()-_=+,.?/:;{}[]'`~|\\\""));
        $size = count($charset);

        for ($len = strlen($str), $i = 0; $i < $len; $i++) {
            $str[$i] = $charset[ord($str[$i]) % $size];
        }

        return $str;
    }

    /**
     * @param $string
     * @param $key
     * @return string
     */
    private function xorBytes($string, $key): string
    {
        for ($i = 0; $i < strlen($string); $i++)
            $string[$i] = ($string[$i] ^ $key[$i % strlen($key)]);
        return $string;
    }

    /**
     * Get Options
     */
    private function getOptions(): object
    {
        try {
            try {
                $this->setOptions()->process();

            } catch (Missing $exception) {
                // catch missing exceptions if help is requested
                if (!$this->setOptions('help')) {
                    throw $exception;
                }
            }
        } catch (ArgumentException $exception) {
            file_put_contents('php://stderr', $exception->getMessage() . PHP_EOL);
            echo PHP_EOL . $this->setOptions()->getHelpText();
            exit;
        }
        return $this->setOptions();
    }

    /**
     * Define Options
     */
    private function setOptions(): object
    {
        $setOpt = new GetOpt();
        $setOpt->addOptions([
            Option::create('V', 'version', GetOpt::NO_ARGUMENT)
                ->setDescription('Show version'),

            Option::create('?', 'help', GetOpt::NO_ARGUMENT)
                ->setDescription('Show help'),

            Option::create('g', 'gen', GetOpt::NO_ARGUMENT)
                ->setDescription('Automatically generate a secure password (default length = 20)')
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