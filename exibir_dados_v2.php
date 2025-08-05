<?php

print "<pre>";
print "Dados do Formulário: <br>";
print_r($_POST);

print "Interesses: <br>";
print_r($_POST["interesses"]);

print "Interesses item 2: <br>";
print_r($_POST["interesses"][2]);
print "</pre>";
