<?php
if (!defined('_PS_VERSION_'))
    exit;

class ProductMetreage extends Module
{
    public function __construct()
    {
        $this->name = 'productmetreage';
        $this->tab = 'quick_bulk_update';
        $this->version = '1.0.0';
        $this->author = 'SMB Streamline';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Product Metreage');
        $this->description = $this->l('Adds support for metreage quantity widget for any products under Fabric category.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

        if (!Configuration::get('PRODUCTMETREAGE_NAME')) {
            $this->warning = $this->l('No name provided');
        }
    }

    public function install()
    {
        if (!parent::install() ||
            !Configuration::updateValue('PRODUCTMETREAGE_NAME', 'Product Metreage')
        ) {
            return false;
        }
        return true;
    }

    public function uninstall()
    {
        if (!parent::uninstall() || !Configuration::deleteByName('PRODUCTMETREAGE_NAME')) {
            return false;
        }

        return true;
    }
}
