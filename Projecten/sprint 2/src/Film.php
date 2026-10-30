<?php
namespace App;

class Film {
  private int $id;
  private string $name;
  private string $genre;

  public function addFilm(string $name, string $genre): void {
    $pdo = Database::getConnection();
    $stmt = $pdo->prepare("INSERT INTO films (name, genre) VALUES (?, ?)");
    $stmt->execute([$name, $genre]);
  }

  public function linkActor(int $filmId, int $actorId): void {
    $pdo = Database::getConnection();
    $stmt = $pdo->prepare("INSERT INTO film_actors (film_id, actor_id) VALUES (?, ?)");
    $stmt->execute([$filmId, $actorId]);
  }

  public function getActorsByFilm(int $filmId): array {
    $pdo = Database::getConnection();
    $stmt = $pdo->prepare(
      "SELECT actors.name
      FROM film_actors
      JOIN actors ON film_actors.actor_id = actors.id
      WHERE film_actors.film_id = ?"
    );
    $stmt->execute([$filmId]);
    return $stmt->fetchAll();
  }

  public function getFilms(): array {
    $pdo = Database::getConnection();
    $stmt = $pdo->prepare("SELECT * FROM films");
    $stmt->execute();
    return $stmt->fetchAll();
}
}
?>