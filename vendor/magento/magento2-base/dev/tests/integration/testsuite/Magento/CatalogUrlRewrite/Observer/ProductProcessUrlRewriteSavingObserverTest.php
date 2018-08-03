<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\CatalogUrlRewrite\Observer;

use Magento\Store\Model\StoreManagerInterface;
use Magento\UrlRewrite\Service\V1\Data\UrlRewrite;
use Magento\CatalogUrlRewrite\Model\CategoryUrlRewriteGenerator;

/**
 * @magentoAppArea adminhtml
 */
class ProductProcessUrlRewriteSavingObserverTest extends \PHPUnit\Framework\TestCase
{
    /** @var \Magento\Framework\ObjectManagerInterface */
    protected $objectManager;

    protected function setUp()
    {
        $this->objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
    }

    /**
     * @param array $filter
     * @return array
     */
    private function getActualResults(array $filter)
    {
        /** @var \Magento\UrlRewrite\Model\UrlFinderInterface $urlFinder */
        $urlFinder = $this->objectManager->get(\Magento\UrlRewrite\Model\UrlFinderInterface::class);
        $actualResults = [];
        foreach ($urlFinder->findAllByData($filter) as $url) {
            $actualResults[] = [
                'request_path' => $url->getRequestPath(),
                'target_path' => $url->getTargetPath(),
                'is_auto_generated' => (int)$url->getIsAutogenerated(),
                'redirect_type' => $url->getRedirectType(),
                'store_id' => $url->getStoreId()
            ];
        }
        return $actualResults;
    }

    /**
     * @magentoDataFixture Magento/CatalogUrlRewrite/_files/product_rewrite_multistore.php
     * @magentoAppIsolation enabled
     */
    public function testUrlKeyHasChangedInGlobalContext()
    {
        /** @var \Magento\Catalog\Api\ProductRepositoryInterface $productRepository*/
        $productRepository = $this->objectManager->create(\Magento\Catalog\Api\ProductRepositoryInterface::class);
        /** @var \Magento\Catalog\Model\Product $product*/
        $product = $productRepository->get('product1');

        /** @var StoreManagerInterface $storeManager */
        $storeManager = $this->objectManager->get(StoreManagerInterface::class);
        $storeManager->setCurrentStore(0);

        $testStore = $storeManager->getStore('test');
        $productFilter = [
            UrlRewrite::ENTITY_TYPE => 'product',
        ];

        $expected = [
            [
                'request_path' => "product-1.html",
                'target_path' => "catalog/product/view/id/" . $product->getId(),
                'is_auto_generated' => 1,
                'redirect_type' => 0,
                'store_id' => 1,
            ],
            [
                'request_path' => "product-1.html",
                'target_path' => "catalog/product/view/id/" . $product->getId(),
                'is_auto_generated' => 1,
                'redirect_type' => 0,
                'store_id' => $testStore->getId(),
            ],
        ];
        $actual = $this->getActualResults($productFilter);
        foreach ($expected as $row) {
            $this->assertContains($row, $actual);
        }

        $product->setData('save_rewrites_history', true);
        $product->setUrlKey('new-url');
        $product->save();

        $expected = [
            [
                'request_path' => "new-url.html",
                'target_path' => "catalog/product/view/id/" . $product->getId(),
                'is_auto_generated' => 1,
                'redirect_type' => 0,
                'store_id' => 1,
            ],
            [
                'request_path' => "new-url.html",
                'target_path' => "catalog/product/view/id/" . $product->getId(),
                'is_auto_generated' => 1,
                'redirect_type' => 0,
                'store_id' => $testStore->getId(),
            ],
            [
                'request_path' => "product-1.html",
                'target_path' => "new-url.html",
                'is_auto_generated' => 0,
                'redirect_type' => 301,
                'store_id' => 1,
            ],
            [
                'request_path' => "product-1.html",
                'target_path' => "new-url.html",
                'is_auto_generated' => 0,
                'redirect_type' => 301,
                'store_id' => $testStore->getId(),
            ],
        ];

        $actual = $this->getActualResults($productFilter);
        foreach ($expected as $row) {
            $this->assertContains($row, $actual);
        }
    }

    /**
     * @magentoDataFixture Magento/CatalogUrlRewrite/_files/product_rewrite_multistore.php
     * @magentoAppIsolation enabled
     */
    public function testUrlKeyHasChangedInStoreviewContextWithPermanentRedirection()
    {
        /** @var \Magento\Catalog\Api\ProductRepositoryInterface $productRepository*/
        $productRepository = $this->objectManager->create(\Magento\Catalog\Api\ProductRepositoryInterface::class);
        /** @var \Magento\Catalog\Model\Product $product*/
        $product = $productRepository->get('product1');

        /** @var StoreManagerInterface $storeManager */
        $storeManager = $this->objectManager->get(StoreManagerInterface::class);
        $storeManager->setCurrentStore(1);

        $testStore = $storeManager->getStore('test');

        $productFilter = [
            UrlRewrite::ENTITY_TYPE => 'product',
        ];

        $product->setData('save_rewrites_history', true);
        $product->setUrlKey('new-url');
        $product->save();

        $expected = [
            [
                'request_path' => "new-url.html",
                'target_path' => "catalog/product/view/id/" . $product->getId(),
                'is_auto_generated' => 1,
                'redirect_type' => 0,
                'store_id' => 1,
            ],
            [
                'request_path' => "product-1.html",
                'target_path' => "catalog/product/view/id/" . $product->getId(),
                'is_auto_generated' => 1,
                'redirect_type' => 0,
                'store_id' => $testStore->getId(),
            ],
            [
                'request_path' => "product-1.html",
                'target_path' => "new-url.html",
                'is_auto_generated' => 0,
                'redirect_type' => 301,
                'store_id' => 1,
            ],
        ];

        $actual = $this->getActualResults($productFilter);
        foreach ($expected as $row) {
            $this->assertContains($row, $actual);
        }
    }

    /**
     * @magentoDataFixture Magento/CatalogUrlRewrite/_files/product_rewrite_multistore.php
     * @magentoAppIsolation enabled
     */
    public function testUrlKeyHasChangedInStoreviewContextWithoutPermanentRedirection()
    {
        /** @var \Magento\Catalog\Api\ProductRepositoryInterface $productRepository*/
        $productRepository = $this->objectManager->create(\Magento\Catalog\Api\ProductRepositoryInterface::class);
        /** @var \Magento\Catalog\Model\Product $product*/
        $product = $productRepository->get('product1');

        /** @var StoreManagerInterface $storeManager */
        $storeManager = $this->objectManager->get(StoreManagerInterface::class);
        $storeManager->setCurrentStore(1);

        $testStore = $storeManager->getStore('test');

        $productFilter = [
            UrlRewrite::ENTITY_TYPE => 'product',
        ];

        $product->setData('save_rewrites_history', false);
        $product->setUrlKey('new-url');
        $product->save();

        $expected = [
            [
                'request_path' => "new-url.html",
                'target_path' => "catalog/product/view/id/" . $product->getId(),
                'is_auto_generated' => 1,
                'redirect_type' => 0,
                'store_id' => 1,
            ],
            [
                'request_path' => "product-1.html",
                'target_path' => "catalog/product/view/id/" . $product->getId(),
                'is_auto_generated' => 1,
                'redirect_type' => 0,
                'store_id' => $testStore->getId(),
            ],
        ];

        $actual = $this->getActualResults($productFilter);
        foreach ($expected as $row) {
            $this->assertContains($row, $actual);
        }
    }
}
