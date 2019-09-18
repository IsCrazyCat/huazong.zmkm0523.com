<?php


namespace app\mobile\controller;


class Testg extends MobileBase
{
    public function check_rudan_first($user_id){
        check_rudan_first($user_id);
    }
    public function update_underling_leader($user_id){
        update_underling_leader($user_id,$user_id);
    }
    public function update_up_leader($user_id){
        update_up_leader($user_id);
    }
}