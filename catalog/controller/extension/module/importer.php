<?php
// XML importer for Opencart 2.3 by Vladimir Myagdeev & CrunchWEB
// 14 March 2017

class ControllerExtensionModuleimporter extends Controller {
    public function index() {
        $data['timestamp'] = time();
        echo $this->load->view('extension/module/importer.tpl', $data);
    }
}
