<?php

namespace App\EventListener;

use App\Entity\SitesIddees;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityDeletedEvent;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class SitesIddeesListener implements EventSubscriberInterface
{
    /**
     * @var ParameterBagInterface
     */
    private $parameterBag;

    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->parameterBag = $parameterBag;
    }

    public static function getSubscribedEvents()
    {
        return [
            AfterEntityDeletedEvent::class => ["deletePhysicalImage"],
        ];
    }

    public function deletePhysicalImage(AfterEntityDeletedEvent $event)
    {
        $entity = $event->getEntityInstance();
        if (!($entity instanceof SitesIddees)) {
            return;
        }
        $imgpath = $this->parameterBag->get("kernel.project_dir") . '/public/assets/img/sites/' . $entity->getPhoto();

            if (file_exists($imgpath)) {
                unlink($imgpath);
            }
    }
}