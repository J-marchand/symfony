<?php

require('vendor/autoload.php');
use Acme\Personne;
use Acme\Address;

$personne1 = new Personne();

$personne1->setAge(22);
$personne1->setFirstName('Jean-Marie');
$personne1->setLastName('Marchand');

$address1 = new Address();

$address1->setCountry('France');
$address1->setCp(94880);
$address1->setCity('Noiseau');
$address1->getStreet('12 Rue anatole France');

echo('<p>Je m\'appel ' .$personne1->getFirstName().' ' .$personne1->getLastName(). ' J\'ai ' .$personne1->getAge(). ' ans</p>');
echo('<p>J\'habite en ' .$address1->getCountry(). ' à ' .$address1->getCity(). ' au ' .$address1->getStreet(). ' ' .$address1->getCp(). '</p>');

?>