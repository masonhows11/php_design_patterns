<?php



abstract class AbstractCouponValidator
{ 


    ///////////// refactor duplicate method with abstract class


    protected  $coupon;
    //// for run next level of chain
    protected $nextLevelValidator;

    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

     //// for run next level of chain
     //// AbstractCouponValidator $validator
     //// $validator is type of AbstractCouponValidator
     public function setNextValidator(AbstractCouponValidator $validator)
     {
         $this->nextLevelValidator = $validator;
     }



     
    //// for if this chain is last do some thing
    protected function gotToNextValidator($code)
    {
        //// if this chain is last do
        if($this->nextLevelValidator == null ){
            return true;
        }
        //// else this chain is last do
        return $this->nextLevelValidator->validate($code);

    }


    abstract public function validate($code);

}
