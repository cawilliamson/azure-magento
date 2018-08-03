<?php
/**
 * Refer to LICENSE.txt distributed with the Temando Shipping module for notice of license
 */
namespace Temando\Shipping\Api\Quote;

/**
 * CartDeliveryOptionManagementInterface
 *
 * @api
 * @package Temando\Shipping\Api
 * @author  Sebastian Ertner <sebastian.ertner@netresearch.de>
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link    http://www.temando.com/
 */
interface CartDeliveryOptionManagementInterface
{
    /**
     * Handle selected delivery option.
     *
     * @param int $cartId The shopping cart ID.
     * @param string $selectedOption
     * @return void
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save($cartId, $selectedOption);
}
