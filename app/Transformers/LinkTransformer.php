<?php

namespace App\Transformers;

use App\Models\Link;
use App\Models\Location;
use League\Fractal\TransformerAbstract;

class LinkTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Link $link)
    {
        return [
            'name' => $link->name,
            'desc' => $link->desc,
            'link' => $link->link,
        ];
    }
}

