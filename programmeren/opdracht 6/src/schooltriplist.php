<?php
  namespace classes;

  class SchooltripList {
      protected array $studentList = [];
      protected Teacher $teacher;

      public function addStudentToList($student) {
        $this->studentList[] = $student;
      }
      public function setTeacher(Teacher $teacher) {
        $this->teacher = $teacher;
      }
      public function getStudentLists() {
        return $this->studentList;
      }
      public function getTeacher() {
        return $this->teacher;
      }
  }
?>