<?php

declare(strict_types=1);

namespace App\Controller\Communities;

use App\Community\Application\Search\SearchCommunityByCifQuery;
use App\CommunityType\Application\CommunityResponse;
use App\Shared\Domain\Bus\Query\QueryBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use function Lambdish\Phunctional\map;

class CommunityByCifGetController extends AbstractController
{
    public function __construct(private QueryBus $queryBus)
    {
        
    }

    #[Route('/communities/cif', name: '_community_by_cif', methods: ['GET'])]
    public function __invoke(Request $request): JsonResponse
    {
        $data = $request->toArray();
        
        $response = $this->queryBus->ask(
            new SearchCommunityByCifQuery($data["cif"])
        );
        
        return new JsonResponse(
            map(
                fn(CommunityResponse $communityResponse) => [
                    'id' => $communityResponse->id(),
                    'address' => $communityResponse->address(),
                    'municipality' => $communityResponse->municipality(),
                    'communityTypeId' => $communityResponse->communityTypeId(),
                    'associationId' => $communityResponse->associationId(),
                    'cif' => $communityResponse->cif()
                ],
                $response->communities()
            ),
            200
        );
    }
}