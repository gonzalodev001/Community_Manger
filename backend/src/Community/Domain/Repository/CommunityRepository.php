<?php


namespace App\Community\Domain\Repository;


use App\Community\Domain\Aggregate\Community;

interface CommunityRepository
{
    public function save(Community $community): void;
    public function findByCif(string $cif): array;
}