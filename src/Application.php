<?php

namespace Ecommerce;

use Ecommerce\Cart\Item;
use Ecommerce\Cart\ShoppingCart;
use Ecommerce\Order\Order;
use Ecommerce\Invoice\TextInvoice;
use Ecommerce\Invoice\PDFInvoice;
use Ecommerce\Customer\Customer;
use Ecommerce\Payments\CashOnDelivery;
use Ecommerce\Payments\CreditCardPayment;
use Ecommerce\Payments\PaypalPayment;

class Application
{
    public static function run()
    {
        $galaxy = new Item('M51', 'Samsung Galaxy M51' , 20000);
        $iphone = new Item('I13', 'Iphone 13', 42000);
        $note = new Item('N12', 'Samsung Galaxy Note 12', 34000);

        $cart = new ShoppingCart();
        $cart->addItem($note, 1);
        $cart->addItem($galaxy, 5);
        $cart->addItem($iphone, 3);

        $customer = new Customer('Micoh Jomarie Yabut', 'Fiesta Communities, Angeles City', 'yabut.micohjomarie@auf.edu.ph');
        
        $order = new Order($customer, $cart);

        $invoice = new TextInvoice();
        $order->setInvoiceGenerator($invoice);
        $invoice->generate($order);

        $payment = new CashOnDelivery($customer);
        $order->setPaymentMethod($payment);
        $order->payInvoice();
        
    }
}