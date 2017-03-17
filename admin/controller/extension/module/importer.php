<?php
// XML importer for Opencart 2.3 by Vladimir Myagdeev & CrunchWEB
// 14 March 2017

class ControllerExtensionModuleimporter extends Controller {
    public function index() {
        $data = array();
        echo $this->load->view('extension/module/importer.tpl', $data);
    }
    public function xml(){
        $this->load->model('extension/importer');
        $this->model_extension_importer->loadXML(__DIR__ . '/../../../../xml/test.xml', 'ru-ru');
    }
}