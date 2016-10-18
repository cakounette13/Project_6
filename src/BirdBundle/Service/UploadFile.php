<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 10/18/16
 * Time: 10:45 AM
 */

namespace BirdBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadFile {
	
	private $targetDir;

	public function __construct($targetDir)
	{
		$this->targetDir = $targetDir;
	}

	public function upload(UploadedFile $file)
	{
		$fileName = md5(uniqid()).'.'.$file->guessExtension();

		$file->move($this->targetDir, $fileName);

		return $fileName;
	}
}