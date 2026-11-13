<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/model.php';

class FlashcardModel extends Model
{
    public function get($id)
    {
        $query = $this->db->prepare('SELECT * FROM flashcards WHERE id = ?');
        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getAll()
    {
        $query = $this->db->prepare('SELECT * FROM flashcards ORDER BY created_at DESC');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert($question, $answer, $topic)
    {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $this->db->prepare(
            'INSERT INTO flashcards (question, answer, topic) VALUES (?, ?, ?)'
        );
        $query->execute([$question, $answer, $topic]);

        return $this->db->lastInsertId();
    }

    public function update($id, $question, $answer, $topic)
    {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $this->db->prepare(
            'UPDATE flashcards SET question = ?, answer = ?, topic = ? WHERE id = ?'
        );
        $query->execute([$question, $answer, $topic, $id]);
    }

    public function remove($id)
    {
        $query = $this->db->prepare('DELETE FROM flashcards WHERE id = ?');
        $query->execute([$id]);
    }
}
