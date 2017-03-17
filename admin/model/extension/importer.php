<?php
class ModelExtensionImporter extends Model
{
    public function loadXML($file, $lang_code = 'ru-ru'){
        $xml =  simplexml_load_file($file);
        $language_id = $this->getLanguageIDByCode('ru-ru');

        // КоммерческаяИнформация->Каталог->Товары
        foreach ($xml->Каталог->Товары as $product_from_xml){
            $this->addOrUpdateProduct($this->preprocessProductFromXML($product_from_xml, $language_id));
        }
    }

    public function addOrUpdateProduct($data){
        // Функция добавления и обновления товара
        $this->load->model('catalog/product');
        var_dump($data);
    }
    public function preprocessProductFromXML($product_from_xml, $language_id){
        // Предварительная обработка XML обьекта
        $preprocessed['product_description'][$language_id]['name'] = $product_from_xml->Наименование;
        // $preprocessed['id'] = $product_from_xml->Ид;
        $preprocessed['sku'] = $product_from_xml->Артикул;
        return $preprocessed;
    }

    public function addOrUpdateCategory($data)
    {
        // Функция добавления и обновления категории
        $this->load->model('catalog/category');
    }
    public function preprocessCategoryFromXML($category_from_xml, $language_id){
        // Предварительная обработка XML обьекта

        $preprocessed = array();
        return $preprocessed;
    }

    public function getLanguageIDByCode($code = 'ru-ru'){
        // Получение language_id по коду языка, русский язык по умолчанию
        $query = $this->db->query("SELECT language_id FROM " . DB_PREFIX . "language WHERE code='$code';");
        if ($query->num_rows) {
            $data = $query->row;
            return $data['language_id'];
        }
    }
}