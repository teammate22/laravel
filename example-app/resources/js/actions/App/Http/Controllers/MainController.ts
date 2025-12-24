import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../wayfinder'
/**
* @see \App\Http\Controllers\MainController::index
 * @see app/Http/Controllers/MainController.php:9
 * @route '/'
 */
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\MainController::index
 * @see app/Http/Controllers/MainController.php:9
 * @route '/'
 */
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\MainController::index
 * @see app/Http/Controllers/MainController.php:9
 * @route '/'
 */
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\MainController::index
 * @see app/Http/Controllers/MainController.php:9
 * @route '/'
 */
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\MainController::index
 * @see app/Http/Controllers/MainController.php:9
 * @route '/'
 */
    const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: index.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\MainController::index
 * @see app/Http/Controllers/MainController.php:9
 * @route '/'
 */
        indexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: index.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\MainController::index
 * @see app/Http/Controllers/MainController.php:9
 * @route '/'
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
* @see \App\Http\Controllers\MainController::contacts
 * @see app/Http/Controllers/MainController.php:26
 * @route '/contacts'
 */
export const contacts = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: contacts.url(options),
    method: 'get',
})

contacts.definition = {
    methods: ["get","head"],
    url: '/contacts',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\MainController::contacts
 * @see app/Http/Controllers/MainController.php:26
 * @route '/contacts'
 */
contacts.url = (options?: RouteQueryOptions) => {
    return contacts.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\MainController::contacts
 * @see app/Http/Controllers/MainController.php:26
 * @route '/contacts'
 */
contacts.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: contacts.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\MainController::contacts
 * @see app/Http/Controllers/MainController.php:26
 * @route '/contacts'
 */
contacts.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: contacts.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\MainController::contacts
 * @see app/Http/Controllers/MainController.php:26
 * @route '/contacts'
 */
    const contactsForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: contacts.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\MainController::contacts
 * @see app/Http/Controllers/MainController.php:26
 * @route '/contacts'
 */
        contactsForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: contacts.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\MainController::contacts
 * @see app/Http/Controllers/MainController.php:26
 * @route '/contacts'
 */
        contactsForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: contacts.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    contacts.form = contactsForm
/**
* @see \App\Http\Controllers\MainController::gallery
 * @see app/Http/Controllers/MainController.php:49
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
 * @see app/Http/Controllers/MainController.php:49
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
 * @see app/Http/Controllers/MainController.php:49
 * @route '/gallery/{id}'
 */
gallery.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: gallery.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\MainController::gallery
 * @see app/Http/Controllers/MainController.php:49
 * @route '/gallery/{id}'
 */
gallery.head = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: gallery.url(args, options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\MainController::gallery
 * @see app/Http/Controllers/MainController.php:49
 * @route '/gallery/{id}'
 */
    const galleryForm = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: gallery.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\MainController::gallery
 * @see app/Http/Controllers/MainController.php:49
 * @route '/gallery/{id}'
 */
        galleryForm.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: gallery.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\MainController::gallery
 * @see app/Http/Controllers/MainController.php:49
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
const MainController = { index, contacts, gallery }

export default MainController