<?php

require dirname(__DIR__) . '../../vendor/autoload.php';

$faker = Faker\Factory::create('fr_FR');

require 'connDb.php';

// Cleane db
$pdo->exec("SET FOREIGN_KEY_CHECKS = 0");
$pdo->exec("TRUNCATE TABLE users");
$pdo->exec("TRUNCATE TABLE commands");
$pdo->exec("TRUNCATE TABLE deliverers");
$pdo->exec("TRUNCATE TABLE today_s_special");
$pdo->exec("TRUNCATE TABLE meal");
$pdo->exec("SET FOREIGN_KEY_CHECKS = 1");

echo 'Database tables cleaned successfuly! - ';

// Create users (role: customer)

echo 'database tables ';

$hashPassword = null;
for ($i = 0; $i < 89; $i++) {
    $hashPassword = password_hash($faker->password, PASSWORD_BCRYPT);
    $pdo->exec("INSERT INTO users 
                SET surname='{$faker->firstName}',
                    name='{$faker->name}',
                    password='{$hashPassword}',
                    email='{$faker->email}',
                    phone='{$faker->e164PhoneNumber}',
                    streetAddress='{$faker->streetAddress}',
                    postCode='{$faker->postcode}',
                    role ='customer',
                    createdAt='{$faker->date} {$faker->time}'
                ");
}

echo 'USERS (role: customer, ';

// Create user (role: restorer)

$hashPassword = null;
    $hashPassword = password_hash($faker->password, PASSWORD_BCRYPT);
    $pdo->exec("INSERT INTO users 
                SET surname='{$faker->firstName}',
                    name='{$faker->name}',
                    password='{$hashPassword}',
                    email='{$faker->email}',
                    phone='{$faker->e164PhoneNumber}',
                    streetAddress='{$faker->streetAddress}',
                    postCode='{$faker->postcode}',
                    role ='restorer',
                    createdAt='{$faker->date} {$faker->time}'
                ");

echo 'restorer, ';

// Create users (role: deliverer)

$hashPassword = null;
for ($i = 0; $i < 10; $i++) {
    $hashPassword = password_hash($faker->password, PASSWORD_BCRYPT);
    $pdo->exec("INSERT INTO users 
                SET surname='{$faker->firstName}',
                    name='{$faker->name}',
                    password='{$hashPassword}',
                    email='{$faker->email}',
                    phone='{$faker->e164PhoneNumber}',
                    streetAddress='{$faker->streetAddress}',
                    postCode='{$faker->postcode}',
                    role ='deliverer',
                    createdAt='{$faker->date} {$faker->time}'
                ");
}

echo 'deliverer), ';

// Create commands (status: delivered)

for ($i = 10; $i < 19; $i++) {
    $p = $i + 1;
    $m = $p + 80;
    $pdo->exec("INSERT INTO commands 
                SET customer_id='{$p}',
                    deliverer_id='{$m}',
                    price='8800',
                    status = 'delivered'
                ");
    
}

for ($i = 20; $i < 29; $i++) {
    $p = $i + 1;
    $m = $p + 70;
    $pdo->exec("INSERT INTO commands 
                SET customer_id='{$p}',
                    deliverer_id='{$m}',
                    price='8800',
                    status = 'delivered'
                ");
    
}

for ($i = 30; $i < 39; $i++) {
    $p = $i + 1;
    $m = $p + 60;
    $pdo->exec("INSERT INTO commands 
                SET customer_id='{$p}',
                    deliverer_id='{$m}',
                    price='8800',
                    status = 'delivered'
                ");
    
}

for ($i = 40; $i < 49; $i++) {
    $p = $i + 1;
    $m = $p + 50;
    $pdo->exec("INSERT INTO commands 
                SET customer_id='{$p}',
                    deliverer_id='{$m}',
                    price='8800',
                    status = 'delivered'
                ");
    
}

for ($i = 50; $i < 59; $i++) {
    $p = $i + 1;
    $m = $p + 40;
    $pdo->exec("INSERT INTO commands 
                SET customer_id='{$p}',
                    deliverer_id='{$m}',
                    price='8800',
                    status = 'delivered'
                ");
    
}

for ($i = 60; $i < 69; $i++) {
    $p = $i + 1;
    $m = $p + 30;
    $pdo->exec("INSERT INTO commands 
                SET customer_id='{$p}',
                    deliverer_id='{$m}',
                    price='8800',
                    status = 'delivered'
                ");
    
}

for ($i = 70; $i < 79; $i++) {
    $p = $i + 1;
    $m = $p + 20;
    $pdo->exec("INSERT INTO commands 
                SET customer_id='{$p}',
                    deliverer_id='{$m}',
                    price='8800',
                    status = 'delivered'
                ");
    
}

for ($i = 80; $i < 89; $i++) {
    $p = $i + 1;
    $m = $p + 10;
    $pdo->exec("INSERT INTO commands 
                SET customer_id='{$p}',
                    deliverer_id='{$m}',
                    price='8800',
                    status = 'delivered'
                ");
    
}

echo 'COMMANDS (status: delivered, ';

// Create commands (status: delivering)

for ($i = 3; $i < 9; $i++) {
    $p = $i + 1;
    $m = $p + 90;
    $pdo->exec("INSERT INTO commands 
                SET customer_id='{$p}',
                    deliverer_id='{$m}',
                    price='8800',
                    status = 'delivered'
                ");
    
}

echo 'delivering, ';

// Create commands (status: pending)

for ($i = 0; $i < 3; $i++) {
    $p = $i + 1;
    $m = $p + 90;
    $pdo->exec("INSERT INTO commands 
                SET customer_id='{$p}',
                    deliverer_id='{$m}',
                    price='8800',
                    status = 'delivered'
                ");
    
}

echo 'pending), ';

// Create deliverers

for ($i = 91; $i < 101; $i++) {
    $pdo->exec("INSERT INTO deliverers 
                SET user_id='{$i}',
                    status='offline',
                    localisation='{$faker->streetAddress}'
                ");
}

echo 'DELIVERERS, ';

// todays special 

$pdo->exec("INSERT INTO today_s_special 
                SET command_id='1',
                    meal_id='1',
                    quantity='2'
                ");

echo 'TODAYS_S_SPECIAL (Plat 1, ';

$pdo->exec("INSERT INTO today_s_special 
                SET command_id='1',
                    meal_id='2',
                    quantity='2'
                ");

echo 'Plat 2) created successfuly!';


// meal 

$pdo->exec("INSERT INTO meal 
                SET name='steack frite',
                    price='24'
                ");

$pdo->exec("INSERT INTO meal 
                SET name='steack salade',
                    price='20'
                ");

echo 'TODAYS_S_SPECIAL (Plat 1, ';