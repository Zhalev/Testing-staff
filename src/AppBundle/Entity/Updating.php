<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Updating
 *
 * @ORM\Table(name="UPDATING")
 * @ORM\Entity
 */
class Updating
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ver", type="string", length=100, nullable=true)
     */
    private $ver;

    /**
     * @var string
     *
     * @ORM\Column(name="Program", type="blob", nullable=true)
     */
    private $program;

    /**
     * @var string
     *
     * @ORM\Column(name="soft", type="blob", nullable=true)
     */
    private $soft;


}

