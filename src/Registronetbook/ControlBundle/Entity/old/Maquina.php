<?php

namespace Registronetbook\ControlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Maquina
 *
 * @ORM\Table(name="maquina", indexes={@ORM\Index(name="fk_maquina_benefeciado1_idx", columns={"benefeciado_idbenefeciado"})})
 * @ORM\Entity
 */
class Maquina
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idmaquina", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmaquina;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=45, nullable=true)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=45, nullable=true)
     */
    private $marca;

    /**
     * @var \Registronetbook\ControlBundle\Entity\Benefeciado
     *
     * @ORM\ManyToOne(targetEntity="Registronetbook\ControlBundle\Entity\Benefeciado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="benefeciado_idbenefeciado", referencedColumnName="idbenefeciado")
     * })
     */
    private $benefeciadobenefeciado;



    /**
     * Get idmaquina
     *
     * @return integer 
     */
    public function getIdmaquina()
    {
        return $this->idmaquina;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return Maquina
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set marca
     *
     * @param string $marca
     * @return Maquina
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string 
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set benefeciadobenefeciado
     *
     * @param \Registronetbook\ControlBundle\Entity\Benefeciado $benefeciadobenefeciado
     * @return Maquina
     */
    public function setBenefeciadobenefeciado(\Registronetbook\ControlBundle\Entity\Benefeciado $benefeciadobenefeciado = null)
    {
        $this->benefeciadobenefeciado = $benefeciadobenefeciado;

        return $this;
    }

    /**
     * Get benefeciadobenefeciado
     *
     * @return \Registronetbook\ControlBundle\Entity\Benefeciado 
     */
    public function getBenefeciadobenefeciado()
    {
        return $this->benefeciadobenefeciado;
    }
}
