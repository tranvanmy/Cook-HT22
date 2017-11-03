<?php

namespace App\Providers;

use App;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Contracts\IngredientRepositoryInterface;
use App\Repositories\Eloquent\IngredientRepository;
use App\Repositories\Contracts\FoodyRepositoryInterface;
use App\Repositories\Eloquent\FoodyRepository;
use App\Repositories\Contracts\ReceiptStepRepositoryInterface;
use App\Repositories\Eloquent\ReceiptStepRepository;
use App\Repositories\Contracts\ReceiptRepositoryInterface;
use App\Repositories\Eloquent\ReceiptRepository;
use App\Repositories\Contracts\UnitRepositoryInterface;
use App\Repositories\Eloquent\UnitRepository;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Contracts\ReceiptFoodyRepositoryInterface;
use App\Repositories\Eloquent\ReceiptFoodyRepository;
use App\Repositories\Contracts\ReceiptIngredientRepositoryInterface;
use App\Repositories\Eloquent\ReceiptIngredientRepository;
use App\Repositories\Contracts\LikeRepositoryInterface;
use App\Repositories\Eloquent\LikeRepository;
use App\Repositories\Contracts\FollowRepositoryInterface;
use App\Repositories\Eloquent\FollowRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        $models = [
            'Category',
            'Ingredient',
            'Foody',
            'ReceiptStep',
            'Receipt',
            'Unit',
            'User',
            'ReceiptFoody',
            'ReceiptIngredient',
            'Like',
            'Follow'
        ];
        
        foreach ($models as $model) {
            App::bind('App\Repositories\Contracts\\' . $model . 'RepositoryInterface', 'App\Repositories\Eloquent\\' . $model . 'Repository');
        }
    }
}
