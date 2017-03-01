<?php
/**
 * This is where the ultimate config for frontend entry point is being constructed.
 * Four parts are used in it:
 * 1. Global config defined in `common/config/main.php`
 * Note that this config itself is assembled the same way from three parts.
 * 2. Base overrides for frontend entry point.
 * 3. Possible current environment-specific overrides for frontend entry point
 * 4. Possible local overrides for frontend entry point.
 */
return CMap::mergeArray(
    (require ROOT_DIR . '/common/config/main.php'),
    (require __DIR__ . '/overrides/base.php'),
    (file_exists(__DIR__ . '/overrides/environment.php') ? require(__DIR__ . '/overrides/environment.php') : array()),
    (file_exists(__DIR__ . '/overrides/local.php') ? require(__DIR__ . '/overrides/local.php') : array())
);

return array(
    #...
    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
    ),
    #...
    'modules'=>array(
        #...
        'user'=>array(
            # encrypting method (php hash function)
            'hash' => 'md5',
 
            # send activation email
            'sendActivationMail' => true,
 
            # allow access for non-activated users
            'loginNotActiv' => false,
 
            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => false,
 
            # automatically login from registration
            'autoLogin' => true,
 
            # registration path
            'registrationUrl' => array('/user/registration'),
 
            # recovery password path
            'recoveryUrl' => array('/user/recovery'),
 
            # login form path
            'loginUrl' => array('/user/login'),
 
            # page after login
            'returnUrl' => array('/user/profile'),
 
            # page after logout
            'returnLogoutUrl' => array('/user/login'),
        ),
        #...
    ),
    #...
    // application components
    'components'=>array(
    #...
        'db'=>array(
        #...
            'tablePrefix' => 'tbl_',
        #...
        ),
        #...
        'user'=>array(
            // enable cookie-based authentication
            'class' => 'WebUser',
            'allowAutoLogin'=>true,
            'loginUrl' => array('/user/login'),
        ),
    #...
    ),
    #...
);

