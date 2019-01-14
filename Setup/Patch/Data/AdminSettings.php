<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 */
namespace MagentoEse\TestingSettings\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Config\Model\ResourceModel\Config;

class AdminSettings implements DataPatchInterface
{

   /** @var Config*/
    protected $resourceConfig;

    /**
     * AdminSettings constructor.
     * @param Config $resourceConfig
     */
    public function __construct(Config $resourceConfig
    ) {
        $this->resourceConfig = $resourceConfig;

    }


    public function apply(){
        //Settings for MFTF
        // allow admin to login from multiple locations
        $this->resourceConfig->saveConfig("admin/security/admin_account_sharing", "1", "default", 0);
        // Disable wysiwyg
        $this->resourceConfig->saveConfig("cms/wysiwyg/enabled", "disabled", "default", 0);
        // Set SEO Urls
        $this->resourceConfig->saveConfig("web/seo/use_rewrites", "1", "default", 0);
        // Set Secret keys on forms to off
        $this->resourceConfig->saveConfig("admin/security/use_form_key", "0", "default", 0);


    }



    /**
     * @return array|string[]
     */
    public static function getDependencies()
    {
        return [];
    }


    /**
     * @return array|string[]
     */
    public function getAliases()
    {
        return [];
    }

}
