<?php 
namespace App\GraphQL\Types;

use App\Models\Product;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProductType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Product',
        'description' => 'A product',
        'model' => Product::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the product',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of the product',
            ],
            'unit_price' => [
                'type' => Type::float(),
                'description' => 'The price of the product',
            ],
        ];
    }
}
