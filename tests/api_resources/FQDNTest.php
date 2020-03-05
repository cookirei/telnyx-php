<?php

namespace Telnyx;

class FQDNTest extends TestCase
{
    const TEST_RESOURCE_ID = '123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v2/fqdns'
        );
        $resources = FQDN::all();
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        $this->assertInstanceOf(\Telnyx\FQDN::class, $resources[0]);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v2/fqdns'
        );
        $resource = FQDN::create(["fqdn" => "example.com"]);
        $this->assertInstanceOf(\Telnyx\FQDN::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = FQDN::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v2/fqdns/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource->delete();
        $this->assertInstanceOf(\Telnyx\FQDN::class, $resource);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v2/fqdns/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = FQDN::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Telnyx\FQDN::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'patch',
            '/v2/fqdns/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = FQDN::update(self::TEST_RESOURCE_ID, [
            "fqdn" => "example.com"
        ]);
        $this->assertInstanceOf(\Telnyx\FQDN::class, $resource);
    }
    
}
