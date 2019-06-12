<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class CourseSelectedModel extends DB {
    public $TableName = "course_selected";
    public $Schema = array(
        'csid'            => array(
            "dataType"=>"int", 
            "dataSize"=>11, 
            "not_null"=>true,
            "primary_key" => true,
            'auto_increment' => true
        ),
        'uid'            => array(
            "dataType"=>"int", 
            "dataSize"=>11, 
            "not_null"=>true
        ),
        'cid'            => array(
            "dataType"=>"int", 
            "dataSize"=>11, 
            "not_null"=>true
        ),
        "status"     => array(
            "dataType"=>"int", 
            "dataSize"=>11, 
            "not_null"=>true,
            "default" => 0
        ),
        "timestamp" => array(
            "dataType"=>"int", 
            "dataSize"=>11, 
            "not_null"=>true,
            "default" => 0
        ),
        "mod_timestamp" => array(
            "dataType"=>"int", 
            "dataSize"=>11, 
            "not_null"=>true,
            "default" => 0
        ),
        "etms"          => array(
            "dataType"=>"int", 
            "dataSize"=>11, 
            "not_null"=>true,
            "default" => 0
        )
    );
    function __construct() {
    	//@session_start();
        parent::__construct(_DNS_, _USER_, _PASS_);
    }
    public function add($data){
        $state = "INSERT INTO `course_selected`(
                            `uid`, 
                            `cid`, 
                            `status`, 
                            `timestamp`, 
                            `mod_timestamp`
                        ) VALUES (
                            '".$data['uid']."', 
                            '".$data['cid']."', 
                            '".$data['status']."', 
                            '".time()."', 
                            '".time()."'
                        )";
        $query = $this->prepare($state);
        return $query->execute();
    } 
    public function remove($id){
        $state = "DELETE FROM `course_selected` WHERE `id` = '".$id."'";
        $query = $this->prepare($state);
        return $query->execute();
    }
    public function update($data){
        $state = "UPDATE `course_selected` SET 
                        `uid`           = '".$data['uid']."',
                        `cid`           = '".$data['cid']."',
                        `status`        = '".$data['status']."',
                        `mod_timestamp` = '".time()."'
                WHERE 
                    `id` = '".$data['id']."'
                ";
        $query = $this->prepare($state);
        return $query->execute();
    } 
    public function getById($id){
        $state = "SELECT * FROM `course_selected` WHERE `id` = '".$id."'";
        $query = $this->prepare($state);
        return $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAll(){
        $state = "SELECT * FROM `course_selected`";
        $query = $this->prepare($state);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>