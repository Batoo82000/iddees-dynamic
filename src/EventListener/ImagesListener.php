<?php

namespace App\EventListener;

use App\Entity\ImagesBlogs;
use App\Entity\Organigramme;
use App\Entity\Partners;
use App\Entity\SitesIddees;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityDeletedEvent;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class ImagesListener implements EventSubscriberInterface
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

    public function deletePhysicalImage(AfterEntityDeletedEvent $event): void
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof ImagesBlogs) && !($entity instanceof Organigramme) && !($entity instanceof SitesIddees) && !($entity instanceof Partners)) {
            return;
        }

        if ($entity instanceof SitesIddees) {
            $photo = $entity->getPhoto();
            if($photo) {
                $imgpath = $this->parameterBag->get("kernel.project_dir") . '/public/assets/img/sites/' . $entity->getPhoto();
                if (file_exists($imgpath)) {
                    unlink($imgpath);
                }
            }
        }
        if ($entity instanceof ImagesBlogs) {
            $photo = $entity->getPath();
            if($photo){
                $imgpath = $this->parameterBag->get("kernel.project_dir") . '/public/assets/img/blog/' . $entity->getPath();
                if (file_exists($imgpath)) {
                    unlink($imgpath);
                }
            }
        }
        if ($entity instanceof Organigramme) {
            $photo = $entity->getPhoto();
            if ($photo) {
                $imgpath = $this->parameterBag->get("kernel.project_dir") . '/public/assets/img/organigramme/' . $photo;
                if (file_exists($imgpath)) {
                    unlink($imgpath);
                }
            }
        }
        if ($entity instanceof Partners) {
            $photo = $entity->getLogo();
            if ($photo) {
                $imgpath = $this->parameterBag->get("kernel.project_dir") . '/public/assets/img/partners/' . $entity->getLogo();

                if (file_exists($imgpath)) {
                    unlink($imgpath);
                }
            }
        }
    }
}