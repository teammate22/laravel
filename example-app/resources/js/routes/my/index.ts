import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../wayfinder'
/**
* @see \UserCommentController::comments
 * @see [unknown]:0
 * @route '/my-comments'
 */
export const comments = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: comments.url(options),
    method: 'get',
})

comments.definition = {
    methods: ["get","head"],
    url: '/my-comments',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \UserCommentController::comments
 * @see [unknown]:0
 * @route '/my-comments'
 */
comments.url = (options?: RouteQueryOptions) => {
    return comments.definition.url + queryParams(options)
}

/**
* @see \UserCommentController::comments
 * @see [unknown]:0
 * @route '/my-comments'
 */
comments.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: comments.url(options),
    method: 'get',
})
/**
* @see \UserCommentController::comments
 * @see [unknown]:0
 * @route '/my-comments'
 */
comments.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: comments.url(options),
    method: 'head',
})

    /**
* @see \UserCommentController::comments
 * @see [unknown]:0
 * @route '/my-comments'
 */
    const commentsForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: comments.url(options),
        method: 'get',
    })

            /**
* @see \UserCommentController::comments
 * @see [unknown]:0
 * @route '/my-comments'
 */
        commentsForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: comments.url(options),
            method: 'get',
        })
            /**
* @see \UserCommentController::comments
 * @see [unknown]:0
 * @route '/my-comments'
 */
        commentsForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: comments.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    comments.form = commentsForm
const my = {
    comments: Object.assign(comments, comments),
}

export default my