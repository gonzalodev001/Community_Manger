<?php


namespace App\Association\Application;


use App\Association\Domain\Aggregate\Association;
use App\Association\Domain\Repository\AssociationRepository;

class AssociationRegister
{

    public function __construct(private AssociationRepository $repository)
    {
    }

    public function __invoke(string $id, string $postalCode, string $description): void
    {
        $association = Association::registerAssociation($id, $postalCode, $description);

        $this->repository->save($association);
    }
}