<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST["email"];
$password = $_POST["password"];

// validate the form inputs
$errors = [];

if (!Validator::email($email)) {
    $errors["email"] = "Please provide a valid email address";
}

if (!Validator::string($password, 7, 255)) {
    $errors["password"] = "Please provide a valid password of at least 7 characters";
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

// check if the account already exists
$user = $db->query("SELECT * FROM users WHERE email = :email", [
    "email" => $email
])->find();

if ($user) {
    // if yes, redirect to login page
    header('Location: /');
    exit();
} else {
    // If no, save on to the db and then log the user in, and redirect
    $db->query("INSERT INTO users (email, password) VALUES (:email, :password)", [
        "email" => $email,
        "password" => password_hash($password, PASSWORD_DEFAULT),
    ]);

    login($user);

    header('Location: /');
    exit();
}

