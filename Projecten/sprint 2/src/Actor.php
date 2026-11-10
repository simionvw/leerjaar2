<?php
  namespace App;
  class Actor {
  private int $id;
  private string $name;

  public function addActor(string $name): void {

    $pdo = Database::getConnection();
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM actors WHERE name = ?");
    $stmt->execute([$name]);
    if ($stmt->fetchColumn() > 0) {
      header("Location: admin.php?success=0");
      exit;
    } else {
      $pdo = Database::getConnection();
      $stmt = $pdo->prepare("INSERT INTO actors (name) VALUES (?)");
      $stmt->execute([$name]);
    }
  }

  public function getActors(): array {
    $pdo = Database::getConnection();
    $stmt = $pdo->prepare("SELECT * FROM actors");
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
?>