<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="GESTORES")
 */
class Gestores
{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=50, nullable=false, unique=true)
     */
    private $email;
    
    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $nombre;
    
    /**
     * @ORM\Column(type="string", length=10, nullable=false)
     */
    private $password;
    
    /**
     * @ORM\Column(type="string", length=1, nullable=false)
     */
    private $jefe_sn;
    
    /**
     * @ORM\ManyToMany(targetEntity="Objetos")
     * @ORM\JoinTable(name="GESTIONAN",
     *      joinColumns={@ORM\JoinColumn(name="idgestor", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="idobjeto", referencedColumnName="id")}
     *      )
     **/
    private $objetos;
    
    public function __construct() {
    	$this->objetos = new ArrayCollection();
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
     * Set email
     *
     * @param string $email
     *
     * @return Gestores
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Gestores
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Gestores
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set jefeSn
     *
     * @param \character $jefeSn
     *
     * @return Gestores
     */
    public function setJefeSn($jefeSn)
    {
        $this->jefe_sn = $jefeSn;

        return $this;
    }

    /**
     * Get jefeSn
     *
     * @return \character
     */
    public function getJefeSn()
    {
        return $this->jefe_sn;
    }

    /**
     * Add objeto
     *
     * @param \AppBundle\Entity\Objetos $objeto
     *
     * @return Gestores
     */
    public function addObjeto(\AppBundle\Entity\Objetos $objeto)
    {
        $this->objetos[] = $objeto;

        return $this;
    }

    /**
     * Remove objeto
     *
     * @param \AppBundle\Entity\Objetos $objeto
     */
    public function removeObjeto(\AppBundle\Entity\Objetos $objeto)
    {
        $this->objetos->removeElement($objeto);
    }

    /**
     * Get objetos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObjetos()
    {
        return $this->objetos;
    }
}
