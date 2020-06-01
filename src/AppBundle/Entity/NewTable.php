<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NewTable
 *
 * @ORM\Table(name="New_table")
 * @ORM\Entity
 */
class NewTable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nKey", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nkey;

    /**
     * @var string
     *
     * @ORM\Column(name="cAction", type="string", length=50, nullable=true)
     */
    private $caction;

    /**
     * @var integer
     *
     * @ORM\Column(name="nParentKey", type="integer", nullable=true)
     */
    private $nparentkey;


}

