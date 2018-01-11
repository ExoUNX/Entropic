<?php

namespace ExoUNX\Entropic;

/**
 * Class Entropic
 * @package ExoUNX\Entropic
 */
class Entropic
{

    private const DEFAULT_CHARSET = "2122232425262728292a2b2c2d2e2f303132333435363738393a3b3c3d3e3f404142434445464748494a4b4c4d4e4f505152535455565758595a5b5c5d5e5f606162636465666768696a6b6c6d6e6f707172737475767778797a7b7c7d7e";

    /**
     * @param $length
     * @return string
     * @throws \Exception
     */
    public function genPassword(int $length): string

    {
        if (empty($this->getOps())) {
            return $this->generateRandomString($length);
        } else {
            return $this->generateRandomString($this->getOps());
        }
    }

    private function getOps(): ?int
    {
        if (getopt("c")) {
            return getopt("c")['c'];
        } else {
            return null;
        }
    }

    /**
     * @param int $length
     * @return string
     * @throws \Exception
     */
    private function generateRandomString(int $length): string
    {
        $str = null;

        $size = count($this->defaultCharset()) - 1;

        for ($len = $length, $i = 0; $i < $len; $i++) {
            $k = random_int(0, $size);
            $str[$i] = $this->defaultCharset()[$k];
        }

        return implode('', $str);
    }

    private function defaultCharset(): array
    {
        $charset = str_split(hex2bin($this::DEFAULT_CHARSET));
        return $charset;
    }
}