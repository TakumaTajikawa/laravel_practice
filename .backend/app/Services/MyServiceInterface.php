<?php

namespace App\Services;

interface MyServiceInterface
{   
    /**
     * IDをセットする
     *
     * @param int $id
     * @return void
     */
    public function setId(int $id);

    /**
     * メッセージを返す
     *
     * @return string
     */
    public function say(): string;

    /**
     * 文字列を返す
     *
     * @param int $id
     * @return string
     */
    public function data(int $id): string;

    /**
     * メッセージデータの配列を返す
     * 
     *
     * @return array
     */
    public function allData(): array;
}