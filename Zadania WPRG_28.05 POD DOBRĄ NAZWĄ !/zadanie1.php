<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
        class NoweAuto{
            public $name="";
            public $cena=0;
            public $kurs=0;
            function __construct($name, $cena, $kurs) {
                $this->name = $name;
                $this->cena = $cena;
                $this->kurs = $kurs;
            }

            function ObliczCene(){
                echo ($this->cena*$this->kurs."<br>");
            }
    
        }
        $auto= new NoweAuto("BMW",20,30);
        $auto->ObliczCene();

        class AutoZDodatkami extends NoweAuto{
            public $alarm=0;
            public $radio=0;
            public $klimatyzacja=0;
            function __construct($name, $cena, $kurs,$alarm, $radio, $klimatyzacja) {
                parent::__construct($name, $cena, $kurs);
                $this->alarm = $alarm;
                $this->radio = $radio;
                $this->klimatyzacja = $klimatyzacja;
            }

            function ObliczCene(){

                
                echo (($this->cena+$this->alarm+$this->radio+$this->klimatyzacja)*$this->kurs."<br>");
            }
        }

        $autoz= new AutoZDodatkami("Audi",20,20,20,30,20);
        $autoz->ObliczCene();

        class Ubezpieczenie extends AutozDodatkami{
            public $proc=1.2;
            public $lata=0;
            function __construct($name, $cena, $kurs,$alarm, $radio, $klimatyzacja, $proc, $lata) {
                parent::__construct($name, $cena, $kurs,$alarm, $radio, $klimatyzacja);
                $this->proc = $proc;
                $this->lata = $lata;
            }

            function ObliczCene()
            {
                echo ($this->proc*((($this->cena+$this->alarm+$this->radio+$this->klimatyzacja)*$this->kurs)*((100-$this->lata)/100)));
            }
        }
        $ubez= new Ubezpieczenie("Audi",20,20,20,30,20,100,2);
        $ubez->ObliczCene();

    ?>
</body>
</html>