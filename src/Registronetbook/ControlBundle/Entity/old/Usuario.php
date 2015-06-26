<?php

namespace Registronetbook\ControlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", indexes={@ORM\Index(name="fk_benefecirio_app_user1_idx", columns={"app_user_id"})})
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
     * @ORM\Column(name="curso", type="string", length=45, nullable=true)
     */
    private $curso;

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
     * @var \Registronetbook\ControlBundle\Entity\AppUser
     *
     * @ORM\ManyToOne(targetEntity="Registronetbook\ControlBundle\Entity\AppUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="app_user_id", referencedColumnName="id")
     * })
     */
    private $appUser;


}
