<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Peoplesay
 *
 * @ORM\Table(name="PeopleSay")
 * @ORM\Entity
 */
class Peoplesay
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nKeyMessage", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nkeymessage;

    /**
     * @var string
     *
     * @ORM\Column(name="Message", type="string", length=0, nullable=true)
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dDate", type="datetime", nullable=true)
     */
    private $ddate;

    /**
     * @var string
     *
     * @ORM\Column(name="auth", type="string", length=200, nullable=true)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="cName", type="string", length=100, nullable=true)
     */
    private $cname;


}

