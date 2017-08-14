<?php
namespace src\Front\Controller;


use app\Database;
use app\Request;
use src\Front\Model\BilletModel;
use src\Front\Model\CommentaryModel;


class ArticleController extends FrontController
{
    public function showAction(Request $request)
    {
        try {
            $id = $request->getParam('id');
            if (empty($id)) {
                throw new \Exception("Cet article n'éxiste pas");
            }
            $billetEntity = new BilletModel(new Database());
            $commentaryEntity = new CommentaryModel(new Database());
            $comments = $commentaryEntity->findByArticleId($id);
            $billet = $billetEntity->findOne($id);
            if ($request->isPost() ){
                if ($request->getSession('user')){
                    $newComments = new CommentaryModel(new Database());
                    $newComments
                        ->setComment($request->getPost('comment'))
                        ->setUserId($request->getSession('user')['id'])
                        ->setBilletId($id)
                    ;
                    $newComments->save($newComments);
                    $this->router->redirect('article', 'show', ['id' => $id], 301);

                }else {
                    throw new \Exception('Vous devez vous connecter pour poster un commentaire');
                }
            }
        } catch (\Exception $exception) {
            $request->setSession('message', 'danger', $exception->getMessage());
            return
                $this->router->redirect('article', 'index');
        }
        return
            $this->render(':article:one', [
                "billet" => $billet,
                "comments" => $comments
            ]);
    }
}