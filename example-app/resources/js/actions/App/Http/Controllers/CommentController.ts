import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../wayfinder'
/**
* @see \App\Http\Controllers\CommentController::store
 * @see app/Http/Controllers/CommentController.php:33
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
 * @see app/Http/Controllers/CommentController.php:33
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
 * @see app/Http/Controllers/CommentController.php:33
 * @route '/news/{article}/comments'
 */
store.post = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(args, options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\CommentController::store
 * @see app/Http/Controllers/CommentController.php:33
 * @route '/news/{article}/comments'
 */
    const storeForm = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: store.url(args, options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\CommentController::store
 * @see app/Http/Controllers/CommentController.php:33
 * @route '/news/{article}/comments'
 */
        storeForm.post = (args: { article: string | number } | [article: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: store.url(args, options),
            method: 'post',
        })
    
    store.form = storeForm
/**
* @see \App\Http\Controllers\CommentController::destroy
 * @see app/Http/Controllers/CommentController.php:120
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
 * @see app/Http/Controllers/CommentController.php:120
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
 * @see app/Http/Controllers/CommentController.php:120
 * @route '/comments/{comment}'
 */
destroy.delete = (args: { comment: string | number } | [comment: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

    /**
* @see \App\Http\Controllers\CommentController::destroy
 * @see app/Http/Controllers/CommentController.php:120
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
 * @see app/Http/Controllers/CommentController.php:120
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
/**
* @see \App\Http\Controllers\CommentController::moderationIndex
 * @see app/Http/Controllers/CommentController.php:15
 * @route '/comments/moderation'
 */
export const moderationIndex = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: moderationIndex.url(options),
    method: 'get',
})

moderationIndex.definition = {
    methods: ["get","head"],
    url: '/comments/moderation',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\CommentController::moderationIndex
 * @see app/Http/Controllers/CommentController.php:15
 * @route '/comments/moderation'
 */
moderationIndex.url = (options?: RouteQueryOptions) => {
    return moderationIndex.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\CommentController::moderationIndex
 * @see app/Http/Controllers/CommentController.php:15
 * @route '/comments/moderation'
 */
moderationIndex.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: moderationIndex.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\CommentController::moderationIndex
 * @see app/Http/Controllers/CommentController.php:15
 * @route '/comments/moderation'
 */
moderationIndex.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: moderationIndex.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\CommentController::moderationIndex
 * @see app/Http/Controllers/CommentController.php:15
 * @route '/comments/moderation'
 */
    const moderationIndexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: moderationIndex.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\CommentController::moderationIndex
 * @see app/Http/Controllers/CommentController.php:15
 * @route '/comments/moderation'
 */
        moderationIndexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: moderationIndex.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\CommentController::moderationIndex
 * @see app/Http/Controllers/CommentController.php:15
 * @route '/comments/moderation'
 */
        moderationIndexForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: moderationIndex.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    moderationIndex.form = moderationIndexForm
/**
* @see \App\Http\Controllers\CommentController::approve
 * @see app/Http/Controllers/CommentController.php:64
 * @route '/comments/{comment}/approve'
 */
export const approve = (args: { comment: string | number } | [comment: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: approve.url(args, options),
    method: 'post',
})

approve.definition = {
    methods: ["post"],
    url: '/comments/{comment}/approve',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\CommentController::approve
 * @see app/Http/Controllers/CommentController.php:64
 * @route '/comments/{comment}/approve'
 */
approve.url = (args: { comment: string | number } | [comment: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return approve.definition.url
            .replace('{comment}', parsedArgs.comment.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\CommentController::approve
 * @see app/Http/Controllers/CommentController.php:64
 * @route '/comments/{comment}/approve'
 */
approve.post = (args: { comment: string | number } | [comment: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: approve.url(args, options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\CommentController::approve
 * @see app/Http/Controllers/CommentController.php:64
 * @route '/comments/{comment}/approve'
 */
    const approveForm = (args: { comment: string | number } | [comment: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: approve.url(args, options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\CommentController::approve
 * @see app/Http/Controllers/CommentController.php:64
 * @route '/comments/{comment}/approve'
 */
        approveForm.post = (args: { comment: string | number } | [comment: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: approve.url(args, options),
            method: 'post',
        })
    
    approve.form = approveForm
/**
* @see \App\Http\Controllers\CommentController::reject
 * @see app/Http/Controllers/CommentController.php:84
 * @route '/comments/{comment}/reject'
 */
export const reject = (args: { comment: string | number } | [comment: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: reject.url(args, options),
    method: 'post',
})

reject.definition = {
    methods: ["post"],
    url: '/comments/{comment}/reject',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\CommentController::reject
 * @see app/Http/Controllers/CommentController.php:84
 * @route '/comments/{comment}/reject'
 */
reject.url = (args: { comment: string | number } | [comment: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return reject.definition.url
            .replace('{comment}', parsedArgs.comment.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\CommentController::reject
 * @see app/Http/Controllers/CommentController.php:84
 * @route '/comments/{comment}/reject'
 */
reject.post = (args: { comment: string | number } | [comment: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: reject.url(args, options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\CommentController::reject
 * @see app/Http/Controllers/CommentController.php:84
 * @route '/comments/{comment}/reject'
 */
    const rejectForm = (args: { comment: string | number } | [comment: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: reject.url(args, options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\CommentController::reject
 * @see app/Http/Controllers/CommentController.php:84
 * @route '/comments/{comment}/reject'
 */
        rejectForm.post = (args: { comment: string | number } | [comment: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: reject.url(args, options),
            method: 'post',
        })
    
    reject.form = rejectForm
const CommentController = { store, destroy, moderationIndex, approve, reject }

export default CommentController