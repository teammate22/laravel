import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../wayfinder'
/**
* @see \App\Http\Controllers\CommentController::store
 * @see app/Http/Controllers/CommentController.php:12
 * @route '/news/{article}/comments'
 */
export const store = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(args, options),
    method: 'post',
})

store.definition = {
    methods: ["post"],
    url: '/news/{article}/comments',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\CommentController::store
 * @see app/Http/Controllers/CommentController.php:12
 * @route '/news/{article}/comments'
 */
store.url = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return store.definition.url
            .replace('{article}', parsedArgs.article.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\CommentController::store
 * @see app/Http/Controllers/CommentController.php:12
 * @route '/news/{article}/comments'
 */
store.post = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(args, options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\CommentController::store
 * @see app/Http/Controllers/CommentController.php:12
 * @route '/news/{article}/comments'
 */
    const storeForm = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: store.url(args, options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\CommentController::store
 * @see app/Http/Controllers/CommentController.php:12
 * @route '/news/{article}/comments'
 */
        storeForm.post = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: store.url(args, options),
            method: 'post',
        })
    
    store.form = storeForm
/**
* @see \App\Http\Controllers\CommentController::destroy
 * @see app/Http/Controllers/CommentController.php:35
 * @route '/comments/{comment}'
 */
export const destroy = (args: { comment: string | number } | [comment: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

destroy.definition = {
    methods: ["delete"],
    url: '/comments/{comment}',
} satisfies RouteDefinition<["delete"]>

/**
* @see \App\Http\Controllers\CommentController::destroy
 * @see app/Http/Controllers/CommentController.php:35
 * @route '/comments/{comment}'
 */
destroy.url = (args: { comment: string | number } | [comment: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { comment: args }
    }

    
    if (Array.isArray(args)) {
        args = {
                    comment: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        comment: args.comment,
                }

    return destroy.definition.url
            .replace('{comment}', parsedArgs.comment.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\CommentController::destroy
 * @see app/Http/Controllers/CommentController.php:35
 * @route '/comments/{comment}'
 */
destroy.delete = (args: { comment: string | number } | [comment: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

    /**
* @see \App\Http\Controllers\CommentController::destroy
 * @see app/Http/Controllers/CommentController.php:35
 * @route '/comments/{comment}'
 */
    const destroyForm = (args: { comment: string | number } | [comment: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: destroy.url(args, {
                    [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                        _method: 'DELETE',
                        ...(options?.query ?? options?.mergeQuery ?? {}),
                    }
                }),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\CommentController::destroy
 * @see app/Http/Controllers/CommentController.php:35
 * @route '/comments/{comment}'
 */
        destroyForm.delete = (args: { comment: string | number } | [comment: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: destroy.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'DELETE',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'post',
        })
    
    destroy.form = destroyForm
const comments = {
    store: Object.assign(store, store),
destroy: Object.assign(destroy, destroy),
}

export default comments