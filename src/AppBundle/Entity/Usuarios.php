<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="USUARIOS")
 */
class Usuarios implements UserInterface, \Serializable{
	
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 * @ORM\Column(type="string", length=50, unique=true, nullable=false)
	 */
	private $email;
	
	/**
	 * @ORM\Column(type="string", length=50, nullable=false)
	 */
	private $nombre;
	
	/**
	 * @ORM\Column(type="string", length=100, nullable=false)
	 */
	private $password;
	
	//To repeat the password
	private $plainPassword;
	
	/** 
	 * @ORM\OneToMany(targetEntity="Pujas", mappedBy="idusuario") 
	 */
	private $pujasUsuario;
	
	
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pujasUsuario = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Usuarios
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
     * @return Usuarios
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
     * @return Usuarios
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
     * Set plain password
     * 
     * @param string $password
     */
    public function setPlainPassword($password)
    {
    	$this->plainPassword = $password;
    }
    
    /**
     * Get plain password
     * 
     * @return string
     */
    public function getPlainPassword()
    {
    	return $this->plainPassword;
    }
    
    

    /**
     * Add pujasUsuario
     *
     * @param \AppBundle\Entity\Pujas $pujasUsuario
     *
     * @return Usuarios
     */
    public function addPujasUsuario(\AppBundle\Entity\Pujas $pujasUsuario)
    {
        $this->pujasUsuario[] = $pujasUsuario;

        return $this;
    }

    /**
     * Remove pujasUsuario
     *
     * @param \AppBundle\Entity\Pujas $pujasUsuario
     */
    public function removePujasUsuario(\AppBundle\Entity\Pujas $pujasUsuario)
    {
        $this->pujasUsuario->removeElement($pujasUsuario);
    }

    /**
     * Get pujasUsuario
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPujasUsuario()
    {
        return $this->pujasUsuario;
    }
	/**
	 * {@inheritDoc}
	 * @see \Symfony\Component\Security\Core\User\UserInterface::getRoles()
	 */
	public function getRoles() {
		// TODO: Auto-generated method stub
		return array('ROLE_USER');
	}

	/**
	 * {@inheritDoc}
	 * @see \Symfony\Component\Security\Core\User\UserInterface::getSalt()
	 */
	public function getSalt() {
		// TODO: Auto-generated method stub
		return null;
	}

	/**
	 * {@inheritDoc}
	 * @see \Symfony\Component\Security\Core\User\UserInterface::getUsername()
	 */
	public function getUsername() {
		// TODO: Auto-generated method stub
		return $this->nombre;
	}

	/**
	 * {@inheritDoc}
	 * @see \Symfony\Component\Security\Core\User\UserInterface::eraseCredentials()
	 */
	public function eraseCredentials() {
		// TODO: Auto-generated method stub

	}
	
	/** @see \Serializable::serialize() */
	public function serialize()
	{
		return serialize(array(
				$this->id,
				$this->nombre,
				$this->password,
				// see section on salt below
				// $this->salt,
		));
	}
	
	/** @see \Serializable::unserialize() */
	public function unserialize($serialized)
	{
		list (
				$this->id,
				$this->nombre,
				$this->password,
				// see section on salt below
				// $this->salt
				) = unserialize($serialized);
	}

}
