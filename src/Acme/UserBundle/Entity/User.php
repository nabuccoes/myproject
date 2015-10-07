<?php
// src/Acme/UserBundle/Entity/User.php
namespace Acme\UserBundle\Entity;

use Symfony\Component\Security\Core\User\sfBasicSecurityUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class User extends sfBasicSecurityUser
{
    public function addInmuebleToHistory(Inmueble $inmueble)
    {
        $ids = $this->getAttribute('inmueble_history', array());

        if (!in_array($inmueble->getId(), $ids))
        {
            array_unshift($ids, $inmueble->getId());

            $this->setAttribute('inmueble_history', array_slice($ids, 0, 3));
        }
    }
}

