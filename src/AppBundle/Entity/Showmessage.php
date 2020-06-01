<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Showmessage
 *
 * @ORM\Table(name="ShowMessage")
 * @ORM\Entity
 */
class Showmessage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nKeyID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nkeyid;

    /**
     * @var string
     *
     * @ORM\Column(name="cMessage", type="string", length=500, nullable=true)
     */
    private $cmessage;


}

