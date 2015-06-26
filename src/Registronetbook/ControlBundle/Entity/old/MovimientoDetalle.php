<?php

namespace Registronetbook\ControlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MovimientoDetalle
 *
 * @ORM\Table(name="movimiento_detalle", indexes={@ORM\Index(name="fk_movimiento_detalle_app_user1_idx", columns={"app_user_id"}), @ORM\Index(name="fk_movimiento_detalle_movimiento1_idx", columns={"movimiento_id"})})
 * @ORM\Entity
 */
class MovimientoDetalle
{
    /**
     * @var integer
     *
     * @ORM\Column(name="linea", type="integer", nullable=false)
     */
    private $linea;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=100, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=45, nullable=true)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="string", length=45, nullable=true)
     */
    private $ubicacion;

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
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Registronetbook\ControlBundle\Entity\Movimiento
     *
     * @ORM\ManyToOne(targetEntity="Registronetbook\ControlBundle\Entity\Movimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="movimiento_id", referencedColumnName="id")
     * })
     */
    private $movimiento;

    /**
     * @var \Registronetbook\ControlBundle\Entity\AppUser
     *
     * @ORM\ManyToOne(targetEntity="Registronetbook\ControlBundle\Entity\AppUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="app_user_id", referencedColumnName="id")
     * })
     */
    private $appUser;


}
