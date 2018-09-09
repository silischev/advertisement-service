<?php

namespace Tests\Unit\User;

use App\Core\Advertisement\Requests\StoreRequest;
use App\Core\Advertisement\Services\AdvertisementService;
use App\Core\Category\Models\Category;
use App\Core\User\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AdvertisementTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var AdvertisementService
     */
    public $advertisementService;

    protected function setUp()
    {
        parent::setUp();

        $this->advertisementService = new AdvertisementService();
    }

    public function testAdvertisementSuccessCreate()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();

        $advertisementData = [
            'title' => 'test_title',
            'price' => 123,
            'description' => 'test_description',
            'category_id' => $category->id,
            'address' => 'test_address',
            'phone' => '1234567',
        ];

        $request = new StoreRequest();
        $request->initialize([], $advertisementData);

        $advertisement = $this->advertisementService->create($user->id, $request);

        $this->assertNotEmpty($advertisement);

        $this->assertEquals($advertisementData['title'], $advertisement->title);
        $this->assertEquals($user->id, $advertisement->user_id);
        $this->assertEquals($advertisementData['category_id'], $advertisement->category_id);
    }
}
