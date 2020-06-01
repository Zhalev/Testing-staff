<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Serializable;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Users
 *
 * @ORM\Table(name="USERS")
 * @ORM\Entity
 */
class Users implements UserInterface, \Serializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nUserKey", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nuserkey;

    /**
     * @var string
     *
     * @ORM\Column(name="cUserName", type="string", length=80, nullable=true)
     */
    private $cusername;

    /**
     * @var string
     *
     * @ORM\Column(name="cIdentificator", type="string", length=50, nullable=true)
     */
    private $cidentificator;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\DictionaryStructure")
     * @ORM\JoinColumn(name="nUserTypeKey", referencedColumnName="nElementKey")
     */
    private $typeAccount;

    /**
     * @return int
     */
    public function getNuserkey()
    {
        return $this->nuserkey;
    }

    /**
     * @param int $nuserkey
     */
    public function setNuserkey($nuserkey)
    {
        $this->nuserkey = $nuserkey;
    }

    /**
     * @return string
     */
    public function getCusername()
    {
        return $this->cusername;
    }

    /**
     * @param string $cusername
     */
    public function setCusername($cusername)
    {
        $this->cusername = $cusername;
    }

    /**
     * @return string
     */
    public function getCidentificator()
    {
        return $this->cidentificator;
    }

    /**
     * @param string $cidentificator
     */
    public function setCidentificator($cidentificator)
    {
        $this->cidentificator = $cidentificator;
    }

    /**
     * @return string
     */
    public function getCpassword()
    {
        return $this->cpassword;
    }

    /**
     * @param string $cpassword
     */
    public function setCpassword($cpassword)
    {
        $this->cpassword = $cpassword;
    }

    /**
     * @return int
     */
    public function getNusertypekey()
    {
        return $this->nusertypekey;
    }

    /**
     * @param int $nusertypekey
     */
    public function setNusertypekey($nusertypekey)
    {
        $this->nusertypekey = $nusertypekey;
    }

    /**
     * @return int
     */
    public function getNorganizationkey()
    {
        return $this->norganizationkey;
    }

    /**
     * @param int $norganizationkey
     */
    public function setNorganizationkey($norganizationkey)
    {
        $this->norganizationkey = $norganizationkey;
    }

    /**
     * @return \DateTime
     */
    public function getDdatecome()
    {
        return $this->ddatecome;
    }

    /**
     * @param \DateTime $ddatecome
     */
    public function setDdatecome($ddatecome)
    {
        $this->ddatecome = $ddatecome;
    }

    /**
     * @return \DateTime
     */
    public function getDdateleave()
    {
        return $this->ddateleave;
    }

    /**
     * @param \DateTime $ddateleave
     */
    public function setDdateleave($ddateleave)
    {
        $this->ddateleave = $ddateleave;
    }

    /**
     * @return string
     */
    public function getCleavereason()
    {
        return $this->cleavereason;
    }

    /**
     * @param string $cleavereason
     */
    public function setCleavereason($cleavereason)
    {
        $this->cleavereason = $cleavereason;
    }

    /**
     * @return int
     */
    public function getNobrazovanie()
    {
        return $this->nobrazovanie;
    }

    /**
     * @param int $nobrazovanie
     */
    public function setNobrazovanie($nobrazovanie)
    {
        $this->nobrazovanie = $nobrazovanie;
    }

    /**
     * @return int
     */
    public function getNdolzhnost()
    {
        return $this->ndolzhnost;
    }

    /**
     * @param int $ndolzhnost
     */
    public function setNdolzhnost($ndolzhnost)
    {
        $this->ndolzhnost = $ndolzhnost;
    }

    /**
     * @return int
     */
    public function getNpodrazdelenie()
    {
        return $this->npodrazdelenie;
    }

    /**
     * @param int $npodrazdelenie
     */
    public function setNpodrazdelenie($npodrazdelenie)
    {
        $this->npodrazdelenie = $npodrazdelenie;
    }

    /**
     * @return string
     */
    public function getCuserfirstname()
    {
        return $this->cuserfirstname;
    }

    /**
     * @param string $cuserfirstname
     */
    public function setCuserfirstname($cuserfirstname)
    {
        $this->cuserfirstname = $cuserfirstname;
    }

    /**
     * @return string
     */
    public function getCusersurname()
    {
        return $this->cusersurname;
    }

    /**
     * @param string $cusersurname
     */
    public function setCusersurname($cusersurname)
    {
        $this->cusersurname = $cusersurname;
    }

    /**
     * @return int
     */
    public function getNuseraccesstype()
    {
        return $this->nuseraccesstype;
    }

    /**
     * @param int $nuseraccesstype
     */
    public function setNuseraccesstype($nuseraccesstype)
    {
        $this->nuseraccesstype = $nuseraccesstype;
    }

    /**
     * @return string
     */
    public function getCuserfamilyname()
    {
        return $this->cuserfamilyname;
    }

    /**
     * @param string $cuserfamilyname
     */
    public function setCuserfamilyname($cuserfamilyname)
    {
        $this->cuserfamilyname = $cuserfamilyname;
    }

    /**
     * @return string
     */
    public function getCpasswordconfirm()
    {
        return $this->cpasswordconfirm;
    }

    /**
     * @param string $cpasswordconfirm
     */
    public function setCpasswordconfirm($cpasswordconfirm)
    {
        $this->cpasswordconfirm = $cpasswordconfirm;
    }

    /**
     * @return int
     */
    public function getNobjectkey()
    {
        return $this->nobjectkey;
    }

    /**
     * @param int $nobjectkey
     */
    public function setNobjectkey($nobjectkey)
    {
        $this->nobjectkey = $nobjectkey;
    }

    /**
     * @return \DateTime
     */
    public function getDbirthday()
    {
        return $this->dbirthday;
    }

    /**
     * @param \DateTime $dbirthday
     */
    public function setDbirthday($dbirthday)
    {
        $this->dbirthday = $dbirthday;
    }

    /**
     * @return string
     */
    public function getCplaceofbirth()
    {
        return $this->cplaceofbirth;
    }

    /**
     * @param string $cplaceofbirth
     */
    public function setCplaceofbirth($cplaceofbirth)
    {
        $this->cplaceofbirth = $cplaceofbirth;
    }

    /**
     * @return string
     */
    public function getCabidingplace()
    {
        return $this->cabidingplace;
    }

    /**
     * @param string $cabidingplace
     */
    public function setCabidingplace($cabidingplace)
    {
        $this->cabidingplace = $cabidingplace;
    }

    /**
     * @return string
     */
    public function getCtelnum()
    {
        return $this->ctelnum;
    }

    /**
     * @param string $ctelnum
     */
    public function setCtelnum($ctelnum)
    {
        $this->ctelnum = $ctelnum;
    }

    /**
     * @return string
     */
    public function getCtabel()
    {
        return $this->ctabel;
    }

    /**
     * @param string $ctabel
     */
    public function setCtabel($ctabel)
    {
        $this->ctabel = $ctabel;
    }

    /**
     * @return int
     */
    public function getNtypedolzhnost()
    {
        return $this->ntypedolzhnost;
    }

    /**
     * @param int $ntypedolzhnost
     */
    public function setNtypedolzhnost($ntypedolzhnost)
    {
        $this->ntypedolzhnost = $ntypedolzhnost;
    }

    /**
     * @return int
     */
    public function getNtypepodrazdelenie()
    {
        return $this->ntypepodrazdelenie;
    }

    /**
     * @param int $ntypepodrazdelenie
     */
    public function setNtypepodrazdelenie($ntypepodrazdelenie)
    {
        $this->ntypepodrazdelenie = $ntypepodrazdelenie;
    }

    /**
     * @return int
     */
    public function getNtypetest()
    {
        return $this->ntypetest;
    }

    /**
     * @param int $ntypetest
     */
    public function setNtypetest($ntypetest)
    {
        $this->ntypetest = $ntypetest;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="cPassword", type="string", length=50, nullable=true)
     */
    private $cpassword;

    /**
     * @var integer
     *
     * @ORM\Column(name="nUserTypeKey", type="integer", nullable=true)
     */
    private $nusertypekey;

    /**
     * @var integer
     *
     * @ORM\Column(name="nOrganizationKey", type="integer", nullable=true)
     */
    private $norganizationkey;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dDateCome", type="datetime", nullable=true)
     */
    private $ddatecome;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dDateLeave", type="datetime", nullable=true)
     */
    private $ddateleave;

    /**
     * @var string
     *
     * @ORM\Column(name="cLeaveReason", type="string", length=50, nullable=true)
     */
    private $cleavereason;

    /**
     * @var integer
     *
     * @ORM\Column(name="nObrazovanie", type="integer", nullable=true)
     */
    private $nobrazovanie;

    /**
     * @var integer
     *
     * @ORM\Column(name="nDolzhnost", type="integer", nullable=true)
     */
    private $ndolzhnost;

    /**
     * @var integer
     *
     * @ORM\Column(name="nPodrazdelenie", type="integer", nullable=true)
     */
    private $npodrazdelenie;

    /**
     * @var string
     *
     * @ORM\Column(name="cUserFirstName", type="string", length=50, nullable=true)
     */
    private $cuserfirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="cUserSurName", type="string", length=50, nullable=true)
     */
    private $cusersurname;

    /**
     * @var integer
     *
     * @ORM\Column(name="nUserAccessType", type="integer", nullable=true)
     */
    private $nuseraccesstype;

    /**
     * @var string
     *
     * @ORM\Column(name="CUserFamilyName", type="string", length=50, nullable=true)
     */
    private $cuserfamilyname;

    /**
     * @var string
     *
     * @ORM\Column(name="cPasswordConfirm", type="string", length=50, nullable=true)
     */
    private $cpasswordconfirm;

    /**
     * @var integer
     *
     * @ORM\Column(name="nObjectKey", type="integer", nullable=true)
     */
    private $nobjectkey;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dBirthday", type="datetime", nullable=true)
     */
    private $dbirthday;

    /**
     * @var string
     *
     * @ORM\Column(name="cPlaceOfBirth", type="string", length=200, nullable=true)
     */
    private $cplaceofbirth;

    /**
     * @var string
     *
     * @ORM\Column(name="cAbidingPlace", type="string", length=200, nullable=true)
     */
    private $cabidingplace;

    /**
     * @var string
     *
     * @ORM\Column(name="cTelNum", type="string", length=100, nullable=true)
     */
    private $ctelnum;

    /**
     * @var string
     *
     * @ORM\Column(name="cTabel", type="string", length=80, nullable=true)
     */
    private $ctabel;

    /**
     * @var integer
     *
     * @ORM\Column(name="nTypeDolzhnost", type="integer", nullable=true)
     */
    private $ntypedolzhnost;

    /**
     * @var integer
     *
     * @ORM\Column(name="nTypePodrazdelenie", type="integer", nullable=true)
     */
    private $ntypepodrazdelenie;

    /**
     * @var integer
     *
     * @ORM\Column(name="nTypeTest", type="integer", nullable=true)
     */
    private $ntypetest;

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        switch ($this->nusertypekey ) {
            case 531:
                return array('ROLE_MODERATOR');
            case 533:
                return array('ROLE_ADMIN');
        }
        return array('ROLE_USER');
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return $this->cpassword;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->cidentificator;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize(array($this->nuserkey, $this->cidentificator, $this->cpassword, $this->cuserfirstname, $this->cusersurname, $this->cuserfamilyname));
    }

    /**
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        list($this->nuserkey, $this->cidentificator, $this->cpassword, $this->cuserfirstname, $this->cusersurname, $this->cuserfamilyname) = unserialize($serialized);
    }

    /**
     * @var DictionaryStructure
     * @ORM\ManyToOne(targetEntity="DictionaryStructure")
     * @ORM\JoinColumn(name="nOrganizationKey", referencedColumnName="nElementKey")
     */
    private $organization;

    /**
     * @return DictionaryStructure
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @param DictionaryStructure $organization
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
    }

    /**
     * @return mixed
     */
    public function getTypeAccount()
    {
        return $this->typeAccount;
    }

    /**
     * @param mixed $typeAccount
     */
    public function setTypeAccount($typeAccount)
    {
        $this->typeAccount = $typeAccount;
    }


}

