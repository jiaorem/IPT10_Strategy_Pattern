<?php

namespace Ecommerce\Payments;

interface PaymentStrategy
{
	public function pay($amount);
}