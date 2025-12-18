import AuthController from './AuthController'
import ArticleController from './ArticleController'
import MainController from './MainController'
import CommentController from './CommentController'
const Controllers = {
    AuthController: Object.assign(AuthController, AuthController),
ArticleController: Object.assign(ArticleController, ArticleController),
MainController: Object.assign(MainController, MainController),
CommentController: Object.assign(CommentController, CommentController),
}

export default Controllers