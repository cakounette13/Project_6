<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 10/18/16
 * Time: 10:52 AM
 */

namespace BirdBundle\EventListener;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use BirdBundle\Entity\Datas;
use BirdBundle\Service\UploadFile;

class ImageUploadListener {

	private $uploader;

	public function __construct(UploadFile $uploader)
	{
		$this->uploader = $uploader;
	}

	public function prePersist(LifecycleEventArgs $args)
	{
		$entity = $args->getEntity();

		$this->uploadFile($entity);
	}

	public function preUpdate(PreUpdateEventArgs $args)
	{
		$entity = $args->getEntity();

		$this->uploadFile($entity);
	}

	public function uploadFile($entity)
	{
		if (!$entity instanceof Datas) {
			return;
		}

		$file = $entity->getImage();

		if (!$file instanceof UploadedFile) {
			return;
		}
		$fileName = $this->uploader->upload($file);
		$entity->setImage($fileName);
	}
}