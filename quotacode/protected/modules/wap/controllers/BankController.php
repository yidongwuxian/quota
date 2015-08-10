<?php
class BankController extends ItzController {
    
    /*
     * 银行的限额列表
     * */ 
    public function actionQuota(){
        //获取数据
        $tplData = array();

        //可用银行限额列表
        $sql="SELECT t1.`bank_id`,t1.`bank_name`,
                        (
                            CASE
                            WHEN min(t2.every_limit) = MAX(t2.every_limit) THEN
                                min( t2.every_limit)
                            ELSE
                                concat(
                                    min(t2.every_limit),
                                    '~',
                                    MAX(t2.every_limit)
                                )
                            END
                        ) AS every_limit,
                        sum(t2.daily_limit) as daily_limit,
                        sum(t2.monthly_limit) as monthly_limit
                    FROM `itz_bank` t1,`itz_expresspayment_banklimit` t2
                    LEFT JOIN `itz_expresspayment` t3 ON t2.`expresspayment_id` =t3.id
                    WHERE t1.`bank_id` = t2.`bank_id`
                    AND t2.`status` = 1 AND t3.`state`=1 AND t2.every_limit>0 AND t2.daily_limit>0 AND t2.monthly_limit>0
                    GROUP BY t1.`bank_id`;";
        $bank_limit_list = Yii::app()->db->createCommand($sql)->queryAll();
        $bank_ids= array();
        if(count($bank_limit_list)>0){
            foreach($bank_limit_list as $key => $value){
                $bank_ids[] = $value['bank_id'];
            }
        }
        
        //维护中银行限额列表
        $maintenance_data_sql="SELECT t1.`bank_id`,t1.`bank_name` ,-1 AS every_limit,-1 AS daily_limit, -1 AS monthly_limit  FROM `itz_bank` t1,`itz_expresspayment_banklimit` t2
                                        LEFT JOIN `itz_expresspayment` t3 ON t2.`expresspayment_id` =t3.id
                                        WHERE t1.`bank_id` = t2.`bank_id`
                                        AND t2.`status` = 1 AND t3.`state`=1 AND (t2.every_limit<=0 OR t2.daily_limit<=0 OR t2.monthly_limit<=0)
                                        GROUP BY t1.`bank_id`;";
        
        $maintenance_bank_limit_list = Yii::app()->db->createCommand($maintenance_data_sql)->queryAll();
        if(count($maintenance_bank_limit_list)>0){
            foreach($maintenance_bank_limit_list as $key => $value){
                if(in_array($value['bank_id'],$bank_ids)){
                    unset($maintenance_bank_limit_list[$key]);
                }
            }
        }
        
        $tplData['bank_limit'] = array_merge($bank_limit_list,$maintenance_bank_limit_list);
        $this->render('quota',$tplData);
    }
}
