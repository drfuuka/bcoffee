<?php

namespace Laravel\Ui;

class AuthRouteMethods
{
    /**
     * Register the typical authentication routes for an application.
     *
     * @param  array  $options
     * @return callable
     */
    public function auth()
    {
        return function ($options = []) {
            $namespace = class_exists($this->prependGroupNamespace('Admin\Auth\LoginController')) ? null : 'App\Http\Controllers';

            $this->group(['namespace' => $namespace], function() use($options) {
                // Login Routes...
                if ($options['login'] ?? true) {
                    $this->get('login', 'Admin\Auth\LoginController@showLoginForm')->name('login');
                    $this->post('login', 'Admin\Auth\LoginController@login');
                }

                // Logout Routes...
                if ($options['logout'] ?? true) {
                    $this->post('logout', 'Admin\Auth\LoginController@logout')->name('logout');
                }

                // Registration Routes...
                if ($options['register'] ?? true) {
                    $this->get('register', 'Admin\Auth\RegisterController@showRegistrationForm')->name('register');
                    $this->post('register', 'Admin\Auth\RegisterController@register');
                }

                // Password Reset Routes...
                if ($options['reset'] ?? true) {
                    $this->resetPassword();
                }

                // Password Confirmation Routes...
                if ($options['confirm'] ??
                    class_exists($this->prependGroupNamespace('Admin\Auth\ConfirmPasswordController'))) {
                    $this->confirmPassword();
                }

                // Email Verification Routes...
                if ($options['verify'] ?? false) {
                    $this->emailVerification();
                }
            });
        };
    }

    /**
     * Register the typical reset password routes for an application.
     *
     * @return callable
     */
    public function resetPassword()
    {
        return function () {
            $this->get('password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
            $this->post('password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
            $this->get('password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('password.reset');
            $this->post('password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('password.update');
        };
    }

    /**
     * Register the typical confirm password routes for an application.
     *
     * @return callable
     */
    public function confirmPassword()
    {
        return function () {
            $this->get('password/confirm', 'Admin\Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
            $this->post('password/confirm', 'Admin\Auth\ConfirmPasswordController@confirm');
        };
    }

    /**
     * Register the typical email verification routes for an application.
     *
     * @return callable
     */
    public function emailVerification()
    {
        return function () {
            $this->get('email/verify', 'Admin\Auth\VerificationController@show')->name('verification.notice');
            $this->get('email/verify/{id}/{hash}', 'Admin\Auth\VerificationController@verify')->name('verification.verify');
            $this->post('email/resend', 'Admin\Auth\VerificationController@resend')->name('verification.resend');
        };
    }
}
