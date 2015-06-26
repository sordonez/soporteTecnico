<?php

namespace Registronetbook\ControlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ubicacion
 *
 * @ORM\Table(name="ubicacion", indexes={@ORM\Index(name="fk_ubicacion_app_user1_idx", columns={"app_user_id"})})
 * @ORM\Entity
 */
class Ubicacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=true)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=1000, nullable=true)
     */
    private $descripcion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="anulado", type="boolean", nullable=true)
     */
    private $anulado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_anulado", type="datetime", nullable=true)
     */
    private $fechaAnulado;

    /**
     * @var \Registronetbook\UserBundle\Entity\AppUser
     *
     * @ORM\ManyToOne(targetEntity="Registronetbook\UserBundle\Entity\AppUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="app_user_id", referencedColumnName="id")
     * })
     */
    private $appUser;

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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Ubicacion
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Ubicacion
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
     * Set anulado
     *
     * @param boolean $anulado
     * @return Ubicacion
     */
    public function setAnulado($anulado)
    {
        $this->anulado = $anulado;

        return $this;
    }

    /**
     * Get anulado
     *
     * @return boolean 
     */
    public function getAnulado()
    {
        return $this->anulado;
    }

    /**
     * Set fechaAnulado
     *
     * @param \DateTime $fechaAnulado
     * @return Ubicacion
     */
    public function setFechaAnulado($fechaAnulado)
    {
        $this->fechaAnulado = $fechaAnulado;

        return $this;
    }

    /**
     * Get fechaAnulado
     *
     * @return \DateTime 
     */
    public function getFechaAnulado()
    {
        return $this->fechaAnulado;
    }


    /**
     * Set appUser
     *
     * @param \Registronetbook\UserBundle\Entity\AppUser $appUser
     * @return Ubicacion
     */
    public function setAppUser(\Registronetbook\UserBundle\Entity\AppUser $appUser = null)
    {
        $this->appUser = $appUser;

        return $this;
    }

    /**
     * Get appUser
     *
     * @return \Registronetbook\UserBundle\Entity\AppUser 
     */
    public function getAppUser()
    {
        return $this->appUser;
    }

    /**
     * Get string
     *
     * @return string 
     */
    public function __toString()
    {
        return $this->getDescripcion();
    }
}