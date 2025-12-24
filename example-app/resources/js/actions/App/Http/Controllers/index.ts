import AuthController from './AuthController'
import API from './API'
import MainController from './MainController'
import ArticleController from './ArticleController'
import CommentController from './CommentController'
import UserCommentController from './UserCommentController'
import NotificationController from './NotificationController'
const Controllers = {
    AuthController: Object.assign(AuthController, AuthController),
API: Object.assign(API, API),
MainController: Object.assign(MainController, MainController),
ArticleController: Object.assign(ArticleController, ArticleController),
CommentController: Object.assign(CommentController, CommentController),
UserCommentController: Object.assign(UserCommentController, UserCommentController),
NotificationController: Object.assign(NotificationController, NotificationController),
}

export default Controllers