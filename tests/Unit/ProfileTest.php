<?php

namespace Jclavo\Profiles\Tests\Unit;

use Jclavo\Profiles\Models\Profile;
use Jclavo\Profiles\Tests\TestCase;
// use PHPUnit\Framework\TestCase;

class ProfileTest extends TestCase 
{
    /**
     * test_read_profiles
     *
     * @return void
     */
    public function test_read_profiles()
    {
        $records = 10;
        Profile::factory($records)->create();
        $profiles = Profile::all();

        $this->assertEquals($records, $profiles->count());
    }

    /**
     * test_create_profile
     *
     * @return void
     */
    public function test_create_profile()
    {
        $profile = Profile::factory()->create();

        $this->assertNotNull($profile);
        
        $this->assertEquals(1, Profile::count());
    }

    /**
     * test_update_profile
     *
     * @return void
     */
    public function test_update_profile()
    {
        $profile = Profile::factory()->create();
        $profileNew = Profile::factory()->make();

        Profile::updateOrCreate(
            [
                'id' => $profile->id
            ], [
                'name' => $profileNew->name,
                'description' => $profileNew->description,
                'activated' => $profileNew->activated,
                'fixed' => $profileNew->fixed
            ]
        );

        $this->assertDatabaseHas('profiles', [
            'id' => $profile->id,
            'name' => $profileNew->name,
            'description' => $profileNew->description,
            'activated' => $profileNew->activated,
            'fixed' => $profileNew->fixed
        ]);
    }

    /**
     * test_delete_profile
     *
     * @return void
     */
    public function test_delete_profile()
    {
        $profile = Profile::factory()->create();

        $profile->delete();
        
        $this->assertEquals(0, Profile::count());
    }

    /**
     * test_activate_profile
     *
     * @return void
     */
    public function test_activate_profile()
    {
        $profile = Profile::factory()->create(['activated' => false]);

        $this->assertDatabaseHas('profiles', [
            'id' => $profile->id,
            'activated' => false
        ]);

        $profile->changeActivatedStatus(true);

        $this->assertDatabaseHas('profiles', [
            'id' => $profile->id,
            'activated' => true
        ]);
    }
}