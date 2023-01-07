<?php

namespace Ecommerce\Invoice;

use Ecommerce\Order\Order;

interface InvoiceStrategy
{
	public function generate(Order $order);
}