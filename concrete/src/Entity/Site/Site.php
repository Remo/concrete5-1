<?php
namespace Concrete\Core\Entity\Site;

use Concrete\Core\Application\Application;
use Concrete\Core\Site\Config\Liaison;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Sites")
 */
class Site
{

    public function __construct($appConfigRepository)
    {
        $this->siteConfig = new Liaison($appConfigRepository, $this);
    }

    protected $siteConfig;

    /**
     * @ORM\Id @ORM\Column(type="integer", options={"unsigned":true})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $siteID;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    protected $siteHandle;

    /**
     * @return mixed
     */
    public function getSiteID()
    {
        return $this->siteID;
    }

    /**
     * @return mixed
     */
    public function getSiteHandle()
    {
        return $this->siteHandle;
    }

    /**
     * @param mixed $siteHandle
     */
    public function setSiteHandle($siteHandle)
    {
        $this->siteHandle = $siteHandle;
    }

    /**
     * @return mixed
     */
    public function isDefault()
    {
        return $this->siteIsDefault;
    }

    /**
     * @param mixed $siteIsDefault
     */
    public function setIsDefault($siteIsDefault)
    {
        $this->siteIsDefault = $siteIsDefault;
    }

    /**
     * @return mixed
     */
    public function getSiteName()
    {
        return $this->getConfigRepository()->get('name');
    }

    public function getConfigRepository()
    {
        return $this->siteConfig;
    }



}
