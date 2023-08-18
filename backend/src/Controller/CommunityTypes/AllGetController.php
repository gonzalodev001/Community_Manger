<?php

declare(strict_types=1);

namespace App\Controller\CommunityTypes;

use App\CommunityType\Application\CommunityTypeResponse;
use App\CommunityType\Application\SearchAll\SearchAllCommunityTypesQuery;
use App\Shared\Domain\Bus\Query\QueryBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use function Lambdish\Phunctional\map;

class AllGetController extends AbstractController
{
    public function __construct(private QueryBus $queryBus)
    {
    }

    #[Route('/community_types', name: '_all_community_types', methods: ['GET'])]
    public function __invoke(Request $request): JsonResponse
    {
        $response = $this->queryBus->ask(
            new SearchAllCommunityTypesQuery()
        );

        return new JsonResponse(
            map(
                fn(CommunityTypeResponse $communityTypeResponse) => [
                    'id' => $communityTypeResponse->id(),
                    'name' => $communityTypeResponse->name()
                ],
                $response->communityTypes()
            ),
            200
        );
    }
}