<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Robots\Test\Unit\Model\Config;

class ValueTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Robots\Model\Config\Value
     */
    private $model;

    /**
     * @var \Magento\Framework\Model\Context|\PHPUnit_Framework_MockObject_MockObject
     */
    private $context;

    /**
     * @var \Magento\Framework\Registry|\PHPUnit_Framework_MockObject_MockObject
     */
    private $registry;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $scopeConfig;

    /**
     * @var \Magento\Framework\App\Cache\TypeListInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $typeList;

    /**
     * @var \Magento\Store\Model\StoreResolver|\PHPUnit_Framework_MockObject_MockObject
     */
    private $storeResolver;

    protected function setUp()
    {
        $this->context = $this->getMockBuilder(\Magento\Framework\Model\Context::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->registry = $this->getMockBuilder(\Magento\Framework\Registry::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->scopeConfig = $this->getMockBuilder(\Magento\Framework\App\Config\ScopeConfigInterface::class)
            ->getMockForAbstractClass();

        $this->typeList = $this->getMockBuilder(\Magento\Framework\App\Cache\TypeListInterface::class)
            ->getMockForAbstractClass();

        $this->storeResolver = $this->getMockBuilder(\Magento\Store\Model\StoreResolver::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->model = new \Magento\Robots\Model\Config\Value(
            $this->context,
            $this->registry,
            $this->scopeConfig,
            $this->typeList,
            $this->storeResolver
        );
    }

    /**
     * Check that getIdentities() method returns specified cache tag
     */
    public function testGetIdentities()
    {
        $storeId = 1;

        $this->storeResolver->expects($this->once())
            ->method('getCurrentStoreId')
            ->willReturn($storeId);

        $expected = [
            \Magento\Robots\Model\Config\Value::CACHE_TAG . '_' . $storeId,
        ];
        $this->assertEquals($expected, $this->model->getIdentities());
    }
}
