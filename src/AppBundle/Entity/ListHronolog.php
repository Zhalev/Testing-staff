<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListHronolog
 *
 * @ORM\Table(name="List_Hronolog")
 * @ORM\Entity
 */
class ListHronolog
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
     * @ORM\Column(name="nNumber", type="integer", nullable=true)
     */
    private $nnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="cText", type="string", length=100, nullable=true)
     */
    private $ctext;


}

