<?php

namespace Tests\Unit\Model;

use App\Model\Favorite;
use App\Model\User;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class FavoriteTest extends TestCase
{
    protected $favorite;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->favorite = Favorite::firstOrCreate(['user_id' => 1], [
            'user_id' => 1,
            'product_id' => 1,
        ]);
    }

    public function test_contains_valid_fillable_properties()
    {
        $this->assertEquals([
            'user_id',
            'product_id',
        ], $this->favorite->getFillable());
    }

    public function test_favorite_belong_to_user()
    {
        $favorite = $this->favorite;

        $this->assertInstanceOf(User::class, $favorite->user);
    }

    public function test_favorite_belong_to_many_product()
    {
        $favorite = $this->favorite;

        $this->assertInstanceOf(Collection::class, $favorite->products);
    }
}
