<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('text', 'admin.components.form.text', ['name', 'value' => null, 'attributes' => []]);
        Form::component('textarea', 'admin.components.form.textarea', ['name', 'value' => null, 'attributes' => []]);
        Form::component('submit', 'admin.components.form.submit', ['value' => 'Submit', 'attributes' => []]);
        Form::component('hidden', 'admin.components.form.hidden', ['name', 'value' => null, 'attributes' => []]);
        Form::component('file', 'admin.components.form.file', ['name', 'attributes' => []]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
