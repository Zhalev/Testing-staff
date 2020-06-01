<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListAssociations
 *
 * @ORM\Table(name="List_Associations")
 * @ORM\Entity
 */
class ListAssociations
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
     * @ORM\Column(name="nNumberID", type="integer", nullable=true)
     */
    private $nnumberid;

    /**
     * @var integer
     *
     * @ORM\Column(name="nGroupAsso", type="integer", nullable=true)
     */
    private $ngroupasso;

    /**
     * @var string
     *
     * @ORM\Column(name="cVar1", type="string", length=500, nullable=true)
     */
    private $cvar1;

    /**
     * @var string
     *
     * @ORM\Column(name="cVar2", type="string", length=500, nullable=true)
     */
    private $cvar2;

    /**
     * @var integer
     *
     * @ORM\Column(name="nBallYes", type="integer", nullable=true)
     */
    private $nballyes;

    /**
     * @var integer
     *
     * @ORM\Column(name="nBallNo", type="integer", nullable=true)
     */
    private $nballno;

    /**
     * @var integer
     *
     * @ORM\Column(name="nKeyScale", type="integer", nullable=true)
     */
    private $nkeyscale;

    /**
     * @var string
     *
     * @ORM\Column(name="cOpisText", type="string", length=500, nullable=true)
     */
    private $copistext;


}

