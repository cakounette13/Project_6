<?php

namespace BirdBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taxref
 *
 * @ORM\Table(name="Taxref")
 * @ORM\Entity(repositoryClass="BirdBundle\Repository\TaxrefRepository")
 */
class Taxref
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
     * @var string
     *
     * @ORM\Column(name="REGNE", type="string", length=255, nullable=false)
     */
    private $regne;

    /**
     * @var string
     *
     * @ORM\Column(name="PHYLUM", type="string", length=255, nullable=false)
     */
    private $phylum;

    /**
     * @var string
     *
     * @ORM\Column(name="CLASSE", type="string", length=255, nullable=false)
     */
    private $classe;

    /**
     * @var string
     *
     * @ORM\Column(name="ORDRE", type="string", length=255, nullable=false)
     */
    private $ordre;

    /**
     * @var string
     *
     * @ORM\Column(name="FAMILLE", type="string", length=255, nullable=false)
     */
    private $famille;

    /**
     * @var integer
     *
     * @ORM\Column(name="CD_NOM", type="integer", nullable=false)
     */
    private $cdNom;

    /**
     * @var integer
     *
     * @ORM\Column(name="CD_TAXSUP", type="integer", nullable=false)
     */
    private $cdTaxsup;

    /**
     * @var integer
     *
     * @ORM\Column(name="CD_REF", type="integer", nullable=false)
     */
    private $cdRef;

    /**
     * @var string
     *
     * @ORM\Column(name="RANG", type="string", length=255, nullable=false)
     */
    private $rang;

    /**
     * @var string
     *
     * @ORM\Column(name="LB_NOM", type="string", length=255, nullable=false)
     */
    private $lbNom;

    /**
     * @var string
     *
     * @ORM\Column(name="LB_AUTEUR", type="string", length=255, nullable=true)
     */
    private $lbAuteur;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_COMPLET", type="string", length=255, nullable=false)
     */
    private $nomComplet;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_VALIDE", type="string", length=255, nullable=false)
     */
    private $nomValide;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_VERN", type="string", length=255, nullable=true)
     */
    private $nomVern;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_VERN_ENG", type="string", length=255, nullable=true)
     */
    private $nomVernEng;

    /**
     * @var string
     *
     * @ORM\Column(name="HABITAT", type="string", length=255, nullable=false)
     */
    private $habitat;

    /**
     * @var string
     *
     * @ORM\Column(name="FR", type="string", length=255, nullable=true)
     */
    private $fr;

    /**
     * @var string
     *
     * @ORM\Column(name="GF", type="string", length=255, nullable=true)
     */
    private $gf;

    /**
     * @var string
     *
     * @ORM\Column(name="MAR", type="string", length=255, nullable=true)
     */
    private $mar;

    /**
     * @var string
     *
     * @ORM\Column(name="GUA", type="string", length=255, nullable=true)
     */
    private $gua;

    /**
     * @var string
     *
     * @ORM\Column(name="SM", type="string", length=255, nullable=true)
     */
    private $sm;

    /**
     * @var string
     *
     * @ORM\Column(name="SB", type="string", length=255, nullable=true)
     */
    private $sb;

    /**
     * @var string
     *
     * @ORM\Column(name="SPM", type="string", length=255, nullable=true)
     */
    private $spm;

    /**
     * @var string
     *
     * @ORM\Column(name="MAY", type="string", length=255, nullable=true)
     */
    private $may;

    /**
     * @var string
     *
     * @ORM\Column(name="EPA", type="string", length=255, nullable=true)
     */
    private $epa;

    /**
     * @var string
     *
     * @ORM\Column(name="REU", type="string", length=255, nullable=true)
     */
    private $reu;

    /**
     * @var string
     *
     * @ORM\Column(name="TAAF", type="string", length=255, nullable=true)
     */
    private $taaf;

    /**
     * @var string
     *
     * @ORM\Column(name="NC", type="string", length=255, nullable=true)
     */
    private $nc;

    /**
     * @var string
     *
     * @ORM\Column(name="WF", type="string", length=255, nullable=true)
     */
    private $wf;

    /**
     * @var string
     *
     * @ORM\Column(name="PF", type="string", length=255, nullable=true)
     */
    private $pf;

    /**
     * @var string
     *
     * @ORM\Column(name="CLI", type="string", length=255, nullable=true)
     */
    private $cli;

    /**
     * @var integer
     *
     * @ORM\Column(name="APHIA_ID", type="integer", nullable=true)
     */
    private $aphiaId;

    /**
     * Get regne
     *
     * @return string
     */
    public function getRegne()
    {
        return $this->regne;
    }

    /**
     * Get phylum
     *
     * @return string
     */
    public function getPhylum()
    {
        return $this->phylum;
    }

    /**
     * Get classe
     *
     * @return string
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * Get ordre
     *
     * @return string
     */
    public function getOrdre()
    {
        return $this->ordre;
    }

    /**
     * Get famille
     *
     * @return string
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Get cdNom
     *
     * @return integer
     */
    public function getCdNom()
    {
        return $this->cdNom;
    }

    /**
     * Get cdTaxsup
     *
     * @return integer
     */
    public function getCdTaxsup()
    {
        return $this->cdTaxsup;
    }


    /**
     * Get cdRef
     *
     * @return integer
     */
    public function getCdRef()
    {
        return $this->cdRef;
    }

    /**
     * Get rang
     *
     * @return string
     */
    public function getRang()
    {
        return $this->rang;
    }

    /**
     * Get lbNom
     *
     * @return string
     */
    public function getLbNom()
    {
        return $this->lbNom;
    }

    /**
     * Get lbAuteur
     *
     * @return string
     */
    public function getLbAuteur()
    {
        return $this->lbAuteur;
    }

    /**
     * Get nomComplet
     *
     * @return string
     */
    public function getNomComplet()
    {
        return $this->nomComplet;
    }

    /**
     * Get nomValide
     *
     * @return string
     */
    public function getNomValide()
    {
        return $this->nomValide;
    }

    /**
     * Get nomVern
     *
     * @return string
     */
    public function getNomVern()
    {
        return $this->nomVern;
    }

    /**
     * Get nomVernEng
     *
     * @return string
     */
    public function getNomVernEng()
    {
        return $this->nomVernEng;
    }

    /**
     * Get habitat
     *
     * @return string
     */
    public function getHabitat()
    {
        return $this->habitat;
    }

    /**
     * Get fr
     *
     * @return string
     */
    public function getFr()
    {
        return $this->fr;
    }

    /**
     * Get gf
     *
     * @return string
     */
    public function getGf()
    {
        return $this->gf;
    }

    /**
     * Get mar
     *
     * @return string
     */
    public function getMar()
    {
        return $this->mar;
    }

    /**
     * Get gua
     *
     * @return string
     */
    public function getGua()
    {
        return $this->gua;
    }

    /**
     * Get sm
     *
     * @return string
     */
    public function getSm()
    {
        return $this->sm;
    }

    /**
     * Get sb
     *
     * @return string
     */
    public function getSb()
    {
        return $this->sb;
    }

    /**
     * Get spm
     *
     * @return string
     */
    public function getSpm()
    {
        return $this->spm;
    }

    /**
     * Get may
     *
     * @return string
     */
    public function getMay()
    {
        return $this->may;
    }

    /**
     * Get epa
     *
     * @return string
     */
    public function getEpa()
    {
        return $this->epa;
    }

    /**
     * Get reu
     *
     * @return string
     */
    public function getReu()
    {
        return $this->reu;
    }

    /**
     * Get taaf
     *
     * @return string
     */
    public function getTaaf()
    {
        return $this->taaf;
    }

    /**
     * Get nc
     *
     * @return string
     */
    public function getNc()
    {
        return $this->nc;
    }

    /**
     * Get wf
     *
     * @return string
     */
    public function getWf()
    {
        return $this->wf;
    }

    /**
     * Get pf
     *
     * @return string
     */
    public function getPf()
    {
        return $this->pf;
    }

    /**
     * Get cli
     *
     * @return string
     */
    public function getCli()
    {
        return $this->cli;
    }

    /**
     * Get aphiaId
     *
     * @return integer
     */
    public function getAphiaId()
    {
        return $this->aphiaId;
    }

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param string $regne
	 */
	public function setRegne( $regne ) {
		$this->regne = $regne;
	}

	/**
	 * @param string $phylum
	 */
	public function setPhylum( $phylum ) {
		$this->phylum = $phylum;
	}

	/**
	 * @param string $classe
	 */
	public function setClasse( $classe ) {
		$this->classe = $classe;
	}

	/**
	 * @param string $taaf
	 */
	public function setTaaf( $taaf ) {
		$this->taaf = $taaf;
	}

	/**
	 * @param string $ordre
	 */
	public function setOrdre( $ordre ) {
		$this->ordre = $ordre;
	}

	/**
	 * @param string $famille
	 */
	public function setFamille( $famille ) {
		$this->famille = $famille;
	}

	/**
	 * @param int $cdNom
	 */
	public function setCdNom( $cdNom ) {
		$this->cdNom = $cdNom;
	}

	/**
	 * @param int $cdTaxsup
	 */
	public function setCdTaxsup( $cdTaxsup ) {
		$this->cdTaxsup = $cdTaxsup;
	}

	/**
	 * @param int $cdRef
	 */
	public function setCdRef( $cdRef ) {
		$this->cdRef = $cdRef;
	}

	/**
	 * @param string $rang
	 */
	public function setRang( $rang ) {
		$this->rang = $rang;
	}

	/**
	 * @param string $lbAuteur
	 */
	public function setLbAuteur( $lbAuteur ) {
		$this->lbAuteur = $lbAuteur;
	}

	/**
	 * @param string $nomValide
	 */
	public function setNomValide( $nomValide ) {
		$this->nomValide = $nomValide;
	}

    /**
     * Set lbNom
     *
     * @param string $lbNom
     *
     * @return Taxref
     */
    public function setLbNom($lbNom)
    {
        $this->lbNom = $lbNom;

        return $this;
    }

    /**
     * Set nomComplet
     *
     * @param string $nomComplet
     *
     * @return Taxref
     */
    public function setNomComplet($nomComplet)
    {
        $this->nomComplet = $nomComplet;

        return $this;
    }

    /**
     * Set nomVern
     *
     * @param string $nomVern
     *
     * @return Taxref
     */
    public function setNomVern($nomVern)
    {
        $this->nomVern = $nomVern;

        return $this;
    }

    /**
     * Set nomVernEng
     *
     * @param string $nomVernEng
     *
     * @return Taxref
     */
    public function setNomVernEng($nomVernEng)
    {
        $this->nomVernEng = $nomVernEng;

        return $this;
    }

    /**
     * Set habitat
     *
     * @param string $habitat
     *
     * @return Taxref
     */
    public function setHabitat($habitat)
    {
        $this->habitat = $habitat;

        return $this;
    }

    /**
     * Set fr
     *
     * @param string $fr
     *
     * @return Taxref
     */
    public function setFr($fr)
    {
        $this->fr = $fr;

        return $this;
    }

    /**
     * Set gf
     *
     * @param string $gf
     *
     * @return Taxref
     */
    public function setGf($gf)
    {
        $this->gf = $gf;

        return $this;
    }

    /**
     * Set mar
     *
     * @param string $mar
     *
     * @return Taxref
     */
    public function setMar($mar)
    {
        $this->mar = $mar;

        return $this;
    }

    /**
     * Set gua
     *
     * @param string $gua
     *
     * @return Taxref
     */
    public function setGua($gua)
    {
        $this->gua = $gua;

        return $this;
    }

    /**
     * Set sm
     *
     * @param string $sm
     *
     * @return Taxref
     */
    public function setSm($sm)
    {
        $this->sm = $sm;

        return $this;
    }

    /**
     * Set sb
     *
     * @param string $sb
     *
     * @return Taxref
     */
    public function setSb($sb)
    {
        $this->sb = $sb;

        return $this;
    }

    /**
     * Set spm
     *
     * @param string $spm
     *
     * @return Taxref
     */
    public function setSpm($spm)
    {
        $this->spm = $spm;

        return $this;
    }

    /**
     * Set may
     *
     * @param string $may
     *
     * @return Taxref
     */
    public function setMay($may)
    {
        $this->may = $may;

        return $this;
    }

    /**
     * Set epa
     *
     * @param string $epa
     *
     * @return Taxref
     */
    public function setEpa($epa)
    {
        $this->epa = $epa;

        return $this;
    }

    /**
     * Set reu
     *
     * @param string $reu
     *
     * @return Taxref
     */
    public function setReu($reu)
    {
        $this->reu = $reu;

        return $this;
    }

    /**
     * Set nc
     *
     * @param string $nc
     *
     * @return Taxref
     */
    public function setNc($nc)
    {
        $this->nc = $nc;

        return $this;
    }

    /**
     * Set wf
     *
     * @param string $wf
     *
     * @return Taxref
     */
    public function setWf($wf)
    {
        $this->wf = $wf;

        return $this;
    }

    /**
     * Set pf
     *
     * @param string $pf
     *
     * @return Taxref
     */
    public function setPf($pf)
    {
        $this->pf = $pf;

        return $this;
    }

    /**
     * Set cli
     *
     * @param string $cli
     *
     * @return Taxref
     */
    public function setCli($cli)
    {
        $this->cli = $cli;

        return $this;
    }

    /**
     * Set aphiaId
     *
     * @param integer $aphiaId
     *
     * @return Taxref
     */
    public function setAphiaId($aphiaId)
    {
        $this->aphiaId = $aphiaId;

        return $this;
    }
}
