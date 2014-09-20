<?php
class TestCase extends Illuminate\Foundation\Testing\TestCase
{
	/**
	 * Prepare for testing
	 */
	public function setUp()
	{
    parent::setUp();
		$this->prepareForTests();
	}

	/**
	 * Creates the application.
	 *
	 * @return \Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;
		$testEnvironment = 'local';
		return require __DIR__.'/../../bootstrap/start.php';
	}

	private function prepareForTests()
	{
		Session::start();
	}

}
