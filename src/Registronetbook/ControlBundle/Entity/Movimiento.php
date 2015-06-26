<?php

namespace Registronetbook\ControlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movimiento
 *
 * @ORM\Table(name="movimiento", indexes={@ORM\Index(name="fk_movimiento_app_user1_idx", columns={"app_user_id"}), @ORM\Index(name="fk_movimiento_ubicacion_idx", columns={"ubicacion_id"}), @ORM\Index(name="fk_movimiento_problema_idx", columns={"problema_id"}), @ORM\Index(name="fk_movimiento_estado_idx", columns={"estado_id"}), @ORM\Index(name="fk_movimiento_tipoMovimiento_idx", columns={"tipoMovimiento_id"})})
 * @ORM\Entity
 */
class Movimiento
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
     * @var integer
     *
     * @ORM\Column(name="linea", type="integer", nullable=false)
     */
    private $linea;


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
     * @var \Registronetbook\ControlBundle\Entity\Maquina
     *
     * @ORM\ManyToOne(targetEntity="Registronetbook\ControlBundle\Entity\Maquina")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="maquina_id", referencedColumnName="id")
     * })
     */
    private $maquina;

    /**
     * @var \Registronetbook\ControlBundle\Entity\Ubicacion
     *
     * @ORM\ManyToOne(targetEntity="Registronetbook\ControlBundle\Entity\Ubicacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ubicacion_id", referencedColumnName="id")
     * })
     */
    private $ubicacion;

    /**
     * @var \Registronetbook\ControlBundle\Entity\Problema
     *
     * @ORM\ManyToOne(targetEntity="Registronetbook\ControlBundle\Entity\Problema")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="problema_id", referencedColumnName="id")
     * })
     */
    private $problema;

    /**
    * @var \Registronetbook\ControlBundle\Entity\Estado
    * @ORM\ManyToOne(targetEntity="Registronetbook\ControlBundle\Entity\Estado")
    * @ORM\JoinColumns({
    *   @ORM\JoinColumn(name="estado_id", referencedColumnName="id")
    * })
    */
    private $estado;

    /**
    * @var \Registronetbook\ControlBundle\Entity\TipoMovimiento
    * @ORM\ManyToOne(targetEntity="Registronetbook\ControlBundle\Entity\TipoMovimiento")
    * @ORM\JoinColumns({
    *   @ORM\JoinColumn(name="tipoMovimiento_id", referencedColumnName="id")
    * })
    */
    private $tipoMovimiento;    

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
     * Set linea
     *
     * @param integer $linea
     * @return Movimiento
     */
    public function setLinea($linea)
    {
        $this->linea = $linea;

        return $this;
    }

    /**
     * Get linea
     *
     * @return integer 
     */
    public function getLinea()
    {
        return $this->linea;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Movimiento
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
     * @return Movimiento
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
     * @return Movimiento
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
     * @return Movimiento
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
     * @return Movimiento
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
     * Set maquina
     *
     * @param \Registronetbook\ControlBundle\Entity\Maquina $maquina
     * @return Movimiento
     */
    public function setMaquina(\Registronetbook\ControlBundle\Entity\Maquina $maquina = null)
    {
        $this->maquina = $maquina;

        return $this;
    }

    /**
     * Get maquina
     *
     * @return \Registronetbook\ControlBundle\Entity\Maquina 
     */
    public function getMaquina()
    {
        return $this->maquina;
    }

    /**
     * Set ubicacion
     *
     * @param \Registronetbook\ControlBundle\Entity\Ubicacion $ubicacion
     * @return Movimiento
     */
    public function setUbicacion(\Registronetbook\ControlBundle\Entity\Ubicacion $ubicacion = null)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return \Registronetbook\ControlBundle\Entity\Ubicacion 
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set problema
     *
     * @param \Registronetbook\ControlBundle\Entity\Problema $problema
     * @return Movimiento
     */
    public function setProblema(\Registronetbook\ControlBundle\Entity\Problema $problema = null)
    {
        $this->problema = $problema;

        return $this;
    }

    /**
     * Get problema
     *
     * @return \Registronetbook\ControlBundle\Entity\Problema 
     */
    public function getProblema()
    {
        return $this->problema;
    }

    /**
     * Set estado
     *
     * @param \Registronetbook\ControlBundle\Entity\Estado $estado
     * @return Movimiento
     */
    public function setEstado(\Registronetbook\ControlBundle\Entity\Estado $estado = null)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return \Registronetbook\ControlBundle\Entity\Estado 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set tipoMovimiento
     *
     * @param \Registronetbook\ControlBundle\Entity\TipoMovimiento $tipoMovimiento
     * @return Movimiento
     */
    public function setTipoMovimiento(\Registronetbook\ControlBundle\Entity\TipoMovimiento $tipoMovimiento = null)
    {
        $this->tipoMovimiento = $tipoMovimiento;

        return $this;
    }

    /**
     * Get tipoMovimiento
     *
     * @return \Registronetbook\ControlBundle\Entity\TipoMovimiento 
     */
    public function getTipoMovimiento()
    {
        return $this->tipoMovimiento;
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
