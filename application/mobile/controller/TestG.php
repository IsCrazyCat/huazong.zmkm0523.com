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
    public function reward_info($user_id){
        dump(reward_info($user_id));
    }
    function user_agent_info($user_id){
        echo user_agent_info($user_id,0);
    }
    public function test(){
        $a=$b=5;
//        echo $a.$b;
        $c = $a + 10;
        echo $c;
    }
}