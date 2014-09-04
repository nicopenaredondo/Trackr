<?php namespace Tests\Unit;

use TestCase;

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testApplicationMustShowHelloWorld()
	{
		$expected = 'Hello World';
		$this->assertEquals('Hello World', $expected);
	}

}
