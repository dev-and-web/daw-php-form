<?php

namespace Tests\DawPhpForm\Support\Security;

use PHPUnit\Framework\TestCase;
use DawPhpForm\Support\Security\Security;

class SecurityTest extends TestCase
{
    private $security;

    public function setUp()
    {
       $this->security = new Security();
    }

    public function testE()
    {
        $this->assertTrue(is_string($this->security->e('Test')));
    }
}
