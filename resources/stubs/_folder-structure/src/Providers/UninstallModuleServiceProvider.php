<?php namespace DummyNamespace\Providers;

use Illuminate\Support\ServiceProvider;

class UninstallModuleServiceProvider extends ServiceProvider
{
    protected $module = 'DummyNamespace';

    protected $moduleAlias = 'DummyAlias';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->booted(function () {
            $this->booted();
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }

    protected function booted()
    {
        acl_permission()
        ->unsetPermissionByModule($this->moduleAlias);

        $this->dropSchema();
    }

    protected function dropSchema()
    {
        //\Schema::dropIfExists('table-name');
    }
}
