<?php

namespace App\Controller\Admin;

use App\Entity\Products;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;

class ProductsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Products::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            ImageField::new('image')->setBasePath("public/uploads/images")->setUploadDir('public/uploads/images'),
            TextareaField::new('imageFile', "images")->setFormType(VichImageType::class),
            TextField::new('name'),
            SlugField::new('slug')->setTargetFieldName('name')->hideOnIndex(),
            TextareaField::new('placeOfPurchase'),
            TextField::new('productReference'),
            AssociationField::new('user'),
            DateTimeField::new('timeOfPurchase'),
            DateTimeField::new('endOfGaranteeDate'),
            MoneyField::new('price')->setCurrency('EUR'),
            TextField::new('maintenanceAdvice'),
            TextField::new('purchaseTicketImage'),
            AssociationField::new('category')->autocomplete()
        ];
    }
    
}
