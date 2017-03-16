<?php
class ModelExtensionImporter extends Model
{
    public function addOrUpdate($data){
        // Функция добавления и обновления товара
    }
    public function preprocessProductFromXML($product_from_xml){
        // Предварительная обработка XML обьекта
        $preprocessed['name'] = $product_from_xml->Наименование;
        $preprocessed['id'] = $product_from_xml->Ид;
        $preprocessed['sku'] = $product_from_xml->Артикул;
        return $preprocessed;
    }
    public function loadXML($file){
        $this->load->model('catalog/product');
        $xml =  simplexml_load_file($file);

        // КоммерческаяИнформация->Каталог->Товары
        foreach ($xml->Каталог->Товары as $product_from_xml){
            $this->addOrUpdate($this->preprocessProductFromXML($product_from_xml));
        }

    }
}