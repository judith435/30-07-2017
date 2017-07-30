<?php
    interface ITax {
        function calculate($totalWage);
    }

    class IncomeTax implements ITax {
        private $brackets;

        function __construct() {
            $this->brackets = ['10' => 6000, '14' => 9000, '20' => 14000, '31' => 20000, '35' => 41000];
               
        }

        function calculate($totalWage) {
            $tax = 0;
            $currentWage = $totalWage;
       
            foreach($this->brackets as $key => $value ) {
                if ($currentWage - $value > 0) {
                    $tax += $value*$key/100;
                    $currentWage -= $value;
                } else {
                    $tax += $currentWage*$key/100;
                }
            }
            return $tax;
        }

    }

    class SocialSecurity implements ITax {
        private $medianSalary = 5804;

        function calculate($totalWage) {
            $tax = 0;
            if ($totalWage > $this->medianSalary) {
                $tax = ($totalWage-$this->medianSalary)*17.83/100;

                $totalWage = $this->medianSalary;
            }

            $tax += $totalWage* 5.97/100;

            return $tax;
           
            
        }
    }

    class Pension {

        function calculate($totalWage) {
            return $totalWage*0.15;
        }

    }

    class Compensation {
         function calculate($totalWage) {
            return $totalWage*0.08333;
        }
    }

    class PrivateFund {
         function calculate($totalWage) {
            return $totalWage*0.1;
        }
    }

    class Invoice {
        private $wagePerHourNeto;
        private $totalHours;
        private $wageBroto;

        function __construct($wagePerHourNeto, $totalHours) {
            $this->wagePerHourNeto = $wagePerHourNeto;
            $this->totalHours = $totalHours;
            $this->wageBroto = $wagePerHourNeto * $totalHours;
        }

        function calculateIncomeTax() {
            $t = new IncomeTax();
            $tax = $t->calculate($this->wagePerHourNeto*$this->totalHours);
            $this->wageBroto += $tax;
        }

        function calculateSocialSecurity() {
            $t = new SocialSecurity();
            $tax = $t->calculate($this->wagePerHourNeto*$this->totalHours);
            $this->wageBroto += $tax;
        }

        function calculatePension() {
            $t = new Pension();
            $tax = $t->calculate($this->wagePerHourNeto*$this->totalHours);
            $this->wageBroto += $tax;
        }

        function calculateCompensation() {
            $t = new Compensation();
            $tax = $t->calculate($this->wagePerHourNeto*$this->totalHours);
            $this->wageBroto += $tax;
        }

        function calculatePrivateFund() {
            $t = new PrivateFund();
            $tax = $t->calculate($this->wagePerHourNeto*$this->totalHours);
            $this->wageBroto += $tax;
        }


        function getNeto() {
            return $this->wagePerHourNeto * $this->totalHours;
        }

        function getTotalInvoice() {
            return $this->wageBroto;
        }

    }

class UnitTest {

    function Test() {
        $s = new SocialSecurity();
        $sum = $s->calculate(10000);
        
        return $sum == "1094.6456" ? "true" : "false";
    }
}



$invoice1 = new Invoice(100, 150);
//$invoice1->calculateIncomeTax();
$invoice1->calculateSocialSecurity();
$invoice1->calculatePension();
$invoice1->calculateCompensation();
$invoice1->calculatePrivateFund();



echo "Neto: ". $invoice1->getNeto(). "<br>";
echo "Broto". $invoice1->getTotalInvoice();
?>