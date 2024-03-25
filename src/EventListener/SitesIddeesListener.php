<?php

namespace App\EventListener;

use App\Entity\SitesIddees;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\PostRemoveEventArgs;
use Doctrine\ORM\Events;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityDeletedEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

//final class SitesIddeesListener implements EventSubscriber
//{
//    public function __construct(ParameterBagInterface $parameterBag)
//    {
//        $this->parameterBag = $parameterBag;
//    }
//    public function getSubscribedEvents()
//    {
//        return [
//            Events::preRemove,
//            Events::preUpdate,
//            Events::postRemove,
//        ];
//    }
//    public function postRemove(SitesIddees $sitesIddees, LifecycleEventArgs $args): void
//    {
//        $this->removePhoto($sitesIddees);
//    }
//    public function preUpdate(SitesIddees $sitesIddees, LifecycleEventArgs $args): void
//    {
//        $this->removePhoto($sitesIddees);
//    }
//
//
//    private function removePhoto(SitesIddees $sitesIddees): void
//    {
//        $photo = $sitesIddees->getPhoto();
//
//        if($photo) {
//            $uploadDir = $this->parameterBag->get('kernel.project_dir') . '/public/assets/img/sites';
//            $filePath = $uploadDir . '/' . $photo;
//
//            if (file_exists($filePath)) {
//                unlink($filePath);
//            }
//        }
//    }
//}
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
        $imgpath =
            $this->parameterBag->get("kernel.project_dir") . '/public/assets/img/sites/' . $entity->getPhoto();

            if (file_exists($imgpath)) {
                unlink($imgpath);
            }
    }
}