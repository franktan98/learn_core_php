<?php

interface iPayment{
    public function payment_request($source_date,$source_staff_id,$source_amount,$source_reson);
    public function payment_aprovel($source_approver, $payment_id );
    public function payment_reject($source_reject_by, $payment_id, $source_reson );
    public function payment_made($source_date,$payment_method);
}