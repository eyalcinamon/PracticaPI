<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="PUJAS")
 */
class Pujas {

	/** 
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Objetos", inversedBy="pujasObjeto") 
     * @ORM\JoinColumn(name="idobjeto", referencedColumnName="id", nullable=false) 
     */
	private $idobjeto = 0;
	
	/**
	 * @ORM\Id()
	 * @ORM\ManyToOne(targetEntity="Usuarios", inversedBy="pujasUsuario")
	 * @ORM\JoinColumn(name="idusuario", referencedColumnName="id", nullable=false)
	 */
	private $idusuario;
	
	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	private $cantidad;
	
	/**
	 * @ORM\Column(type="string", length=1, nullable=true)
	 */
	private $estado;
	
	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	private $fechapuja;
	
	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 */
	private $path_aval;


    /**
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return Pujas
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Pujas
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set fechapuja
     *
     * @param \DateTime $fechapuja
     *
     * @return Pujas
     */
    public function setFechapuja($fechapuja)
    {
        $this->fechapuja = $fechapuja;

        return $this;
    }

    /**
     * Get fechapuja
     *
     * @return \DateTime
     */
    public function getFechapuja()
    {
        return $this->fechapuja;
    }

    /**
     * Set pathAval
     *
     * @param string $pathAval
     *
     * @return Pujas
     */
    public function setPathAval($pathAval)
    {
        $this->path_aval = $pathAval;

        return $this;
    }

    /**
     * Get pathAval
     *
     * @return string
     */
    public function getPathAval()
    {
        return $this->path_aval;
    }

    /**
     * Set idobjeto
     *
     * @param \AppBundle\Entity\Objetos $idobjeto
     *
     * @return Pujas
     */
    public function setIdobjeto(\AppBundle\Entity\Objetos $idobjeto)
    {
        $this->idobjeto = $idobjeto;

        return $this;
    }

    /**
     * Get idobjeto
     *
     * @return \AppBundle\Entity\Objetos
     */
    public function getIdobjeto()
    {
        return $this->idobjeto;
    }

    /**
     * Set idusuario
     *
     * @param \AppBundle\Entity\Usuarios $idusuario
     *
     * @return Pujas
     */
    public function setIdusuario(\AppBundle\Entity\Usuarios $idusuario)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * Get idusuario
     *
     * @return \AppBundle\Entity\Usuarios
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }
}
