<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Optionstest
 *
 * @ORM\Table(name="OptionsTest")
 * @ORM\Entity
 */
class Optionstest
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
     * @var integer
     *
     * @ORM\Column(name="nKeyID", type="integer", nullable=true)
     */
    private $nkeyid;

    /**
     * @var integer
     *
     * @ORM\Column(name="nKeyTests", type="integer", nullable=true)
     */
    private $nkeytests;

    /**
     * @var integer
     *
     * @ORM\Column(name="nKeyMessage", type="integer", nullable=true)
     */
    private $nkeymessage;

    /**
     * @var integer
     *
     * @ORM\Column(name="nPoradokVoprosov", type="integer", nullable=true)
     */
    private $nporadokvoprosov;

    /**
     * @var integer
     *
     * @ORM\Column(name="nPoradokVariantov", type="integer", nullable=true)
     */
    private $nporadokvariantov;


}

