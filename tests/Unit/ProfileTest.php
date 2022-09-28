<?php

namespace Jclavo\Profiles\Tests\Unit;

use Jclavo\Profiles\Models\Profile;
use Jclavo\Profiles\Tests\TestCase;
// use PHPUnit\Framework\TestCase;

class ProfileTest extends TestCase 
{

    /**
     * test_activate_profile
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