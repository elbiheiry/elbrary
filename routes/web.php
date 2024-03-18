<?php
/**
 * Adminpanel routes
 */
Route::group(['namespace' => 'Admin' ,'prefix' => 'admin'] ,function (){

    Route::group(['namespace' => 'Auth'] ,function (){
        Route::get('/login' ,['as' => 'admin.auth' ,'uses' => 'LoginController@getLogin']);
        Route::post('/login' ,['as' => 'admin.auth' ,'uses' => 'LoginController@postLogin']);
        Route::get('/logout', 'LoginController@getLogout')->name('admin.logout');
    });

    Route::group(['middleware' => 'auth.admin'] ,function (){

        //dashboard route
        Route::get('/' ,['as' => 'admin.dashboard' ,'uses' => 'DashboardController@getIndex']);

        /**
         * site-info routes
         */
        Route::group(['prefix' => 'site-info'] ,function (){
            Route::get('/' ,['as' => 'admin.settings' ,'uses' => 'SettingController@getIndex']);
            Route::post('/' ,['as' => 'admin.settings' ,'uses' => 'SettingController@postIndex']);
        });

        /**
         * home sections routes
         */
        Route::group(['prefix' => 'home-sections'] , function (){
            Route::get('/' , ['as' => 'admin.home' , 'uses' => 'HomeController@getIndex']);
            Route::get('/info/{id}' , ['as' => 'admin.home.info' , 'uses' => 'HomeController@getInfo']);
            Route::post('/edit/{id}' , ['as' => 'admin.home.edit' , 'uses' => 'HomeController@postIndex']);
        });

        /**
         * cities routes
         */
        Route::group(['prefix' => 'cities'] ,function (){
            Route::get('/' ,['as' => 'admin.cities' ,'uses' => 'CityController@getIndex']);
            Route::post('/' ,['as' => 'admin.cities' ,'uses' => 'CityController@postIndex']);
            Route::get('/info/{id}' ,['as' => 'admin.cities.info' ,'uses' => 'CityController@getInfo']);
            Route::post('/edit/{id}' ,['as' => 'admin.cities.edit' ,'uses' => 'CityController@postEdit']);
            Route::get('/delete/{id}' ,['as' => 'admin.cities.delete' ,'uses' => 'CityController@getDelete']);
        });

        /**
         * about us routes
         */
        Route::group(['prefix' => 'about-us'] ,function (){
            /**
             * features route
             */
            Route::group(['prefix' => 'features'] ,function () {
                Route::get('/', ['as' => 'admin.features', 'uses' => 'FeatureController@getIndex']);
                Route::post('/', ['as' => 'admin.features', 'uses' => 'FeatureController@postIndex']);
                Route::get('/info/{id}', ['as' => 'admin.features.info', 'uses' => 'FeatureController@getInfo']);
                Route::post('/edit/{id}', ['as' => 'admin.features.edit', 'uses' => 'FeatureController@postEdit']);
                Route::get('/delete/{id}', ['as' => 'admin.features.delete', 'uses' => 'FeatureController@getDelete']);
            });

            /**
             * testimonials route
             */
            Route::group(['prefix' => 'testimonials'] ,function () {
                Route::get('/', ['as' => 'admin.testimonials', 'uses' => 'TestimonialController@getIndex']);
                Route::post('/', ['as' => 'admin.testimonials', 'uses' => 'TestimonialController@postIndex']);
                Route::get('/info/{id}', ['as' => 'admin.testimonials.info', 'uses' => 'TestimonialController@getInfo']);
                Route::post('/edit/{id}', ['as' => 'admin.testimonials.edit', 'uses' => 'TestimonialController@postEdit']);
                Route::get('/delete/{id}', ['as' => 'admin.testimonials.delete', 'uses' => 'TestimonialController@getDelete']);
            });
        });

        /**
         * products routes
         */
        Route::group(['prefix' => 'products'] ,function (){
            Route::get('/' ,['as' => 'admin.products', 'uses' => 'ProductController@getIndex']);
            Route::post('/' ,['as' => 'admin.products', 'uses' => 'ProductController@postIndex']);
            Route::get('/info/{id}' ,['as' => 'admin.products.info', 'uses' => 'ProductController@getInfo']);
            Route::post('/edit/{id}' ,['as' => 'admin.products.edit', 'uses' => 'ProductController@postEdit']);
            Route::get('/delete/{id}' ,['as' => 'admin.products.delete', 'uses' => 'ProductController@getDelete']);

            /**
             * categories routes
             */
            Route::group(['prefix' => 'types'] ,function (){
                Route::get('/{id}' ,['as' => 'admin.products.categories' ,'uses' => 'ProductCategoryController@getIndex']);
                Route::post('/{id}' ,['as' => 'admin.products.categories' ,'uses' => 'ProductCategoryController@postIndex']);
                Route::get('/info/{id}' ,['as' => 'admin.products.categories.info' ,'uses' => 'ProductCategoryController@getInfo']);
                Route::post('/edit/{id}' ,['as' => 'admin.products.categories.edit' ,'uses' => 'ProductCategoryController@postEdit']);
                Route::get('/delete/{id}' ,['as' => 'admin.products.categories.delete' ,'uses' => 'ProductCategoryController@getDelete']);
            });

            /**
             * active-days routes
             */
            Route::group(['prefix' => 'active-days'] ,function (){
                Route::get('/{id}' ,['as' => 'admin.products.days' ,'uses' => 'ProductActiveDayController@getIndex']);
                Route::post('/{id}' ,['as' => 'admin.products.days' ,'uses' => 'ProductActiveDayController@postIndex']);
                Route::get('/info/{id}' ,['as' => 'admin.products.days.info' ,'uses' => 'ProductActiveDayController@getInfo']);
                Route::post('/edit/{id}' ,['as' => 'admin.products.days.edit' ,'uses' => 'ProductActiveDayController@postEdit']);
                Route::get('/delete/{id}' ,['as' => 'admin.products.days.delete' ,'uses' => 'ProductActiveDayController@getDelete']);

                /**
                 * intervals routes
                 */
                Route::group(['prefix' => 'intervals'] ,function (){
                    Route::get('/{id}' ,['as' => 'admin.products.days.intervals' ,'uses' => 'ActiveDayIntervalController@getIndex']);
                    Route::post('/{id}' ,['as' => 'admin.products.days.intervals' ,'uses' => 'ActiveDayIntervalController@postIndex']);
                    Route::get('/info/{id}' ,['as' => 'admin.products.days.intervals.info' ,'uses' => 'ActiveDayIntervalController@getInfo']);
                    Route::post('/edit/{id}' ,['as' => 'admin.products.days.intervals.edit' ,'uses' => 'ActiveDayIntervalController@postEdit']);
                    Route::get('/delete/{id}' ,['as' => 'admin.products.days.intervals.delete' ,'uses' => 'ActiveDayIntervalController@getDelete']);
                });
            });

            /**
             * cutting routes
             */
            Route::group(['prefix' => 'cutting'] ,function (){
                Route::get('/{id}' ,['as' => 'admin.products.cuts' ,'uses' => 'ProductCutController@getIndex']);
                Route::post('/{id}' ,['as' => 'admin.products.cuts' ,'uses' => 'ProductCutController@postIndex']);
                Route::get('/info/{id}' ,['as' => 'admin.products.cuts.info' ,'uses' => 'ProductCutController@getInfo']);
                Route::post('/edit/{id}' ,['as' => 'admin.products.cuts.edit' ,'uses' => 'ProductCutController@postEdit']);
                Route::get('/delete/{id}' ,['as' => 'admin.products.cuts.delete' ,'uses' => 'ProductCutController@getDelete']);
            });

            /**
             * discount routes
             */
            Route::group(['prefix' => 'discount'] ,function (){
                Route::get('/{id}' ,['as' => 'admin.products.discount' ,'uses' => 'ProductDiscountController@getIndex']);
                Route::post('/{id}' ,['as' => 'admin.products.discount' ,'uses' => 'ProductDiscountController@postIndex']);
                Route::get('/info/{id}' ,['as' => 'admin.products.discount.info' ,'uses' => 'ProductDiscountController@getInfo']);
                Route::post('/edit/{id}' ,['as' => 'admin.products.discount.edit' ,'uses' => 'ProductDiscountController@postEdit']);
                Route::get('/delete/{id}' ,['as' => 'admin.products.discount.delete' ,'uses' => 'ProductDiscountController@getDelete']);
            });

            /**
             * accessories routes
             */
            Route::group(['prefix' => 'accessories'] ,function (){
                Route::get('/{id}' ,['as' => 'admin.products.accessories' ,'uses' => 'ProductAccessoryController@getIndex']);
                Route::post('/{id}' ,['as' => 'admin.products.accessories' ,'uses' => 'ProductAccessoryController@postIndex']);
                Route::get('/info/{id}' ,['as' => 'admin.products.accessories.info' ,'uses' => 'ProductAccessoryController@getInfo']);
                Route::post('/edit/{id}' ,['as' => 'admin.products.accessories.edit' ,'uses' => 'ProductAccessoryController@postEdit']);
                Route::get('/delete/{id}' ,['as' => 'admin.products.accessories.delete' ,'uses' => 'ProductAccessoryController@getDelete']);
            });
        });

        //subscribers route
        Route::get('/subscribers' ,['as' => 'admin.subscribers' ,'uses' => 'SubscriberController@getIndex']);
        Route::get('/subscribers/delete/{id}' ,['as' => 'admin.subscribers.delete' ,'uses' => 'SubscriberController@getDelete']);

        //messages route
        Route::get('/messages' ,['as' => 'admin.messages' ,'uses' => 'MessageController@getIndex']);
        Route::get('/messages/delete/{id}' ,['as' => 'admin.messages.delete' ,'uses' => 'MessageController@getDelete']);

        /**
         * checkouts routes
         */
        Route::group(['prefix' => 'checkouts'] ,function (){
            Route::get('/' ,['as' => 'admin.checkout' ,'uses' => 'CheckoutController@getIndex']);
            Route::get('/order/{id}' ,['as' => 'admin.checkout.single' ,'uses' => 'CheckoutController@getSingleOrder']);
            Route::get('/delete/{id}' ,['as' => 'admin.checkout.delete' ,'uses' => 'CheckoutController@getDelete']);
        });
    });
});

