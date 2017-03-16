<?php
class ModelExtensionImporter extends Model
{
    public function addOrUpdate(){
        // Функция добавления и обновления товара
    }
    public function loadXML($file){
        $xml =  simplexml_load_file($file);
        return $xml->Каталог->Товары;
        // КоммерческаяИнформация->Каталог->Товары
    }
}