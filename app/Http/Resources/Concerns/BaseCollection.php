<?php

namespace App\Http\Resources\Concerns;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BaseCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
//            'data' => $this->collection,
//            'pagination' => [
//                'total' => $this->total(),
//                'count' => $this->count(),
//                'per_page' => $this->perPage(),
//                'current_page' => $this->currentPage(),
//                'total_pages' => $this->lastPage()
            //],
        ];
    }

    public function withResponse($request, $response)
    {
        $jsonResponse = json_decode($response->getContent(), true);

        unset($jsonResponse['links'], $jsonResponse['meta']);

        $response->setContent(json_encode($jsonResponse));
    }

}
