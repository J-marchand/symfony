<?php

require('vendor/autoload.php');
use Acme\LetterA;
use Acme\LetterB;
use Acme\LetterC;
use Acme\Sp\LetterD;

$letterA = new LetterA();
$letterB = new LetterB();
$letterC = new LetterC();
$letterD = new LetterD();
$bjr = new Bonjour();
$bsr = new Bonsoir();

$letterA->setA('Je suis la class A');
$letterB->setB('Je suis la class B');
$letterC->setC('Je suis la class C');
$letterD->setD('Je suis la class D');

echo('<p>' .$letterA->getA(). '</p>');
echo('<p>' .$letterB->getB(). '</p>');
echo('<p>' .$letterC->getC(). '</p>');
echo('<p>' .$letterD->getD(). '</p>');
echo('<p>' .random(). '</p>');
echo('<p>' .$bjr->getBjr(). '</p>');
echo('<p>' .$bjr->getBsr(). '</p>');


?>