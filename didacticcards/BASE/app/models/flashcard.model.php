<?php
require_once './app/models/flashcard.model.php';
require_once './app/views/flashcard.view.php';

class FlashcardController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new FlashcardModel();
        $this->view = new FlashcardView();
    }

    public function showFlashcards($req, $res)
    {
        $flashcards = $this->model->getAll();
        $this->view->showFlashcards($flashcards);
    }

    public function showFlashcardDetail($req, $res)
    {
        $id = $req->params->id;
        $flashcard = $this->model->get($id);

        if (!$flashcard) {
            return $this->view->showError('Tarjeta no encontrada.');
        }

        $this->view->showFlashcardDetail($flashcard);
    }

    public function showAddFlashcardForm($req, $res)
    {
        $this->view->showAddFlashcardForm();
    }

    public function addFlashcard($req, $res)
    {
        if (empty($_POST['question'])) {
            return $this->view->showError('Error: falta completar la pregunta.');
        }

        if (empty($_POST['answer'])) {
            return $this->view->showError('Error: falta completar la respuesta.');
        }

        $question = trim($_POST['question']);
        $answer = trim($_POST['answer']);
        $topic = trim($_POST['topic'] ?? 'General');

        $id = $this->model->insert($question, $answer, $topic);

        if (!$id) {
            return $this->view->showError('Error al insertar la tarjeta.');
        }

        header('Location: ' . BASE_URL . 'flashcards');
        exit;
    }

    public function showEditFlashcardForm($req, $res)
    {
        $id = $req->params->id;
        $flashcard = $this->model->get($id);

        if (!$flashcard) {
            return $this->view->showError('Tarjeta no encontrada.');
        }

        $this->view->showEditFlashcardForm($flashcard);
    }

    public function updateFlashcard($req, $res)
    {
        $id = $req->params->id;
        $flashcard = $this->model->get($id);

        if (!$flashcard) {
            return $this->view->showError('Tarjeta no encontrada.');
        }

        if (empty($_POST['question'])) {
            return $this->view->showError('Error: falta completar la pregunta.');
        }

        if (empty($_POST['answer'])) {
            return $this->view->showError('Error: falta completar la respuesta.');
        }

        $question = trim($_POST['question']);
        $answer = trim($_POST['answer']);
        $topic = trim($_POST['topic'] ?? 'General');

        $this->model->update($id, $question, $answer, $topic);

        header('Location: ' . BASE_URL . 'flashcards');
        exit;
    }

    public function removeFlashcard($req, $res)
    {
        $id = $req->params->id;
        $flashcard = $this->model->get($id);

        if (!$flashcard) {
            return $this->view->showError('Tarjeta no encontrada.');
        }

        $this->model->remove($id);

        header('Location: ' . BASE_URL . 'flashcards');
        exit;
    }
}
