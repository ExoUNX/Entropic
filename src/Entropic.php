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
            return $this->translateBin(random_bytes($length));
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
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
}