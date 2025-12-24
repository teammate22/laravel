import AuthController from './AuthController'
import ArticleController from './ArticleController'
const API = {
    AuthController: Object.assign(AuthController, AuthController),
ArticleController: Object.assign(ArticleController, ArticleController),
}

export default API