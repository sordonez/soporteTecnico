<?php

namespace Registronetbook\UserBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

use Registronetbook\UserBundle\Entity\AppUser;

class Registration
{
    /**
     * @Assert\Type(type="Registronetbook\UserBundle\Entity\AppUser")
     * @Assert\Valid()
     */
    protected $user;

    /**
     * @Assert\NotBlank()
     * @Assert\True()
     */
    protected $termsAccepted;

    public function setUser(AppUser $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getTermsAccepted()
    {
        return $this->termsAccepted;
    }

    public function setTermsAccepted($termsAccepted)
    {
        $this->termsAccepted = (Boolean) $termsAccepted;
    }
}