<?php
namespace OO_Sample ; 

interface iNormalStaffTask{
    public function generate_task_report();
    public function execute_task($source_task_name);
}

?>