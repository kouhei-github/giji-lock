<?php

namespace App\Domains;

class GroupDomain
{
    private string $name;

    /**
     * @param string $name
     * @throws \Exception
     */
    public function __construct(string $name)
    {
        if (mb_strlen($name) < 2) {
            throw new \Exception($name . " は短すぎます。もう少し長く入力してください");
        }
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
