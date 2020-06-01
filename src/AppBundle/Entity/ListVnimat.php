<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListVnimat
 *
 * @ORM\Table(name="List_Vnimat")
 * @ORM\Entity
 */
class ListVnimat
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
     * @ORM\Column(name="nSecOt", type="integer", nullable=true)
     */
    private $nsecot;

    /**
     * @var integer
     *
     * @ORM\Column(name="nSecDo", type="integer", nullable=true)
     */
    private $nsecdo;

    /**
     * @var integer
     *
     * @ORM\Column(name="nBall", type="integer", nullable=true)
     */
    private $nball;

    /**
     * @var string
     *
     * @ORM\Column(name="cMessageText", type="string", length=200, nullable=false)
     */
    private $cmessagetext;


}

