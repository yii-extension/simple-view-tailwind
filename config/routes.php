<?php

declare(strict_types=1);

use Simple\View\Tailwind\Action\HomeAction;
use Yiisoft\Router\Route;

return [
    Route::get('/')->action([HomeAction::class, 'run'])->name('home')->override(),
];
