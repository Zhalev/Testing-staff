<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListImage
 *
 * @ORM\Table(name="List_Image")
 * @ORM\Entity
 */
class ListImage
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
     * @ORM\Column(name="Picture", type="blob", nullable=true)
     */
    private $picture;


}

