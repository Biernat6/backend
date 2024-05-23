<?php
namespace App\GraphQL\Queries;

use App\Models\Product;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ProductsQuery extends Query
{
    protected $attributes = [
        'name' => 'products',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Product'));
    }

    public function args(): array
    {
        return [
            'min_price' => ['name' => 'min_price', 'type' => Type::float()],
            'max_price' => ['name' => 'max_price', 'type' => Type::float()],
        ];
    }

    public function resolve($root, $args)
    {
        $query = Product::query();
        if (isset($args['min_price'])) {
            $query->where('unit_price', '>=', $args['min_price']);
        }
        if (isset($args['max_price'])) {
            $query->where('unit_price', '<=', $args['max_price']);
        }
        return $query->get();
    }
}
?>