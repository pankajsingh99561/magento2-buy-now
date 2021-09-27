<?php
namespace Satrix\BuyNow\Helper;

/**
 * Class WishlistData
 * @package Satrix\BuyNow\Helper
 */
class WishlistData extends \Magento\Wishlist\Helper\Data
{
    /**
     * Retrieve params for removing item from wishlist
     *
     * @param \Magento\Catalog\Model\Product|\Magento\Wishlist\Model\Item $item
     * @param bool $addReferer
     * @return string
     */
    public function getAddToCartParams($item, $addReferer = false)
    {
        $params = $this->_getCartUrlParameters($item);
        $params[\Magento\Framework\App\ActionInterface::PARAM_NAME_URL_ENCODED] = '';

        if ($addReferer) {
            $params = $this->addRefererToParams($params);
        }

        return $this->_postDataHelper->getPostData(
            $this->_getUrlStore($item)->getUrl('buynow/index/cart'),
            $params
        );
    }
}
