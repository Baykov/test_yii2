<?php

namespace app\models;

class ApiModel extends \yii\db\ActiveRecord
{
    public function getRateLimit($request, $action)
    {
        return [$this->rateLimit, 1]; // $rateLimit запросов в секунду
    }

    public function loadAllowance($request, $action)
    {
        return [$this->allowance, $this->allowance_updated_at];
    }

    public function saveAllowance($request, $action, $allowance, $timestamp)
    {
        $this->allowance = $allowance;
        $this->allowance_updated_at = $timestamp;
        $this->save();
    }
}
