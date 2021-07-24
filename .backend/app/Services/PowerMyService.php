<?php

namespace App\Services;

use App\Services\MyServiceInterface;

class PowerMyService implements MyServiceInterface
{
    private $id = -1;
    private $msg = 'no id...';
    private $data = ['イチゴ', 'りんご', 'ばなな', 'みかん', 'ぶどう'];

    public function __construct()
    {
        $this->setId(rand(0, count($this->data)));
    }

    public function setId(int $id)
    {
        if ($id >= 0 && $id < count($this->data)) {
            $this->id = $id;
            $this->msg = "あなたが好きなのは、" . $id . '番の' . $this->data[$id] . 'ですね！';
        }
    }

    public function say(): string
    {
        return $this->msg;
    }

    public function data(int $id): string
    {
        return $this->data[$id];
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function allData(): array
    {
        return $this->data;
    }
    
}