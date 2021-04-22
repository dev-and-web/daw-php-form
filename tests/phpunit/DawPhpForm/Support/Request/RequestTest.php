<?php

namespace Tests\DawPhpForm\Support\Request;

use PHPUnit\Framework\TestCase;
use DawPhpForm\Support\Request\Request;

class RequestTest extends TestCase
{
    public function testGetPostIsArray()
    {
        $request = new Request();

        $this->assertTrue(is_object($request->getPost()));
    }

    public function testGetServerIsArray()
    {
        $request = new Request();

        $this->assertTrue(is_object($request->getServer()));
    }

    public function testGetPost()
    {
        $_POST['title'] = 'Titre';

        $request = new Request();

        $this->assertTrue($request->getPost()->has('title'));

        $this->assertFalse($request->getPost()->has('other_title'));

        $this->assertTrue($request->getPost()->get('title') === 'Titre');

        $_POST = [];
    }

    /**
     * (permet aussi de vérifier $_SERVER au passage)
     */
    public function testGetMethod()
    {
        $request = new Request();

        $this->assertTrue(is_string($request->getMethod()));
    }

    /**
     * (permet aussi de vérifier $_SERVER au passage)
     */
    public function testIsMethod()
    {
        $request = new Request();

        $this->assertFalse($request->isMethod('POST'));
    }
}
