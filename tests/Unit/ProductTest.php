<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\User;

class ProductTest extends TestCase
{
    // use WithoutMiddleware;

    // test create product without authentication token
    // public function testCreateProductWithMiddleware()
    // {
    //     $data = [
    //         'name' => 'New Product',
    //         'details' => 'This is a product',
    //         'test_method' => 'In-House',
    //         'accredit_status' => 'Not accreditated',
    //         'price' => 20
    //     ];
    //     $response = $this->json('POST', '/adminproducts/add', $data);
    //     $response->assertStatus(401);
    //     $response->assertJson(['message' => "Unauthenticated."]);
    // }

    // // test create product with a fake user
    // public function testCreateProduct()
    // {
    //     $this->withoutMiddleware();

    //     $data = [
    //         'name' => 'New Product',
    //         'details' => 'This is a product',
    //         'test_method' => 'In-House',
    //         'accredit_status' => 'Not accreditated',
    //         'price' => 20
    //     ];
    //     $user = factory(User::class)->create();
    //     $response = $this->actingAs($user, 'api')->json('POST', '/adminproducts/add', $data);
    //     $response->assertStatus(302);
    //     $response->assertJson(['status' => true]);
    //     $response->assertJson(["message" => "Product created!"]);
    //     $response->assertJson(['data' => $data]);
    // }

    // // test getting all products
    // public function testGettingAllProducts()
    // {
    //     $this->withoutMiddleware();

    //     $response = $this->json('GET', '/adminproducts');
    //     $response->assertStatus(200);
    //     $response->assertJsonStructure([
    //         [
    //             'id',
    //             'name',
    //             'details',
    //             'test_method',
    //             'accredit_status',
    //             'price',
    //             'created_at',
    //             'updated_at'
    //         ]
    //     ]);
    // }

    // // test update a product
    // public function testUpdateProduct()
    // {
    //     $this->withoutMiddleware();

    //     $response = $this->json('GET', '/adminproducts');
    //     $response->assertStatus(200);

    //     $product = $response->getData()[0];

    //     $user = factory(\App\User::class)->create();
    //     $update = $this->actingAs($user)->json('PATCH', '/adminproducts/'.$product->id, ['name' => 'Changed for test!']);
    //     $update->assertStatus(200);
    //     $update->assertJson(['message' => "Product updated..."]);
    // }

    // // test delete product
    // public function testDeleteProduct()
    // {
    //     $this->withoutMiddleware();

    //     $response = $this->json('GET', '/adminproducts');
    //     $response->assertStatus(200); 

    //     $product = $response->getData()[0];

    //     $user = factory(\App\User::class)->create();
    //     $delete = $this->actingAs($user, 'api')->json('GET', '/adminproducts/delete/'.$product->id);
    //     $delete->assertStatus(200);
    //     $delete->assertJson(['message' => "Product deleted..."]);
    // }
}
