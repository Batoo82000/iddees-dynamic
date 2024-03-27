<?php

namespace App\EventListener;

use App\Entity\Organigramme;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityDeletedEvent;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class OrganigrammeListener implements EventSubscriberInterface
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
        if (!($entity instanceof Organigramme)) {
            return;
        }
        $imgpath = $this->parameterBag->get("kernel.project_dir") . '/public/assets/img/organigramme/' . $entity->getPhoto();
        
            if (file_exists($imgpath)) {
                unlink($imgpath);
            }
    }
}