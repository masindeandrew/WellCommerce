<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\CatalogBundle\Controller\Front;

use WellCommerce\CatalogBundle\Entity\ProductStatusInterface;
use WellCommerce\CoreBundle\Service\Breadcrumb\BreadcrumbItem;
use WellCommerce\CoreBundle\Controller\Front\AbstractFrontController;
use WellCommerce\CoreBundle\Controller\Front\FrontControllerInterface;

/**
 * Class ProductStatusController
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ProductStatusController extends AbstractFrontController implements FrontControllerInterface
{
    /**
     * {@inheritdoc}
     */
    public function indexAction(ProductStatusInterface $productStatus)
    {
        $this->addBreadCrumbItem(new BreadcrumbItem([
            'name' => $productStatus->translate()->getName(),
        ]));

        $this->manager->getProductStatusContext()->setCurrentProductStatus($productStatus);

        return $this->displayTemplate('index', [
            'status' => $productStatus
        ]);
    }
}