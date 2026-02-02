<?php

test('the application returns a successful response', function () {
    $response = $this->get('/');

    // Root redirects to signin for unauthenticated users
    $response->assertStatus(302);
    $response->assertRedirect('/signin');
});

test('signin page loads successfully', function () {
    $response = $this->get('/signin');

    $response->assertStatus(200);
    $response->assertSee('Sign In');
});
