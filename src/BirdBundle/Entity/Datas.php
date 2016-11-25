<?php

namespace BirdBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Datas
 *
 * @ORM\Table(name="datas")
 * @ORM\Entity(repositoryClass="BirdBundle\Repository\DatasRepository")
 */
class Datas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateVue", type="date", nullable=false)
     */
    private $datevue;

    /**
     * @var string
     *
     * @ORM\Column(name="Image", type="string", length=255, nullable=true)
     * @Assert\File(maxSize="4M", mimeTypes = {"image/png","image/jpeg","image/jpg"},
     *      mimeTypesMessage = "Merci de choisir un fichier valide de maximum 4M")
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="Latitude", type="float", nullable=false)
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="Longitude", type="float", nullable=false)
     */
    private $longitude;

    /**
     * @ORM\ManyToOne(targetEntity="Taxref", fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nom;

	/**
	 * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $member;
	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="valid", type="boolean", nullable=true)
	 */
	private $valid;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set datevue
     *
     * @param \DateTime $datevue
     *
     * @return Datas
     */
    public function setDatevue($datevue)
    {
        $this->datevue = $datevue;

        return $this;
    }

    /**
     * Get datevue
     *
     * @return \DateTime
     */
    public function getDatevue()
    {
        return $this->datevue;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Datas
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     *
     * @return Datas
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return Datas
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setNom(Taxref $nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNom()
    {
        return $this->nom;
    }

	/**
	 * @return mixed
	 */
	public function getValid() {
		return $this->valid;
	}

	/**
	 * @param mixed $valid
	 */
	public function setValid($valid) {
		$this->valid = $valid;
	}

	/**
	 * @return mixed
	 */
	public function getMember() {
		return $this->member;
	}

	/**
	 * @param mixed $member
	 */
	public function setMember( $member ) {
		$this->member = $member;
	}
}
