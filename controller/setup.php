<?php

require('Smarty.class.php');

class calculadora extends Smarty {

    function calculadora(){

        $this->Smarty();

        $this->template_dir = '../view/templates';
        $this->compile_dir = '../view/templates_c';
        $this->config_dir = '../view/configs';
        $this->cache_dir = '../view/cache';

        $this->caching = true;
        //$this->assign('');
    }
}

?>