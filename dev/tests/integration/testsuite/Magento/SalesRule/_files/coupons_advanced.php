<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

require 'rules_advanced.php';

$this->_collection = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
    \Magento\SalesRule\Model\ResourceModel\Rule\Collection::class
);
$items = array_values($this->_collection->getItems());

// type SPECIFIC with code
$coupon = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(\Magento\SalesRule\Model\Coupon::class);
$coupon->setRuleId($items[0]->getId())->setCode('coupon_code')->setType(0)->save();

// type NO_COUPON with non actual previously generated coupon codes
$coupon = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(\Magento\SalesRule\Model\Coupon::class);
$coupon->setRuleId($items[1]->getId())->setCode('autogenerated_2_1')->setType(1)->setIsPrimary(1)->save();
$coupon = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(\Magento\SalesRule\Model\Coupon::class);
$coupon->setRuleId($items[1]->getId())->setCode('autogenerated_2_2')->setType(1)->save();

// type SPECIFIC with generated coupons 
$coupon = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(\Magento\SalesRule\Model\Coupon::class);
$coupon->setRuleId($items[2]->getId())->setCode('autogenerated_3_1')->setType(1)->save();
$coupon = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(\Magento\SalesRule\Model\Coupon::class);
$coupon->setRuleId($items[2]->getId())->setCode('autogenerated_3_2')->setType(1)->setIsPrimary(1)->save();

// type AUTO
$coupon = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(\Magento\SalesRule\Model\Coupon::class);
$coupon->setRuleId($items[3]->getId())->setCode('coupon_code_auto')->setType(0)->save();
