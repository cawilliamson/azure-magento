<?php
/**
 * Refer to LICENSE.txt distributed with the Temando Shipping module for notice of license
 */
namespace Temando\Shipping\Controller\Adminhtml\Dispatch;

use Magento\Framework\Controller\ResultFactory;

/**
 * Temando Solve Dispatch Failures Action
 *
 * @package  Temando\Shipping\Controller
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @author   Sebastian Ertner <sebastian.ertner@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.temando.com/
 */
class Solve extends AbstractDispatchAction
{
    /**
     * Render template.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Temando_Shipping::dispatches');
        $resultPage->getConfig()->getTitle()->prepend(__('Find Solutions'));
        $resultPage->addBreadcrumb(__('Dispatches'), __('Dispatches'), $this->getUrl('temando/dispatch'));
        $resultPage->addBreadcrumb(__('Find Solutions'), __('Find Solutions'));
        return $resultPage;
    }
}
