<?php

class TaskMysql57FixesForTaskGroup extends CmfiveMigration {

	public function up() {
		// UP
		$this->changeColumnInTable('task_group', 'default_priority', 'string', ['limit' => 255,'null' => true]);
        $this->changeColumnInTable('task_group', 'default_task_type', 'string', ['limit' => 255,'null' => true]);
	}

	public function down() {
		// DOWN
	}

}
