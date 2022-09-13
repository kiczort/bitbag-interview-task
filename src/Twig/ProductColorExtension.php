<?php

namespace App\Twig;

use App\Model\Product;
use App\Service\ProductColorsInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class ProductColorExtension extends AbstractExtension
{
    protected ProductColorsInterface $productColors;

    /**
     * @param ProductColorsInterface $productColors
     */
    public function __construct(ProductColorsInterface $productColors)
    {
        $this->productColors = $productColors;
    }

    public function getFilters()
    {
        return [
            new TwigFilter('product_color_label', [$this, 'getProductColorLabel']),
        ];
    }

    public function getProductColorLabel(Product $product): string
    {
        return $this->productColors->getLabel($product->getColor());
    }
}
