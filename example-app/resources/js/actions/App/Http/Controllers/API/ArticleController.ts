import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../../wayfinder'
/**
* @see \App\Http\Controllers\API\ArticleController::index
 * @see app/Http/Controllers/API/ArticleController.php:18
 * @route '/api/news'
 */
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/api/news',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\API\ArticleController::index
 * @see app/Http/Controllers/API/ArticleController.php:18
 * @route '/api/news'
 */
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\API\ArticleController::index
 * @see app/Http/Controllers/API/ArticleController.php:18
 * @route '/api/news'
 */
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\API\ArticleController::index
 * @see app/Http/Controllers/API/ArticleController.php:18
 * @route '/api/news'
 */
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\API\ArticleController::index
 * @see app/Http/Controllers/API/ArticleController.php:18
 * @route '/api/news'
 */
    const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: index.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\API\ArticleController::index
 * @see app/Http/Controllers/API/ArticleController.php:18
 * @route '/api/news'
 */
        indexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: index.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\API\ArticleController::index
 * @see app/Http/Controllers/API/ArticleController.php:18
 * @route '/api/news'
 */
        indexForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: index.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    index.form = indexForm
/**
* @see \App\Http\Controllers\API\ArticleController::show
 * @see app/Http/Controllers/API/ArticleController.php:32
 * @route '/api/news/{article}'
 */
export const show = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(args, options),
    method: 'get',
})

show.definition = {
    methods: ["get","head"],
    url: '/api/news/{article}',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\API\ArticleController::show
 * @see app/Http/Controllers/API/ArticleController.php:32
 * @route '/api/news/{article}'
 */
show.url = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { article: args }
    }

    
    if (Array.isArray(args)) {
        args = {
                    article: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        article: args.article,
                }

    return show.definition.url
            .replace('{article}', parsedArgs.article.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\API\ArticleController::show
 * @see app/Http/Controllers/API/ArticleController.php:32
 * @route '/api/news/{article}'
 */
show.get = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\API\ArticleController::show
 * @see app/Http/Controllers/API/ArticleController.php:32
 * @route '/api/news/{article}'
 */
show.head = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: show.url(args, options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\API\ArticleController::show
 * @see app/Http/Controllers/API/ArticleController.php:32
 * @route '/api/news/{article}'
 */
    const showForm = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: show.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\API\ArticleController::show
 * @see app/Http/Controllers/API/ArticleController.php:32
 * @route '/api/news/{article}'
 */
        showForm.get = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: show.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\API\ArticleController::show
 * @see app/Http/Controllers/API/ArticleController.php:32
 * @route '/api/news/{article}'
 */
        showForm.head = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: show.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    show.form = showForm
/**
* @see \App\Http\Controllers\API\ArticleController::store
 * @see app/Http/Controllers/API/ArticleController.php:54
 * @route '/api/news'
 */
export const store = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

store.definition = {
    methods: ["post"],
    url: '/api/news',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\API\ArticleController::store
 * @see app/Http/Controllers/API/ArticleController.php:54
 * @route '/api/news'
 */
store.url = (options?: RouteQueryOptions) => {
    return store.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\API\ArticleController::store
 * @see app/Http/Controllers/API/ArticleController.php:54
 * @route '/api/news'
 */
store.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\API\ArticleController::store
 * @see app/Http/Controllers/API/ArticleController.php:54
 * @route '/api/news'
 */
    const storeForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: store.url(options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\API\ArticleController::store
 * @see app/Http/Controllers/API/ArticleController.php:54
 * @route '/api/news'
 */
        storeForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: store.url(options),
            method: 'post',
        })
    
    store.form = storeForm
/**
* @see \App\Http\Controllers\API\ArticleController::update
 * @see app/Http/Controllers/API/ArticleController.php:102
 * @route '/api/news/{article}'
 */
export const update = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

update.definition = {
    methods: ["put"],
    url: '/api/news/{article}',
} satisfies RouteDefinition<["put"]>

/**
* @see \App\Http\Controllers\API\ArticleController::update
 * @see app/Http/Controllers/API/ArticleController.php:102
 * @route '/api/news/{article}'
 */
update.url = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { article: args }
    }

    
    if (Array.isArray(args)) {
        args = {
                    article: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        article: args.article,
                }

    return update.definition.url
            .replace('{article}', parsedArgs.article.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\API\ArticleController::update
 * @see app/Http/Controllers/API/ArticleController.php:102
 * @route '/api/news/{article}'
 */
update.put = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

    /**
* @see \App\Http\Controllers\API\ArticleController::update
 * @see app/Http/Controllers/API/ArticleController.php:102
 * @route '/api/news/{article}'
 */
    const updateForm = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: update.url(args, {
                    [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                        _method: 'PUT',
                        ...(options?.query ?? options?.mergeQuery ?? {}),
                    }
                }),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\API\ArticleController::update
 * @see app/Http/Controllers/API/ArticleController.php:102
 * @route '/api/news/{article}'
 */
        updateForm.put = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: update.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'PUT',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'post',
        })
    
    update.form = updateForm
/**
* @see \App\Http\Controllers\API\ArticleController::destroy
 * @see app/Http/Controllers/API/ArticleController.php:130
 * @route '/api/news/{article}'
 */
export const destroy = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

destroy.definition = {
    methods: ["delete"],
    url: '/api/news/{article}',
} satisfies RouteDefinition<["delete"]>

/**
* @see \App\Http\Controllers\API\ArticleController::destroy
 * @see app/Http/Controllers/API/ArticleController.php:130
 * @route '/api/news/{article}'
 */
destroy.url = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { article: args }
    }

    
    if (Array.isArray(args)) {
        args = {
                    article: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        article: args.article,
                }

    return destroy.definition.url
            .replace('{article}', parsedArgs.article.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\API\ArticleController::destroy
 * @see app/Http/Controllers/API/ArticleController.php:130
 * @route '/api/news/{article}'
 */
destroy.delete = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

    /**
* @see \App\Http\Controllers\API\ArticleController::destroy
 * @see app/Http/Controllers/API/ArticleController.php:130
 * @route '/api/news/{article}'
 */
    const destroyForm = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: destroy.url(args, {
                    [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                        _method: 'DELETE',
                        ...(options?.query ?? options?.mergeQuery ?? {}),
                    }
                }),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\API\ArticleController::destroy
 * @see app/Http/Controllers/API/ArticleController.php:130
 * @route '/api/news/{article}'
 */
        destroyForm.delete = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: destroy.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'DELETE',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'post',
        })
    
    destroy.form = destroyForm
const ArticleController = { index, show, store, update, destroy }

export default ArticleController