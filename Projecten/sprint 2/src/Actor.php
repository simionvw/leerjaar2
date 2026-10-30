<?php
  namespace App;
  class Actor {
  private int $id;
  private string $name;

  public function addActor(string $name): void {
    $pdo = Database::getConnection();
    $stmt = $pdo->prepare("INSERT INTO actors (name) VALUES (?)");
    $stmt->execute([$name]);
  }

  public function getActors(): array {
    $pdo = Database::getConnection();
    $stmt = $pdo->prepare("SELECT ______ FROM actors");
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
?>