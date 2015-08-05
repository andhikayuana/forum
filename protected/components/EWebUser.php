<?php
	/**
	* class turunan dari CWebUser
	*/
	class EWebUser extends CWebUser
	{
		protected $_model;

		protected function loadUser(){
			if ($this->_model===null) {
				$this->_model = User::model()->findByPk($this->id);
			}
			return $this->_model;
		}

		public function getLevel(){
			$user = $this->loadUser();
			if ($user) {
				return $user->level_id;
			}
			return 100; //level tidak ditentukan
		}
	}