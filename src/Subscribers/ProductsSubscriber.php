<?php


namespace App\Subscribers;


use App\Entity\Products;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;

class ProductsSubscriber implements EventSubscriberInterface
{

    /**
     * @var Security
     */
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setUser'],
        ];
    }
    

    // public function setUser(BeforeEntityPersistedEvent $event)
    // {
    //     dd($event);
    // }

    public function setUser(BeforeEntityPersistedEvent  $event)
    {
        $entity = $event->getEntityInstance();

        if ($entity instanceof Products) {
            $entity->setUser($this->security->getUser());
        }
        // dd($entity);
        return;
    }
}