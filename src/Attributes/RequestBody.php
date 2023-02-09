<?php declare(strict_types=1);

/**
 * @license Apache 2.0
 */

namespace OpenApi\Attributes;

use OpenApi\Generator;
use OpenApi\Annotations as OA;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::TARGET_PROPERTY | \Attribute::TARGET_PARAMETER)]
class RequestBody extends OA\RequestBody
{
    /**
     * @param array<MediaType>|JsonContent|XmlContent|Attachable|null $content
     * @param array<string,mixed>|null                                $x
     * @param Attachable[]|null                                       $attachables
     */
    public function __construct(
        string|object|null $ref = null,
        ?string $request = null,
        ?string $description = null,
        ?bool $required = null,
        array|JsonContent|XmlContent|Attachable|MediaType|null $content = null,
        // annotation
        ?array $x = null,
        ?array $attachables = null
    ) {
        parent::__construct([
            'ref' => $ref ?? Generator::UNDEFINED,
            'request' => $request ?? Generator::UNDEFINED,
            'description' => $description ?? Generator::UNDEFINED,
            'required' => $required ?? Generator::UNDEFINED,
            'x' => $x ?? Generator::UNDEFINED,
            'value' => $this->combine($content, $attachables),
        ]);
    }
}
