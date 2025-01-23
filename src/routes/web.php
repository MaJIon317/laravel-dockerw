<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/cleared', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize');
    
    return "Cache is removed";
});
 
Route::get('/testr', function() {
    $user = App\Models\User::first();
    $emailConstructor = App\Models\EmailConstructor::first();
 
    //\Illuminate\Support\Facades\Mail::to('sadasds@dasda.ro')->send(new \App\Mail\ConstructorEmail($user, $emailConstructor));
  
    \App\Jobs\ConstructorEmailJob::dispatchSync($user, $emailConstructor); // Отправим приветсвенное письмо клиенту
return 'Ok';
    $redis= ( new \App\Mail\ConstructorEmail($user, $emailConstructor) )->render(); 
 
    return $redis;
});

Route::get('/test', function() {
    
    $user = App\Models\User::where('email', 'kashpyrenkovasiliu@gmail.com')->first();

 
   // return (new \App\Mail\RegistrationConfirmationEmail($user))->render();

    \App\Jobs\RegistrationConfirmationJob::dispatch($user); // Регистрация (письмо со ссылкой подтверждения регистрации);
    // \App\Jobs\WelcomeEmailJob::dispatch($user); // Приветственное письмо (приветственное письмо подтвержденному пользователю, может содержать промокод на скидку на первую покупку);
    // \App\Jobs\AuthorizationJob::dispatch($user); // Вход в личный кабинет
    // \App\Jobs\PasswordRecoveryJob::dispatch($user); // Восстановление пароля (Письмо со ссылкой на восстановление пароля);

    $order = App\Models\Order::where('email', 'kashpyrenkovasiliu@gmail.com')->first();
 
    if ($order) {
        \App\Jobs\OrderStatusUpdateJob::dispatch($order); // Сменами статусов заказа (новый, в сборке, в доставке и прочее). Должны содержать полный набор данных по заказу (товары, количество, сумму);
        \App\Jobs\OrderCancellationJob::dispatch($order); // Отмена заказа клиентом
        \App\Jobs\OrderAnnulmentJob::dispatch($order); // Аннулирование заказа (с возможностью указать причину аннулирвоания)
        \App\Jobs\OrderShippedJob::dispatch($order); // Заказ отправлен ТК (если в заказе появляется ТТН при синхронизации с 1С)
        \App\Jobs\OrderOpinionJob::dispatch($order); // Запрос мнения о заказе (контроль качества)
    }

    /*
        php artisan make:job ForgottenBasketJob
        php artisan make:mail ForgottenBasketEmail --markdown=mail.forgotten-backet

        The forgotten basket


        По расписанию рассылка писем настраивается для следующих тем:
        Забытая корзина;
        Новости;
        Акции;
        Персональные предложения;

    */
   
});

Route::prefix('cookie')->controller(\App\Http\Controllers\CookieController::class)->group(function () {
    Route::post('/set', 'set');
});

Route::prefix('session')->controller(\App\Http\Controllers\SessionController::class)->group(function () {
    Route::post('/set', 'set');
});

Route::get('/', \App\Livewire\Home::class)->name('home');

Route::get('/catalog', \App\Livewire\Catalog::class)->name('catalog');

Route::get('/category/{slug}', \App\Livewire\Category::class)->name('category');

Route::get('/compilation/{slug}', \App\Livewire\Compilation::class)->name('compilation');

Route::get('/product/{slug}', \App\Livewire\Product::class)->name('product');

Route::get('/article', \App\Livewire\Articles::class)->name('articles');
Route::get('/article/{slug}', \App\Livewire\Article::class)->name('article');

Route::get('/news', \App\Livewire\Newses::class)->name('newses');
Route::get('/news/{slug}', \App\Livewire\News::class)->name('news');

Route::get('/info/{slug}', \App\Livewire\Information::class)->name('information');

Route::get('/contact', \App\Livewire\Contact::class)->name('contact');

Route::get('/wishlist', \App\Livewire\Wishlist::class)->name('wishlist');

Route::prefix('cart')->group(function () {
    Route::get('/', \App\Livewire\Cart\Cart::class)->name('cart');

    Route::get('/checkout', \App\Livewire\Cart\Checkout::class)->name('checkout');
});

Route::get('/unsubscribe', \App\Livewire\Unsubscribe::class)->name('unsubscribe');

Route::get('/reset-password/{token}', \App\Livewire\User\Reset::class)->name('password.reset');

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::middleware('verified')->group(function () {
        Route::get('/', \App\Livewire\User\Dashboard::class)->name('dashboard');
        Route::get('/orders', \App\Livewire\User\Orders::class)->name('dashboard.orders');
        Route::get('/orders/{id}', \App\Livewire\User\Components\Order::class)->name('dashboard.order.info');
        Route::get('/balance', \App\Livewire\User\Balance::class)->name('dashboard.balance');
        
        Route::get('/wishlist', function () {
            return redirect()->route('wishlist');
        })->name('dashboard.wishlist');

        Route::get('/setting', \App\Livewire\User\Setting::class)->name('dashboard.setting');
    });

 
    // Верификая почты
    Route::prefix('verify')->group(function () {
        Route::get('/', \App\Livewire\User\Verify::class)->name('verification.notice');

        Route::post('/notification', function (Request $request) {
            $request->user()->sendEmailVerificationNotification();
         
            return redirect(route('dashboard'));
        })->middleware(['throttle:6,1'])->name('verification.send');
    
        Route::get('/{id}/{hash}', function (EmailVerificationRequest $request) {
            $request->fulfill();
         
            return redirect(route('dashboard'));
        })->middleware('signed')->name('verification.verify');
    });
});