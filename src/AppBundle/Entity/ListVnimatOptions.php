<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListVnimatOptions
 *
 * @ORM\Table(name="List_Vnimat_Options")
 * @ORM\Entity
 */
class ListVnimatOptions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nNumberID", type="integer", nullable=true)
     */
    private $nnumberid;

    /**
     * @var string
     *
     * @ORM\Column(name="cSize", type="string", length=20, nullable=true)
     */
    private $csize;

    /**
     * @var string
     *
     * @ORM\Column(name="cColor", type="string", length=40, nullable=true)
     */
    private $ccolor;

    /**
     * @var integer
     *
     * @ORM\Column(name="nScaleKey", type="integer", nullable=true)
     */
    private $nscalekey;

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
     * @ORM\Column(name="cTextOpis", type="string", length=200, nullable=true)
     */
    private $ctextopis;


}

