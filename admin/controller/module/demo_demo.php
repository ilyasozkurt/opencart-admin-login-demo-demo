<?php

namespace Opencart\Admin\Controller\Extension\DemoDemo\Module;

class DemoDemo extends \Opencart\System\Engine\Controller
{
    private $error = array();

    public function install(): void
    {

        $this->load->model('setting/event');

        $this->model_setting_event->addEvent(array(
            'code' => 'demo_demo',
            'description' => '',
            'trigger' => 'admin/view/common/login/after',
            'action' => 'extension/demo_demo/module/demo_demo|replaceInputs',
            'status' => 1,
            'sort_order' => 0
        ));

    }

    public function uninstall(): void
    {

        $this->load->model('setting/event');
        $this->model_setting_event->deleteEventByCode('demo_demo');

    }

    public function replaceInputs(&$route, &$data, &$output)
    {
        $output = str_replace('name="username" value=""', 'name="username" value="demo"', $output);
        $output = str_replace('name="password" value=""', 'name="username" value="demo"', $output);
    }

}