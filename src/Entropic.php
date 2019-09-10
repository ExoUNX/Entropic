<?php

namespace ExoUNX\Entropic;

use Exception;

/**
 * Class Entropic
 * @package ExoUNX\Entropic
 */
class Entropic
{
    /**
     * Printable ASCII characters
     */

    private const ASCII_SYMBOL = "!\\\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";

    private const ASCII_UPPERCASE = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    private const ASCII_LOWERCASE = "abcdefghijklmnopqrstuvwxyz";

    private const ASCII_NUMERICAL = "0123456789";

    private const DEFAULT_CHARSET = self::ASCII_SYMBOL.self::ASCII_LOWERCASE.self::ASCII_UPPERCASE.self::ASCII_NUMERICAL;

    /**
     * @param $length
     *
     * @return string
     * @throws Exception
     */
    public function genPassword(int $length): string
    {
        if (empty($this->getOps())) {
            $password = $this->generateRandomString($length);
        } else {
            $password = $this->generateRandomString($this->getOps());
        }

        return $password;
    }

    /**
     * @return int|null
     * Working on CLI
     */
    private function getOps(): ?int
    {
        if (getopt("c")) {
            return getopt("c")['c'];
        } else {
            return null;
        }
    }

    /**
     * @param  int  $length
     *
     * @return string
     * @throws Exception
     */
    private function generateRandomString(int $length): string
    {
        $str = null;

        $default_charset = $this->defaultCharset();

        $size = count($default_charset) - 1;

        for ($len = $length, $i = 0; $i < $len; $i++) {
            $k       = random_int(0, $size);
            $str[$i] = $default_charset[$k];
        }

        return implode('', $str);
    }

    private function defaultCharset(): array
    {
        return str_split(self::DEFAULT_CHARSET);
    }
}