<?php

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

}
