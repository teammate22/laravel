import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../wayfinder'
/**
* @see \App\Http\Controllers\AuthController::login
 * @see app/Http/Controllers/AuthController.php:62
 * @route '/login'
 */
export const login = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: login.url(options),
    method: 'get',
})

login.definition = {
    methods: ["get","head"],
    url: '/login',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\AuthController::login
 * @see app/Http/Controllers/AuthController.php:62
 * @route '/login'
 */
login.url = (options?: RouteQueryOptions) => {
    return login.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AuthController::login
 * @see app/Http/Controllers/AuthController.php:62
 * @route '/login'
 */
login.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: login.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\AuthController::login
 * @see app/Http/Controllers/AuthController.php:62
 * @route '/login'
 */
login.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: login.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\AuthController::login
 * @see app/Http/Controllers/AuthController.php:62
 * @route '/login'
 */
    const loginForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: login.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\AuthController::login
 * @see app/Http/Controllers/AuthController.php:62
 * @route '/login'
 */
        loginForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: login.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\AuthController::login
 * @see app/Http/Controllers/AuthController.php:62
 * @route '/login'
 */
        loginForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: login.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
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
* @see \App\Http\Controllers\AuthController::register
 * @see app/Http/Controllers/AuthController.php:16
 * @route '/register'
 */
export const register = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: register.url(options),
    method: 'get',
})

register.definition = {
    methods: ["get","head"],
    url: '/register',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\AuthController::register
 * @see app/Http/Controllers/AuthController.php:16
 * @route '/register'
 */
register.url = (options?: RouteQueryOptions) => {
    return register.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AuthController::register
 * @see app/Http/Controllers/AuthController.php:16
 * @route '/register'
 */
register.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: register.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\AuthController::register
 * @see app/Http/Controllers/AuthController.php:16
 * @route '/register'
 */
register.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: register.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\AuthController::register
 * @see app/Http/Controllers/AuthController.php:16
 * @route '/register'
 */
    const registerForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: register.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\AuthController::register
 * @see app/Http/Controllers/AuthController.php:16
 * @route '/register'
 */
        registerForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: register.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\AuthController::register
 * @see app/Http/Controllers/AuthController.php:16
 * @route '/register'
 */
        registerForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: register.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    register.form = registerForm
/**
* @see \App\Http\Controllers\MainController::gallery
 * @see app/Http/Controllers/MainController.php:26
 * @route '/gallery/{id}'
 */
export const gallery = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: gallery.url(args, options),
    method: 'get',
})

gallery.definition = {
    methods: ["get","head"],
    url: '/gallery/{id}',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\MainController::gallery
 * @see app/Http/Controllers/MainController.php:26
 * @route '/gallery/{id}'
 */
gallery.url = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { id: args }
    }

    
    if (Array.isArray(args)) {
        args = {
                    id: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        id: args.id,
                }

    return gallery.definition.url
            .replace('{id}', parsedArgs.id.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\MainController::gallery
 * @see app/Http/Controllers/MainController.php:26
 * @route '/gallery/{id}'
 */
gallery.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: gallery.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\MainController::gallery
 * @see app/Http/Controllers/MainController.php:26
 * @route '/gallery/{id}'
 */
gallery.head = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: gallery.url(args, options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\MainController::gallery
 * @see app/Http/Controllers/MainController.php:26
 * @route '/gallery/{id}'
 */
    const galleryForm = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: gallery.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\MainController::gallery
 * @see app/Http/Controllers/MainController.php:26
 * @route '/gallery/{id}'
 */
        galleryForm.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: gallery.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\MainController::gallery
 * @see app/Http/Controllers/MainController.php:26
 * @route '/gallery/{id}'
 */
        galleryForm.head = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: gallery.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    gallery.form = galleryForm
/**
* @see \App\Http\Controllers\AuthController::signin
 * @see app/Http/Controllers/AuthController.php:0
 * @route '/signin'
 */
export const signin = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: signin.url(options),
    method: 'get',
})

signin.definition = {
    methods: ["get","head"],
    url: '/signin',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\AuthController::signin
 * @see app/Http/Controllers/AuthController.php:0
 * @route '/signin'
 */
signin.url = (options?: RouteQueryOptions) => {
    return signin.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AuthController::signin
 * @see app/Http/Controllers/AuthController.php:0
 * @route '/signin'
 */
signin.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: signin.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\AuthController::signin
 * @see app/Http/Controllers/AuthController.php:0
 * @route '/signin'
 */
signin.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: signin.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\AuthController::signin
 * @see app/Http/Controllers/AuthController.php:0
 * @route '/signin'
 */
    const signinForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: signin.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\AuthController::signin
 * @see app/Http/Controllers/AuthController.php:0
 * @route '/signin'
 */
        signinForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: signin.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\AuthController::signin
 * @see app/Http/Controllers/AuthController.php:0
 * @route '/signin'
 */
        signinForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: signin.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    signin.form = signinForm
/**
* @see \App\Http\Controllers\AuthController::registration
 * @see app/Http/Controllers/AuthController.php:0
 * @route '/signin'
 */
export const registration = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: registration.url(options),
    method: 'post',
})

registration.definition = {
    methods: ["post"],
    url: '/signin',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\AuthController::registration
 * @see app/Http/Controllers/AuthController.php:0
 * @route '/signin'
 */
registration.url = (options?: RouteQueryOptions) => {
    return registration.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AuthController::registration
 * @see app/Http/Controllers/AuthController.php:0
 * @route '/signin'
 */
registration.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: registration.url(options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\AuthController::registration
 * @see app/Http/Controllers/AuthController.php:0
 * @route '/signin'
 */
    const registrationForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: registration.url(options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\AuthController::registration
 * @see app/Http/Controllers/AuthController.php:0
 * @route '/signin'
 */
        registrationForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: registration.url(options),
            method: 'post',
        })
    
    registration.form = registrationForm
/**
 * @see routes/web.php:68
 * @route '/profile'
 */
export const profile = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: profile.url(options),
    method: 'get',
})

profile.definition = {
    methods: ["get","head"],
    url: '/profile',
} satisfies RouteDefinition<["get","head"]>

/**
 * @see routes/web.php:68
 * @route '/profile'
 */
profile.url = (options?: RouteQueryOptions) => {
    return profile.definition.url + queryParams(options)
}

/**
 * @see routes/web.php:68
 * @route '/profile'
 */
profile.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: profile.url(options),
    method: 'get',
})
/**
 * @see routes/web.php:68
 * @route '/profile'
 */
profile.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: profile.url(options),
    method: 'head',
})

    /**
 * @see routes/web.php:68
 * @route '/profile'
 */
    const profileForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: profile.url(options),
        method: 'get',
    })

            /**
 * @see routes/web.php:68
 * @route '/profile'
 */
        profileForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: profile.url(options),
            method: 'get',
        })
            /**
 * @see routes/web.php:68
 * @route '/profile'
 */
        profileForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: profile.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    profile.form = profileForm