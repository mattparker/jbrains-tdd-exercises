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

        if (!$this->guardBarcode($barcode_string)) {
            return;
        }

        $this->message = '$14.99';
    }


    /**
     * Checks the validity of the barcode string.
     *
     * This could be refactored out into a Barcode VO
     * but not sure it's worth it atm.
     *
     * @param $barcode_string
     *
     * @return bool
     */
    private function guardBarcode ($barcode_string) {

        if (strlen($barcode_string) <= 6) {
            $this->error = sprintf("Barcode %s too short", $barcode_string);
            return false;
        }
        if (strlen($barcode_string) >= 15) {
            $this->error = sprintf("Barcode %s too long", $barcode_string);
            return false;
        }
        if (!preg_match('%^[\d]+%', $barcode_string)) {
            $this->error = sprintf("Barcode %s contains non-numerical characters", $barcode_string);
        }
        return true;
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
