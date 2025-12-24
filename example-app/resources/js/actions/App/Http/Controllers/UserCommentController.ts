import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../wayfinder'
/**
* @see \App\Http\Controllers\UserCommentController::myComments
 * @see app/Http/Controllers/UserCommentController.php:10
 * @route '/my-comments'
 */
export const myComments = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: myComments.url(options),
    method: 'get',
})

myComments.definition = {
    methods: ["get","head"],
    url: '/my-comments',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\UserCommentController::myComments
 * @see app/Http/Controllers/UserCommentController.php:10
 * @route '/my-comments'
 */
myComments.url = (options?: RouteQueryOptions) => {
    return myComments.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\UserCommentController::myComments
 * @see app/Http/Controllers/UserCommentController.php:10
 * @route '/my-comments'
 */
myComments.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: myComments.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\UserCommentController::myComments
 * @see app/Http/Controllers/UserCommentController.php:10
 * @route '/my-comments'
 */
myComments.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: myComments.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\UserCommentController::myComments
 * @see app/Http/Controllers/UserCommentController.php:10
 * @route '/my-comments'
 */
    const myCommentsForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: myComments.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\UserCommentController::myComments
 * @see app/Http/Controllers/UserCommentController.php:10
 * @route '/my-comments'
 */
        myCommentsForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: myComments.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\UserCommentController::myComments
 * @see app/Http/Controllers/UserCommentController.php:10
 * @route '/my-comments'
 */
        myCommentsForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: myComments.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    myComments.form = myCommentsForm
const UserCommentController = { myComments }

export default UserCommentController