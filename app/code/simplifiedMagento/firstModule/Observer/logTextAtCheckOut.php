<?php
    namespace simplifiedMagento\firstModule\Observer;
    use Magento\Framework\Event\Observer;
    use Magento\Framework\Event\ObserverInterface;

    class logTextAtCheckOut implements ObserverInterface{
        public function execute(Observer $observer){
            /*$writer = new \Zend\Log\Writer\Stream(BP . 'var/log/test.log');
            $logger = new \Zend\Log\Logger();
            $logger->addWriter($writer);
            $logger->info("hee___hee");*/

            /*$event = $observer->getEvent();
            $quote = $event->getQuote();
            echo $texto = $quote->getData();*/

            $fichero = 'var/log/test.log';
            $actual = file_get_contents($fichero);
            $actual .= "Final Flash!!!!!\n";
            file_put_contents($fichero, $actual);

            /*$myfile = fopen("var/log/test.log", "w") or die("Unable to open file!");
            $txt = "hee hee23\n";
            file_put_contents($myfile, $txt);
            fclose($myfile);*/


            /*$event = $observer->getEvent();
            $quote = $event->getQuote();
            $myfile = fopen("var/log/test.log", "a+") or die("Unable to open file!");
            fwrite($myfile, print_r($quote->getData(),true));
            fclose($myfile);*/
        }
    }