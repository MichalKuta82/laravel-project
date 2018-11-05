<?php

/**
 * 
 */
class UserTest extends TestCase
{
    use DatabaseMigrations, \MailTracking;

    /** @test */
    public function a_confirmation_email_must_be_sent_after_registration()
    {
        $email = 'webmedia.dublin@gmail.com';

        $response = $this->post('/register', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => $email,
            'password' => 'secret',
            'password_confirmation' => 'secret'
        ]);

        $this->seeEmailWasSent();
    }
}