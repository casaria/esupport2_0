<?php 
class time_track{
private $id='';
private $ticket_id='';
private $supporter_id='';
private $minutes='';
private $opened_date='';
private $closed_date='';
private $work_date='';
private $reference='';
private $after_hours='';
private $engineer_rate='';
private $work_category='';
public function __construct(){}
public function setid($id) {$this->id=$id;}
public function getid(){return $this->id;}
public function setticket_id($ticket_id) {$this->ticket_id=$ticket_id;}
public function getticket_id(){return $this->ticket_id;}
public function setsupporter_id($supporter_id) {$this->supporter_id=$supporter_id;}
public function getsupporter_id(){return $this->supporter_id;}
public function setminutes($minutes) {$this->minutes=$minutes;}
public function getminutes(){return $this->minutes;}
public function setopened_date($opened_date) {$this->opened_date=$opened_date;}
public function getopened_date(){return $this->opened_date;}
public function setclosed_date($closed_date) {$this->closed_date=$closed_date;}
public function getclosed_date(){return $this->closed_date;}
public function setwork_date($work_date) {$this->work_date=$work_date;}
public function getwork_date(){return $this->work_date;}
public function setreference($reference) {$this->reference=$reference;}
public function getreference(){return $this->reference;}
public function setafter_hours($after_hours) {$this->after_hours=$after_hours;}
public function getafter_hours(){return $this->after_hours;}
public function setengineer_rate($engineer_rate) {$this->engineer_rate=$engineer_rate;}
public function getengineer_rate(){return $this->engineer_rate;}
public function setwork_category($work_category) {$this->work_category=$work_category;}
public function getwork_category(){return $this->work_category;}
public function load($sql){
$r=mysql_query($sql);
$row=mysql_fetch_array($r,MYSQL_ASSOC);
$this->ticket_id=$row['ticket_id'];
$this->supporter_id=$row['supporter_id'];
$this->minutes=$row['minutes'];
$this->opened_date=$row['opened_date'];
$this->closed_date=$row['closed_date'];
$this->work_date=$row['work_date'];
$this->reference=$row['reference'];
$this->after_hours=$row['after_hours'];
$this->engineer_rate=$row['engineer_rate'];
$this->work_category=$row['work_category'];
return $row;
}
public function submit(){mysql_query("INSERT INTO time_track SET ticket_id='$this->ticket_id',supporter_id='$this->supporter_id',minutes='$this->minutes',opened_date='$this->opened_date',closed_date='$this->closed_date',work_date='$this->work_date',reference='$this->reference',after_hours='$this->after_hours',engineer_rate='$this->engineer_rate',work_category='$this->work_category'");$this->id=mysql_insert_id();}public function update(){mysql_query("UPDATE time_track SET ticket_id='$this->ticket_id',supporter_id='$this->supporter_id',minutes='$this->minutes',opened_date='$this->opened_date',closed_date='$this->closed_date',work_date='$this->work_date',reference='$this->reference',after_hours='$this->after_hours',engineer_rate='$this->engineer_rate',work_category='$this->work_category' WHERE id='$this->id'");}public function delete(){mysql_query("DELETE FROM time_track WHERE id='$this->id'");}}?>$this->sql=SELECT * FROM'.time_track.' WHERE id=\'\'