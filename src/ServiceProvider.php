<?php

namespace LaravelHttp;

use Illuminate\Support\ServiceProvider as Provider;

use LaravelHttp\HttpManager;
use LaravelHttp\Facade\Http;

/**
 * ServiceProvider
 * Facadeの登録を行う
 * 
 * @package LaravelHttp
 */
class ServiceProvider extends Provider
{
    /**
     * アプリケーションの起動時に実行する
     * FacadeとManagerの紐づけを行う
     * 
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(Http::class, function () {
            return new HttpManager();
        });
    }
}
