<?php

namespace Registronetbook\ControlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movimiento
 *
 * @ORM\Table(name="movimiento", indexes={@ORM\Index(name="fk_movimiento_maquina_idx", columns={"maquina_idmaquina"})})
 * @ORM\Entity
 */
class Movimiento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idmovimiento", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmovimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="diagnostico", type="string", length=255, nullable=false)
     */
    private $diagnostico;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_entrada", type="datetime", nullable=true)
     */
    private $fechaEntrada;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_salida", type="datetime", nullable=true)
     */
    private $fechaSalida;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_envio", type="datetime", nullable=true)
     */
    private $fechaEnvio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_recivo", type="datetime", nullable=true)
     */
    private $fechaRecivo;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=45, nullable=true)
     */
    private $estado;

    /**
     * @var \Registronetbook\ControlBundle\Entity\Maquina
     *
     * @ORM\ManyToOne(targetEntity="Registronetbook\ControlBundle\Entity\Maquina")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="maquina_idmaquina", referencedColumnName="idmaquina")
     * })
     */
    private $maquinamaquina;



    /**
     * Get idmovimiento
     *
     * @return integer 
     */
    public function getIdmovimiento()
    {
        return $this->idmovimiento;
    }

    /**
     * Set diagnostico
     *
     * @param string $diagnostico
     * @return Movimiento
     */
    public function setDiagnostico($diagnostico)
    {
        $this->diagnostico = $diagnostico;

        return $this;
    }

    /**
     * Get diagnostico
     *
     * @return string 
     */
    public function getDiagnostico()
    {
        return $this->diagnostico;
    }

    /**
     * Set fechaEntrada
     *
     * @param \DateTime $fechaEntrada
     * @return Movimiento
     */
    public function setFechaEntrada($fechaEntrada)
    {
        $this->fechaEntrada = $fechaEntrada;

        return $this;
    }

    /**
     * Get fechaEntrada
     *
     * @return \DateTime 
     */
    public function getFechaEntrada()
    {
        return $this->fechaEntrada;
    }

    /**
     * Set fechaSalida
     *
     * @param \DateTime $fechaSalida
     * @return Movimiento
     */
    public function setFechaSalida($fechaSalida)
    {
        $this->fechaSalida = $fechaSalida;

        return $this;
    }

    /**
     * Get fechaSalida
     *
     * @return \DateTime 
     */
    public function getFechaSalida()
    {
        return $this->fechaSalida;
    }

    /**
     * Set fechaEnvio
     *
     * @param \DateTime $fechaEnvio
     * @return Movimiento
     */
    public function setFechaEnvio($fechaEnvio)
    {
        $this->fechaEnvio = $fechaEnvio;

        return $this;
    }

    /**
     * Get fechaEnvio
     *
     * @return \DateTime 
     */
    public function getFechaEnvio()
    {
        return $this->fechaEnvio;
    }

    /**
     * Set fechaRecivo
     *
     * @param \DateTime $fechaRecivo
     * @return Movimiento
     */
    public function setFechaRecivo($fechaRecivo)
    {
        $this->fechaRecivo = $fechaRecivo;

        return $this;
    }

    /**
     * Get fechaRecivo
     *
     * @return \DateTime 
     */
    public function getFechaRecivo()
    {
        return $this->fechaRecivo;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Movimiento
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set maquinamaquina
     *
     * @param \Registronetbook\ControlBundle\Entity\Maquina $maquinamaquina
     * @return Movimiento
     */
    public function setMaquinamaquina(\Registronetbook\ControlBundle\Entity\Maquina $maquinamaquina = null)
    {
        $this->maquinamaquina = $maquinamaquina;

        return $this;
    }

    /**
     * Get maquinamaquina
     *
     * @return \Registronetbook\ControlBundle\Entity\Maquina 
     */
    public function getMaquinamaquina()
    {
        return $this->maquinamaquina;
    }
}
