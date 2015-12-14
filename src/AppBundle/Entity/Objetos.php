<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="OBJETOS")
 */
class Objetos {
	
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 * @ORM\Column(type="string", length=50, nullable=true)
	 */
	private $descripcion;
	
	/**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
	private $disponible_sn;
	
	/**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
	private $aval_sn;
	
	/**
	 * @ORM\ManyToOne(targetEntity="TiposObjetos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idtipo", referencedColumnName="id")
     * })
     */
	private $idtipo;
	
	/**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
	private $pagoaplazos_sn;
	
	/** 
	 * @ORM\OneToMany(targetEntity="Pujas", mappedBy="idobjeto") 
	 */
	private $pujasObjeto;
	
	
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pujasObjeto = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Objetos
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set disponibleSn
     *
     * @param string $disponibleSn
     *
     * @return Objetos
     */
    public function setDisponibleSn($disponibleSn)
    {
        $this->disponible_sn = $disponibleSn;

        return $this;
    }

    /**
     * Get disponibleSn
     *
     * @return string
     */
    public function getDisponibleSn()
    {
        return $this->disponible_sn;
    }

    /**
     * Set avalSn
     *
     * @param string $avalSn
     *
     * @return Objetos
     */
    public function setAvalSn($avalSn)
    {
        $this->aval_sn = $avalSn;

        return $this;
    }

    /**
     * Get avalSn
     *
     * @return string
     */
    public function getAvalSn()
    {
        return $this->aval_sn;
    }

    /**
     * Set pagoaplazosSn
     *
     * @param string $pagoaplazosSn
     *
     * @return Objetos
     */
    public function setPagoaplazosSn($pagoaplazosSn)
    {
        $this->pagoaplazos_sn = $pagoaplazosSn;

        return $this;
    }

    /**
     * Get pagoaplazosSn
     *
     * @return string
     */
    public function getPagoaplazosSn()
    {
        return $this->pagoaplazos_sn;
    }

    /**
     * Set idtipo
     *
     * @param \AppBundle\Entity\TiposObjetos $idtipo
     *
     * @return Objetos
     */
    public function setIdtipo(\AppBundle\Entity\TiposObjetos $idtipo = null)
    {
        $this->idtipo = $idtipo;

        return $this;
    }

    /**
     * Get idtipo
     *
     * @return \AppBundle\Entity\TiposObjetos
     */
    public function getIdtipo()
    {
        return $this->idtipo;
    }

    /**
     * Add pujasObjeto
     *
     * @param \AppBundle\Entity\Pujas $pujasObjeto
     *
     * @return Objetos
     */
    public function addPujasObjeto(\AppBundle\Entity\Pujas $pujasObjeto)
    {
        $this->pujasObjeto[] = $pujasObjeto;

        return $this;
    }

    /**
     * Remove pujasObjeto
     *
     * @param \AppBundle\Entity\Pujas $pujasObjeto
     */
    public function removePujasObjeto(\AppBundle\Entity\Pujas $pujasObjeto)
    {
        $this->pujasObjeto->removeElement($pujasObjeto);
    }

    /**
     * Get pujasObjeto
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPujasObjeto()
    {
        return $this->pujasObjeto;
    }
}
