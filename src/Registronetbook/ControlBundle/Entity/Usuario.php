<?php

namespace Registronetbook\ControlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", indexes={@ORM\Index(name="fk_benefecirio_app_user1_idx", columns={"app_user_id"})}, indexes={@ORM\Index(name="fk_curso_curso_idx", columns={"curso_id"})})
 * @ORM\Entity
 */
class Usuario
{
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
     * @ORM\Column(name="nacionalidad", type="string", length=45, nullable=true)
     */
    private $nacionalidad;

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
     * @ORM\Column(name="fecha_nacimiento", type="datetime", nullable=true)
     */
    private $fechaNacimiento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alta", type="datetime", nullable=true)
     */
    private $fechaAlta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_baja", type="datetime", nullable=true)
     */
    private $fechaBaja;

    /**
     * @var string
     *
     * @ORM\Column(name="turno", type="string", length=45, nullable=true)
     */
    private $turno;

    /**
     * @var boolean
     *
     * @ORM\Column(name="egresado", type="boolean", nullable=true)
     */
    private $egresado;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=45, nullable=true)
     */
    private $tipo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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
     * @var \Registronetbook\ControlBundle\Entity\Curso
     *
     * @ORM\ManyToOne(targetEntity="Registronetbook\ControlBundle\Entity\Curso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="curso_id", referencedColumnName="id")
     * })
     */
    private $curso;


    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Usuario
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
     * @return Usuario
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
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     * @return Usuario
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime 
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set fechaBaja
     *
     * @param \DateTime $fechaBaja
     * @return Usuario
     */
    public function setFechaBaja($fechaBaja)
    {
        $this->fechaBaja = $fechaBaja;

        return $this;
    }

    /**
     * Get fechaBaja
     *
     * @return \DateTime 
     */
    public function getFechaBaja()
    {
        return $this->fechaBaja;
    }

    /**
     * Set turno
     *
     * @param string $turno
     * @return Usuario
     */
    public function setTurno($turno)
    {
        $this->turno = $turno;

        return $this;
    }

    /**
     * Get turno
     *
     * @return string 
     */
    public function getTurno()
    {
        return $this->turno;
    }

    /**
     * Set egresado
     *
     * @param boolean $egresado
     * @return Usuario
     */
    public function setEgresado($egresado)
    {
        $this->egresado = $egresado;

        return $this;
    }

    /**
     * Get egresado
     *
     * @return boolean 
     */
    public function getEgresado()
    {
        return $this->egresado;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Usuario
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
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
     * Set appUser
     *
     * @param \Registronetbook\UserBundle\Entity\AppUser $appUser
     * @return Usuario
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
     * Set curso
     *
     * @param \Registronetbook\ControlBundle\Entity\Curso $curso
     * @return Usuario
     */
    public function setCurso(\Registronetbook\ControlBundle\Entity\Curso $curso = null)
    {
        $this->curso = $curso;

        return $this;
    }

    /**
     * Get cruso
     *
     * @return \Registronetbook\ControlBundle\Entity\Curso 
     */
    public function getCurso()
    {
        return $this->curso;
    }
    
    /**
     * Get string
     *
     * @return string 
     */
    public function __toString()
    {
        return $this->getNombre();

    }
}
