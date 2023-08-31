<?php
namespace App\Model\author;

/**
 * AccountInterface will checkAccountExsits 
 * 
 * for all classes.
 * 
 */
interface AccountInterface
{
    /**
     * checkAccountExsits will check for 
     * 
     * account exsists or not.
     * 
     * @access public
     * 
     * @return boolean
     */
    public function checkAccountExsits():bool;
}