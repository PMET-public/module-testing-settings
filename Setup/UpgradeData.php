<?php
/**
 * Copyright © 2018 Magento. All rights reserved.
 */

namespace MagentoEse\TestingSetttings\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;


class UpgradeData implements UpgradeDataInterface
{
    /**
     * @var \Magento\Config\Model\ResourceModel\Config
     */
    public $resourceConfig;


    public function __construct(
        \Magento\Config\Model\ResourceModel\Config $resourceConfig
    ) {
        $this->_resourceConfig = $resourceConfig;

    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade( ModuleDataSetupInterface $setup, ModuleContextInterface $context )
    {
        if (version_compare($context->getVersion(), '0.0.1', '<=')) {
            //Settings for MFTF
            // allow admin to login from multiple locations
            $this->_resourceConfig->saveConfig("admin/security/admin_account_sharing", "1", "default", 0);
            // Disable wysiwyg
            $this->_resourceConfig->saveConfig("cms/wysiwyg/enabled", "disabled", "default", 0);
            // Set SEO Urls
            $this->_resourceConfig->saveConfig("web/seo/use_rewrites", "1", "default", 0);

        };

    }

}
