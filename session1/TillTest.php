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

    public function test_barcodes_are_not_too_short () {
        $till = new Till();
        $till->onBarcode("123456");
        $error = $till->getLastError();
        $this->assertEquals("Barcode 123456 too short", $error);
    }

    public function test_barcodes_are_not_too_long () {
        $till = new Till();
        $till->onBarcode("123456789012345");
        $error = $till->getLastError();
        $this->assertEquals("Barcode 123456789012345 too long", $error);
    }

    public function test_barcodes_are_numbers_only () {
        $till = new Till();
        $till->onBarcode("abcdefgh");
        $error = $till->getLastError();
        $this->assertEquals("Barcode abcdefgh contains non-numerical characters", $error);
    }

    public function test_barcodes_ending_in_newline_are_ok () {
        $till = new Till();
        $till->onBarcode("123456789\n");
        $error = $till->getLastError();
        $this->assertEquals("", $error);
    }

    public function test_invalid_barcodes_dont_send_a_price () {
        $till = new Till();
        $till->onBarcode("1");
        $output = $till->getLastMessage();
        $this->assertEquals("", $output);
    }

    public function test_barcodes_containing_one_nondigit_are_invalid () {}




}

