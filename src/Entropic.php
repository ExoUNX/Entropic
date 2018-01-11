<?php

namespace ExoUNX\Entropic;

/**
 * Class Entropic
 * @package ExoUNX\Entropic
 */
class Entropic
{

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
        try {
            return $this->translateBin($length);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param int $length
     * @return string
     * @throws \Exception
     */
    private function translateBin(int $length): string
    {
        $charset = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9), str_split("!@#$%^&*()-_=+,.?/:;{}[]'`~|\\\""));
        $size = count($charset) - 1;

        for ($len = $length, $i = 0; $i < $len; $i++) {
            $k = random_int(0, $size);
            $str[$i] = $charset[$k];
        }

        return implode('', $str);
    }
}