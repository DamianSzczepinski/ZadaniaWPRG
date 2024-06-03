<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
        class Product{
            private $name, $price, $quantity;
            function __construct($name, $price, $quantity) {
                $this->name = $name;
                $this->price = $price;
                $this->quantity = $quantity;
            }
            function getName() {
                return $this->name;
            }
            function setName($newName) {
                 $this->name = $newName;
            }

            function getPrice() {
                return $this->price;
            }
            function setPrice($newPrice) {
                 $this->price = $newPrice;
            }

            function getQuantity() {
                return $this->quantity;
            }
            function setQuantity($newQuantity) {
                 $this->quantity = $newQuantity;
            }
    
            function __toString()
            {
                return ("Produkt: ".$this->name.", Price: ".$this->price.", Quantity: ".$this->quantity."<br>");
            }
    
        }

        $pierogi= new Product("pierogi", 20, 10);
        $schabowy = new Product("schabowy", 15, 1);
        echo ($pierogi);
        

        class Cart{
            private $products = [];

            public function __construct(array $products = []) {
                $this->products = $products;
              }

            function addProduct(Product $product){
                $this->products[]=$product;
            }

            function removeProduct(Product $product)
            {
                
                $index = array_search($product, $this->products, true);
                if ($index !== false)
                 {
                    unset($this->products[$index]);
                    $this->products = array_values($this->products);
                }
            }

            function getTotal(){
                $suma=0;
                foreach ($this->products as $product)
                {
                    $suma+=$product->getPrice()*$product->getQuantity();
                }
                return $suma;
            }

            function __toString()
            {
                $info="";
                foreach ($this->products as $product)
                {
                    $info .= $product."\n";
                }
                return $info."$".$this->getTotal();
            }

        }

        $cart = new Cart();
        $cart->addProduct($pierogi);
        $cart->addProduct($schabowy);
        $cart->removeProduct($pierogi);
        $cart->addProduct($pierogi);
        echo $cart;
    ?>
</body>
</html>