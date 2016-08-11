<?php namespace InmuebleBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;

class InmueblesByOwner
{
    private $repository;

    /**
     * InmueblesByAuthor constructor.
     * @param $om
     */
    public function __construct(ObjectManager $om)
    {
        $this->repository = $om->getRepository('InmuebleBundle:Inmueble');
    }

    public function getInmuebleByOwnerId($authorId)
    {
        return $this->repository->findByUser($authorId);
    }
}

