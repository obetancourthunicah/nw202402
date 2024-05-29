<?php

require_once 'Contacto.php';

$contactos = [];

$contactos[] = new Contacto();
$contactos[] = new Contacto(1, "Juan", "123456");
$contactos[] = new Contacto(2, "Maria", "654321", "maria@somemail.com");
$contactos[] = new Contacto(3, "Pedro", "987654", "pedro@someMail.com", "La Casita de la Esquina");

foreach ($contactos as $contacto) {
    echo "<pre>" . $contacto->toJson() . "</pre>";
    echo "<hr>";
}
