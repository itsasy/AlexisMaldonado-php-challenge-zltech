<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Mobile;
use App\Providers\ProviderTest;
use App\Providers\OtherProviderTest;

class MobileTest extends TestCase
{
    /** @test */
    public function it_returns_null_when_name_empty()
    {
        $mobile = new Mobile(new ProviderTest());

        $this->assertNull($mobile->makeCallByName(''));
    }

    /** @test */
    public function it_return_valid_when_name_filled()
    {
        $mobile = new Mobile(new ProviderTest());

        $this->assertNotNull($mobile->makeCallByName('Alexis'));
    }

    /** @test */
    public function it_return_name_if_not_found()
    {
        $mobile = new Mobile(new ProviderTest());

        $call = $mobile->makeCallByName('Liam');
        $this->assertFalse($call->IsValidCall());
    }

    /** @test */
    public function it_return_success_sms()
    {
        $mobile = new Mobile(new ProviderTest());
        $sms = $mobile->makeSMS('Alexis', '933530122');
        $this->assertTrue($sms->send());
    }

    /** @test */
    public function it_return_contact_not_found_sms()
    {
        $mobile = new Mobile(new ProviderTest());
        $this->assertNull($mobile->makeSMS('Liam', '918363388'));
    }

    /** @test */
    public function it_return_true_use_other_provider()
    {
        $mobile = new Mobile(new ProviderTest(), new OtherProviderTest());
        $mobile->statusProviderPrimary(false);
        $this->assertNotNull($mobile->makeCallByName('Adrian'));
    }
}
