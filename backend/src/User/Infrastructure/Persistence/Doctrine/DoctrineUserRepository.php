<?php

namespace App\User\Infrastructure\Persistence\Doctrine;

use App\User\Domain\Aggregate\User;
use App\User\Domain\Repository\UserRepository;
use App\User\Infrastructure\Framework\Entity\SymfonyUser;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\User\Domain\ValueObject\Password;
use App\Shared\Domain\ValueObject\Uuid;
use App\Shared\Domain\ValueObject\Email;

class DoctrineUserRepository implements UserRepository
{

    public function __construct(private EntityManagerInterface $entityManager, private UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function save(User $user): string
    {
        $symfonyUser = new SymfonyUser(
            $user->id()->value(),
            $user->email()->email(),
            $user->password()->password(),
            $user->roles(),
            $user->getCreatedAt(),
            $user->getUpdatedAt(),
            $user->communityId()->value()
        );
        $hashedPassword = $this->passwordHasher->hashPassword(
            $symfonyUser,
            $user->password()->password()
        );

        $symfonyUser->setHashedPassword($hashedPassword);
        $this->entityManager->persist($symfonyUser);
        $this->entityManager->flush();

        return $symfonyUser->getId();
    }

    public function findUser(string $userName, string $password): ?User
    {
        $symfonyUser = $this->entityManager
            ->getRepository(SymfonyUser::class)
            ->findOneBy(['email' => $userName]);
        
        if(!$symfonyUser || !$this->passwordHasher->isPasswordValid($symfonyUser, $password)) {
            return null;
        }
        
        return User::create(
            new Uuid($symfonyUser->getId()), 
            new Email($symfonyUser->getEmail()), 
            new Password($symfonyUser->getHashedPassword()), 
            $symfonyUser->getRoles(), 
            new Uuid($symfonyUser->getCommunityId())
        );
    }
}