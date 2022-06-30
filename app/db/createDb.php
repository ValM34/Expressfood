<?php

// Db connexion

require 'connDb.php';

// Create users table

$pdo->exec('CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password CHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    streetAddress VARCHAR(255) NOT NULL,
    postCode VARCHAR(10) NOT NULL,
    role ENUM ("customer", "restorer", "deliverer") NULL DEFAULT "customer",
    createdAt TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=UTF8');

echo 'Tables : USERS, ';

// Create deliverer table

$pdo->exec('CREATE TABLE deliverers (
    user_id INT DEFAULT NULL,
    localisation VARCHAR(255) NOT NULL,
    status ENUM ("offline", "not_free", "free", "delivering") NULL DEFAULT "not_free",
    FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=UTF8');

echo 'DELIVERERS, ';

// Create command table

$pdo->exec('CREATE TABLE commands (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    customer_id INT DEFAULT NULL,
    deliverer_id INT DEFAULT NULL,
    price INT(6) NOT NULL,
    status ENUM ("pending", "delivering", "delivered") NULL DEFAULT "pending",
    createdAt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updatedAt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (deliverer_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=UTF8');

echo 'COMMANDS, ';


// Create today's special table

$pdo->exec('CREATE TABLE today_s_special (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    command_id INT DEFAULT NULL,
    meal_id INT DEFAULT NULL,
    quantity int(2) NOT NULL,
    createdAt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=UTF8');

echo 'MEAL created successfuly!';

// Create meal table

$pdo->exec('CREATE TABLE meal (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(255) NOT NULL,
    price INT(4) NOT NULL,
    createdAt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=UTF8');

echo 'TODAYS_S_SPECIAL created successfuly!';

/*
// Create posts_comments table

$pdo->exec("CREATE TABLE posts_comments (
    post_id INT UNSIGNED NOT NULL,
    comment_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (post_id, comment_id),
    CONSTRAINT fk_post
        FOREIGN KEY (post_id)
        REFERENCES posts (id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    CONSTRAINT fk_comment
        FOREIGN KEY (comment_id)
        REFERENCES comments (id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
) DEFAULT CHARSET=UTF8");

echo 'POSTS_COMMENTS, ';

// Create users_posts table

$pdo->exec("CREATE TABLE users_posts (
    user_id INT UNSIGNED NOT NULL,
    post_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (user_id, post_id),
    CONSTRAINT fk_user
        FOREIGN KEY (user_id)
        REFERENCES users (id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    CONSTRAINT fk_post
        FOREIGN KEY (post_id)
        REFERENCES posts (id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
) DEFAULT CHARSET=UTF8");

echo 'USERS_POSTS, ';

// Create posts_categories table

$pdo->exec("CREATE TABLE posts_categories (
    post_id INT UNSIGNED NOT NULL,
    category_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (post_id, category_id),
    CONSTRAINT fk_post
        FOREIGN KEY (post_id)
        REFERENCES posts (id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    CONSTRAINT fk_category
        FOREIGN KEY (category_id)
        REFERENCES categories (id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
) DEFAULT CHARSET=UTF8");

echo 'POSTS_CATEGORIES were created successfult !';
*/