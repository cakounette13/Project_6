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

	/**
	 * @var UploadFile
	 */
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

	private function uploadFile($entity)
	{
		// upload only works for Product entities
		if (!$entity instanceof Datas) {
			return;
		}

		$file = $entity->getImage();

		// only upload new files
		if (!$file instanceof UploadedFile) {
			return;
		}

		$fileName = $this->uploader->upload($file);
		$entity->setImage($fileName);
	}
}