/**
 * site routes
 */
Route::group(['namespace' => 'Site'] ,function (){

    /**
     * homepage route
     */
    Route::get('/' ,['as' => 'site.index' ,'uses' => 'HomeController@getIndex']);
    Route::post('subscribe' ,['as' => 'site.subscribe' ,'uses' => 'HomeController@postSubscribe']);

    /**
     * about-us route
     */
    Route::get('/about-us' ,['as' => 'site.about' ,'uses' => 'AboutController@getIndex']);

    /**
     * orders routes
     */
    Route::group(['prefix' => 'orders'] , function (){
        Route::get('/' ,['as' => 'site.orders' , 'uses' => 'OrderController@getIndex']);
        Route::post('/' , ['as' => 'site.orders' , 'uses' => 'OrderController@postSave']);
        Route::get('/{slug}' ,['as' => 'site.order' , 'uses' => 'OrderController@getSingleOrder']);
        Route::post('submit/{id}' , ['as' => 'site.order.submit' , 'uses' => 'OrderController@postIndex']);
    });

    /**
     * checkout routes
     */
    Route::group(['prefix' => 'checkout'] , function (){
        Route::get('/{id}' , ['as' => 'site.checkout' , 'uses' => 'CheckoutController@getIndex']);
        Route::post('/{id}' , ['as' => 'site.checkout' , 'uses' => 'CheckoutController@postIndex']);
        Route::post('/discount/{id}/{order_id}' , ['as' => 'site.discount' , 'uses' => 'CheckoutController@postCheckDiscount']);
        Route::post('/intervals/get/all' , ['as' => 'site.intervals' , 'uses' => 'CheckoutController@postIntervals']);
    });

    /**
     * contact us route
     */
    Route::get('/contact-us' ,['as' => 'site.contact' ,'uses' => 'ContactController@getIndex']);
    Route::post('/contact-us' ,['as' => 'site.contact' ,'uses' => 'ContactController@postIndex']);

});