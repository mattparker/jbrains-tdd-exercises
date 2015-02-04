<?php
require_once 'Till.php';

/**
 * Class TillTest
 *
 */
class TillTest extends PHPUnit_Framework_TestCase {


    public function test_instance () {
        new Till();
    }

    public function test_we_can_send_a_barcode () {
        $till = new Till();
        $till->onBarcode("1234567890");

    }

    public function test_we_output_the_price_when_we_receive_a_barcode () {
        $till = new Till();
        $till->onBarcode("1234567890");

        $output = $till->getLastMessage();
    }

    public function test_barcodes_are_not_too_short () {}

    public function test_barcodes_are_not_too_long () {}

    public function test_barcodes_are_numbers_only () {}




}

