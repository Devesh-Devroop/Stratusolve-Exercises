<?php

//PALINDROME

function isPalindrome($string){
    if(strrev($string)===$string){ 
        echo "Palindrome";// check if reversed string is the same as the original string
        return true;// if so return true, if not return false
    }
    else
        echo "Not a Palindrome";
        return false;
}
$string = ("trade"); // declare string
$betterString = strtolower(str_replace(' ','',$string)); // ignores character case by making everything lowercase and removes whitespaces.
isPalindrome($betterString);