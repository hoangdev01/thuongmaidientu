<?php
class BillDetails
{
    public $id;
    public $billId;
    public $productId;
    public $amount;
    public function __construct($id, $billId, $productId, $amount)
    {
        $this->id=$id;
        $this->billId=$billId;
        $this->productId=$productId;
        $this->amount=$amount;
    }
}
?>