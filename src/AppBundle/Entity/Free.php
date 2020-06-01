<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Free
 *
 * @ORM\Table(name="FREE")
 * @ORM\Entity
 */
class Free
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
     * @ORM\Column(name="nKey", type="integer", nullable=true)
     */
    private $nkey;

    /**
     * @var string
     *
     * @ORM\Column(name="teXet", type="text", length=16, nullable=true)
     */
    private $texet;


}

