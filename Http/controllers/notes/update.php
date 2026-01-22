<?php

use Core\App;
use Core\Database;
use Core\Response;
use Core\Validator;

$db = App::resolve(Database::class);
$errors = [];
$message = [];

$currentUserId = 1;

$note = $db->query('SELECT * FROM notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

if ($note['user_id'] !== $currentUserId) {
    abort(Response::FORBIDDEN);
}

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required';
}

if (!empty($errors)) {
    return view("notes/edit.view.php", [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'message' => [],
    ]);
}

$db->query('UPDATE notes SET body = :body WHERE id = :id', [
    'id' => $_POST['id'],
    ':body' => $_POST['body'],
]);

header("Location: /notes");
die();

