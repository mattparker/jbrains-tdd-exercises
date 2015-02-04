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
        $this->assertEquals("$14.99", $output);
    }

    public function test_there_is_no_output_when_we_dont_scan_anything () {
        $till = new Till();
        $output = $till->getLastMessage();
        $this->assertEquals("", $output);
    }

    public function test_barcodes_are_not_too_short () {}

    public function test_barcodes_are_not_too_long () {}

    public function test_barcodes_are_numbers_only () {}




}

