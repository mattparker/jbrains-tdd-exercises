<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 04/02/15
 * Time: 19:29
 */


/**
 * Class Till
 *
 * First exercise for jbrains TDD session - the Point Of Sale Exercise
 *
 */
class Till {

    private $error = '';
    private $message = '';

    /**
     * @param $barcode_string string
     */
    public function onBarcode ($barcode_string) {

        if (strlen($barcode_string) <= 6) {
            $this->error = sprintf("Barcode %d too short", $barcode_string);
        }
        $this->message = '$14.99';
    }

    /**
     * @return string
     */
    public function getLastMessage () {
        return $this->message;
    }

    public function getLastError () {
        return $this->error;
    }

}
