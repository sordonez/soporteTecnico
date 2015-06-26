<?php

namespace Registronetbook\ControlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppUser
 *
 * @ORM\Table(name="app_user", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_88BDF3E9F85E0677", columns={"username"}), @ORM\UniqueConstraint(name="UNIQ_88BDF3E9E7927C74", columns={"email"}), @ORM\UniqueConstraint(name="UNIQ_88BDF3E97F8F253B", columns={"dni"})})
 * @ORM\Entity
 */
class AppUser
{
    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=64, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60, nullable=false)
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    private $isActive;

    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=64, nullable=false)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="roles", type="string", length=64, nullable=false)
     */
    private $roles;

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
     * @var boolean
     *
     * @ORM\Column(name="anulado", type="boolean", nullable=true)
     */
    private $anulado;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}
