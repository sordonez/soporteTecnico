<?php

namespace Registronetbook\ControlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Benefeciado
 *
 * @ORM\Table(name="benefeciado")
 * @ORM\Entity
 */
class Benefeciado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idbenefeciado", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idbenefeciado;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=200, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=45, nullable=true)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="cuil", type="string", length=45, nullable=true)
     */
    private $cuil;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=45, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=45, nullable=true)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=500, nullable=true)
     */
    private $direccion;



    /**
     * Get idbenefeciado
     *
     * @return integer 
     */
    public function getIdbenefeciado()
    {
        return $this->idbenefeciado;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Benefeciado
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
     * Set dni
     *
     * @param string $dni
     * @return Benefeciado
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string 
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set cuil
     *
     * @param string $cuil
     * @return Benefeciado
     */
    public function setCuil($cuil)
    {
        $this->cuil = $cuil;

        return $this;
    }

    /**
     * Get cuil
     *
     * @return string 
     */
    public function getCuil()
    {
        return $this->cuil;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Benefeciado
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Benefeciado
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Benefeciado
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function __toString()
    {
        return $this->getNombre();

    }
}
