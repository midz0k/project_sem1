<?php 
   namespace App\Helper;

   class Cart
   {
       //Khai báo thuộc tính
       private $items = [];
       private $total_prive = 0;
       private $total_quantity = 0;
   
       //định nghĩa các phương thức
   
       public function __construct() {
           $this->items = session('Cart') ? session('Cart') : [];
       }

        
        //phương thức kiểm tra sản phẩm
        public function check($Product, $attr){
            foreach ($this->items as $key => $value) {
                if ($value['id'] == $Product -> id && $value['attr'] == $attr) {
                    return $key;
                }
            }
            return false;
        }

        public function add($Product,$quantity,$attr){
            $item = [
               'id' => $Product->id,
               'name' => $Product -> name,
               'price' => ($Product -> sale_price > 0)? $Product->price-(($Product->price * $Product->promotion->detail1)/100): $Product -> price,
               'image' => $Product -> image,
               'quantity' => $quantity,
               'attr' => $attr,
               'Product'=>$Product
            ];
            $check = $this->check($Product,$attr);
        
            if (!$this->check($Product, $attr)) {
                $this->items[$Product->id.$attr] = $item;
            }else{
                $this->items[$check]['quantity'] += $quantity;
            }
            session(['Cart'=>$this->items]);
        }

        public function content(){
            return $this->items;
        }

        public function update($request){
            foreach ($request['key'] as $key => $value) {
                foreach ($this->items as $key2 => $item) {
                    if ($key2 == $request['key'][$key]) {
                        $this->items[$key2]['quantity'] = $request['quantity'][$key];
                        $this->items[$key2]['attr'] = $request['attr'][$key];
                    }
                }
            }
     
            session(['Cart'=>$this->items]);
        }
        
        public function get_Total_price(){

            foreach ($this->items as $value) {
               $this->total_prive += $value['quantity'] * $value['price'];
            }
    
            return $this->total_prive;
        }
    
        public function get_Total_quantity(){
    
            foreach ($this->items as $value) {
               $this->total_quantity += $value['quantity'];
            }
    
            return $this->total_quantity;
        }
    
        public function delete($key){
            if (isset($this->items[$key])) {
                unset($this->items[$key]);
                session(['Cart'=>$this->items]);
            }
        }
    
        public function delete_All(){
            session()->forget('Cart');
        }
    
    }
?>