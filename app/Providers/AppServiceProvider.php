<?php

namespace App\Providers;

use App\Services\PaymentSessionService;
use Illuminate\Support\ServiceProvider;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->alertComponentMacros();
        $this->installTelescope();
        $this->installIDEHelper();
        $this->registerPaymentSessionService();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function alertComponentMacros()
    {
        $types = ['success', 'error'];

        array_map(fn ($type) =>  Component::macro(\Str::camel('alert-' . $type), function ($message = '', $ms = 2000) use ($type) {
            /** @var Component */
            $self = $this;

            $self->dispatchBrowserEvent('alert-message', [
                'action'  => $type,
                'message' => $message,
                'ms'      => $ms,
            ]);
        }), $types);
    }

    public function defineAdminGate()
    {
        Gate::before(function ($user, $ability) {
            if ($user->is_admin()) {
                return true;
            }
        });
    }

    protected function installTelescope()
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    protected function installIDEHelper()
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    protected function registerPaymentSessionService()
    {
        $this->app->singleton(PaymentSessionService::class, PaymentSessionService::class);
    }
}

