import AuthController from './AuthController'
import MainController from './MainController'
import ArticleController from './ArticleController'
import CommentController from './CommentController'
import UserCommentController from './UserCommentController'
import NotificationController from './NotificationController'
const Controllers = {
    AuthController: Object.assign(AuthController, AuthController),
MainController: Object.assign(MainController, MainController),
ArticleController: Object.assign(ArticleController, ArticleController),
CommentController: Object.assign(CommentController, CommentController),
UserCommentController: Object.assign(UserCommentController, UserCommentController),
NotificationController: Object.assign(NotificationController, NotificationController),
}

export default Controllers