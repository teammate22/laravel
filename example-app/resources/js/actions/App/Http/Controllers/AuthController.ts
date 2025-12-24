import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../wayfinder'
/**
* @see \App\Http\Controllers\AuthController::showLoginForm
 * @see app/Http/Controllers/AuthController.php:62
 * @route '/login'
 */
export const showLoginForm = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: showLoginForm.url(options),
    method: 'get',
})

showLoginForm.definition = {
    methods: ["get","head"],
    url: '/login',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\AuthController::showLoginForm
 * @see app/Http/Controllers/AuthController.php:62
 * @route '/login'
 */
showLoginForm.url = (options?: RouteQueryOptions) => {
    return showLoginForm.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AuthController::showLoginForm
 * @see app/Http/Controllers/AuthController.php:62
 * @route '/login'
 */
showLoginForm.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: showLoginForm.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\AuthController::showLoginForm
 * @see app/Http/Controllers/AuthController.php:62
 * @route '/login'
 */
showLoginForm.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: showLoginForm.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\AuthController::showLoginForm
 * @see app/Http/Controllers/AuthController.php:62
 * @route '/login'
 */
    const showLoginFormForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: showLoginForm.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\AuthController::showLoginForm
 * @see app/Http/Controllers/AuthController.php:62
 * @route '/login'
 */
        showLoginFormForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: showLoginForm.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\AuthController::showLoginForm
 * @see app/Http/Controllers/AuthController.php:62
 * @route '/login'
 */
        showLoginFormForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: showLoginForm.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    showLoginForm.form = showLoginFormForm
/**
* @see \App\Http\Controllers\AuthController::login
 * @see app/Http/Controllers/AuthController.php:70
 * @route '/login'
 */
export const login = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: login.url(options),
    method: 'post',
})

login.definition = {
    methods: ["post"],
    url: '/login',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\AuthController::login
 * @see app/Http/Controllers/AuthController.php:70
 * @route '/login'
 */
login.url = (options?: RouteQueryOptions) => {
    return login.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AuthController::login
 * @see app/Http/Controllers/AuthController.php:70
 * @route '/login'
 */
login.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: login.url(options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\AuthController::login
 * @see app/Http/Controllers/AuthController.php:70
 * @route '/login'
 */
    const loginForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: login.url(options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\AuthController::login
 * @see app/Http/Controllers/AuthController.php:70
 * @route '/login'
 */
        loginForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: login.url(options),
            method: 'post',
        })
    
    login.form = loginForm
/**
* @see \App\Http\Controllers\AuthController::logout
 * @see app/Http/Controllers/AuthController.php:102
 * @route '/logout'
 */
export const logout = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: logout.url(options),
    method: 'post',
})

logout.definition = {
    methods: ["post"],
    url: '/logout',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\AuthController::logout
 * @see app/Http/Controllers/AuthController.php:102
 * @route '/logout'
 */
logout.url = (options?: RouteQueryOptions) => {
    return logout.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AuthController::logout
 * @see app/Http/Controllers/AuthController.php:102
 * @route '/logout'
 */
logout.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: logout.url(options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\AuthController::logout
 * @see app/Http/Controllers/AuthController.php:102
 * @route '/logout'
 */
    const logoutForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: logout.url(options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\AuthController::logout
 * @see app/Http/Controllers/AuthController.php:102
 * @route '/logout'
 */
        logoutForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: logout.url(options),
            method: 'post',
        })
    
    logout.form = logoutForm
/**
* @see \App\Http\Controllers\AuthController::showRegistrationForm
 * @see app/Http/Controllers/AuthController.php:16
 * @route '/register'
 */
export const showRegistrationForm = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: showRegistrationForm.url(options),
    method: 'get',
})

showRegistrationForm.definition = {
    methods: ["get","head"],
    url: '/register',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\AuthController::showRegistrationForm
 * @see app/Http/Controllers/AuthController.php:16
 * @route '/register'
 */
showRegistrationForm.url = (options?: RouteQueryOptions) => {
    return showRegistrationForm.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AuthController::showRegistrationForm
 * @see app/Http/Controllers/AuthController.php:16
 * @route '/register'
 */
showRegistrationForm.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: showRegistrationForm.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\AuthController::showRegistrationForm
 * @see app/Http/Controllers/AuthController.php:16
 * @route '/register'
 */
showRegistrationForm.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: showRegistrationForm.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\AuthController::showRegistrationForm
 * @see app/Http/Controllers/AuthController.php:16
 * @route '/register'
 */
    const showRegistrationFormForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: showRegistrationForm.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\AuthController::showRegistrationForm
 * @see app/Http/Controllers/AuthController.php:16
 * @route '/register'
 */
        showRegistrationFormForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: showRegistrationForm.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\AuthController::showRegistrationForm
 * @see app/Http/Controllers/AuthController.php:16
 * @route '/register'
 */
        showRegistrationFormForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: showRegistrationForm.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    showRegistrationForm.form = showRegistrationFormForm
/**
* @see \App\Http\Controllers\AuthController::register
 * @see app/Http/Controllers/AuthController.php:24
 * @route '/register'
 */
export const register = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: register.url(options),
    method: 'post',
})

register.definition = {
    methods: ["post"],
    url: '/register',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\AuthController::register
 * @see app/Http/Controllers/AuthController.php:24
 * @route '/register'
 */
register.url = (options?: RouteQueryOptions) => {
    return register.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AuthController::register
 * @see app/Http/Controllers/AuthController.php:24
 * @route '/register'
 */
register.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: register.url(options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\AuthController::register
 * @see app/Http/Controllers/AuthController.php:24
 * @route '/register'
 */
    const registerForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: register.url(options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\AuthController::register
 * @see app/Http/Controllers/AuthController.php:24
 * @route '/register'
 */
        registerForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: register.url(options),
            method: 'post',
        })
    
    register.form = registerForm
const AuthController = { showLoginForm, login, logout, showRegistrationForm, register }

export default AuthController