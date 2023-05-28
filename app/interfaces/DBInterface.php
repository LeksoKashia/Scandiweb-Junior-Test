<?php
interface DbInterface{
    public function data();
    public function insertProduct(string $sku,string $name,string $price, string $type, string $value);
    public function delete($checkeds);
}