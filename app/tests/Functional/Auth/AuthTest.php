<?php namespace Tests\Functional\Auth;

use TestCase;

class AuthTest extends TestCase
{

  public function testShouldShowLoginPage()
  {
    $this->client->request('GET', route('app.auth.login'));
    $this->assertTrue($this->client->getResponse()->isOk());
  }

  public function testShouldSuccessfullyLoggedInUser()
  {
    $credentials = ['username' => 'admin', 'password' => 'password'];

    $this->action('POST', 'AuthController@postLogin', null, $credentials);
    $this->assertRedirectedToRoute('app.dashboard');
  }

  public function testShouldSuccessfullyLoggedOutUser()
  {
    $response = $this->call('GET', '/');
    $this->assertRedirectedToRoute('app.auth.login');
  }

  public function testShouldNotLoginUsingWrongCredentials(){
    $credentials = ['username' => 'adasdasdmin', 'password' => 'passwoasdrd'];
    $response = $this->action('POST', 'AuthController@postLogin', null, $credentials);
    $this->assertRedirectedToRoute('app.auth.login');
    $this->assertSessionHas('error', 'Invalid username or password');
  }

}
