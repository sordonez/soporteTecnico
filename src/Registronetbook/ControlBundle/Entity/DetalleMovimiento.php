<?php

namespace Registronetbook\ControlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleMovimiento
 *
 * @ORM\Table(name="detalleMovimiento", indexes={@ORM\Index(name="fk_detalleMovimiento_app_user1_idx", columns={"app_user_id"}), @ORM\Index(name="fk_detalleMovimiento_ubicacion_idx", columns={"ubicacion_id"}), @ORM\Index(name="fk_detalleMovimiento_problema_idx", columns={"problema_id"}), @ORM\Index(name="fk_detalleMovimiento_estado_idx", columns={"estado_id"}), @ORM\Index(name="fk_detalleMovimiento_tipoMovimiento_idx", columns={"tipoMovimiento_id"})})
 * @ORM\Entity
 */
class DetalleMovimiento
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
     * @var \Registronetbook\ControlBundle\Entity\Orden
     *
     * @ORM\ManyToOne(targetEntity="Registronetbook\ControlBundle\Entity\Orden")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="orden_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $orden;

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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return DetalleMovimiento
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
     * @return DetalleMovimiento
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
     * @return DetalleMovimiento
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
     * @return DetalleMovimiento
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
     * @return DetalleMovimiento
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
     * Set orden
     *
     * @param \Registronetbook\ControlBundle\Entity\Orden $orden
     * @return DetalleMovimiento
     */
    public function setOrden(\Registronetbook\ControlBundle\Entity\Orden $orden)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get orden
     *
     * @return \Registronetbook\ControlBundle\Entity\Orden 
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Set ubicacion
     *
     * @param \Registronetbook\ControlBundle\Entity\Ubicacion $ubicacion
     * @return DetalleMovimiento
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
     * @return DetalleMovimiento
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
     * @return DetalleMovimiento
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
     * @return DetalleMovimiento
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
    public function addOrden(Orden $orden)
    {
        if (!$this->orden->contains($orden)) {
            $this->orden->add($orden);
        }
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
