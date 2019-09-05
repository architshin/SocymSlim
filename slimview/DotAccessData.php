<?php
class DotAccessData {
	public $deptName = "経理部";
	private $csName = "武者小路実篤";
	public function makeMessage() {
		return "makeMessageの戻り値です";
	}
	public function getCsName() {
		return $this->csName;
	}
	public function isFlgOn() {
		return true;
	}
	public function hasMiddleParam() {
		return true;
	}
}
