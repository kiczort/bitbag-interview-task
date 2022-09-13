<?php

namespace App\Form\Type;

use App\Service\ProductColorsInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductColorType extends AbstractType
{
    protected ProductColorsInterface $productColors;

    public function __construct(ProductColorsInterface $productColors)
    {
        $this->productColors = $productColors;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => $this->resolveColorChoices(),
        ]);
    }

    public function resolveColorChoices(): array
    {
        $choices = [
            'Wybierz kolor' => '',
        ];

        foreach ($this->productColors->getCodes() as $code) {
            $choices[$this->productColors->getLabel($code)] = $code;
        }

        return $choices;
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }
}
