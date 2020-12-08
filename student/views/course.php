<?php
# import database file from database folder
require_once("./Database.php");

class Course {
	private $_id;
	private $_title;
	private $_code;
	private $_credit;

	public function __construct($id, $title, $code, $credit) {
		$this->_id = $id;
		$this->_title = $title;
		$this->_code = $code;
		$this->_credit = $credit;
	}

	public function getID() {
		return $this->_id;
	}

	public function getTitle() {
		return $this->_title;
	}

	public function getCode() {
		return $this->_code;
	}

	public function getCredit() {
		return $this->_credit;
	}

	public static function allRegisterCourses($sid) {
		return Database::getRegisterCourses($sid);
	}

	public static function getCourseId($id, $sid) {
		$result = Database::uploadCourseId($id, $sid);
		if($result) {
			echo "<script>alert('Operation is Successfully performed')</script>";
			echo "<script>open('./dashboard.php?regCourse', '_self')</script>";
		}
	}

	public static function isCourseAvaliable() {
		$result = Database::isCourseAvaliable();
	}

	public static function getAllCourses() {
		return Database::getCourses();
	}

	public static function course_id_for_withdraw($id, $sid) {
		$result = Database::deleteCourse($id, $sid);
		if($result) {
			echo "<script>alert('Operation is Successfully performed')</script>";
			echo "<script>open('./dashboard.php?viewRegCourse', '_self')</script>";
		}
	}

}
 ?>
