<?php


namespace App\Person\Application;


use App\Person\Domain\Aggregate\Person;
use App\Person\Domain\Dto\DtoPerson;
use App\Person\Domain\Repository\PersonRepository;
use App\Shared\Domain\ValueObject\Uuid;

class RegisterPersonUseCase
{

    public function __construct(private PersonRepository $repository)
    {
    }

    public function __invoke(string $id, string $firstName, string $lastName, string $document, string $phone, string $userId): void
    {
        //$id = new Uuid($id);
        //$userId = new Uuid($userId);
        $person = Person::registerPerson($id, $firstName, $lastName, $document, $phone, $userId);

        //$dtoPeron = new DtoPerson();
        $this->repository->save($person);
    }
}