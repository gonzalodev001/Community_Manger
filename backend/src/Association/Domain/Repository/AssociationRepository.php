<?php


namespace App\Association\Domain\Repository;


use App\Association\Domain\Aggregate\Association;

interface AssociationRepository
{

    public function save(Association $association): void;
}