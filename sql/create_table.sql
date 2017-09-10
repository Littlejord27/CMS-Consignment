CREATE SCHEMA collegecloset;
USE collegecloset;

CREATE TABLE users(
	username VARCHAR(255),
    password VARCHAR(255),
    CONSTRAINT pk_users_username
    PRIMARY KEY(username)
);

CREATE TABLE customers (
	customer_id int auto_increment,
    name VARCHAR(255),
	email VARCHAR(255),
    phone int(10),
    balance int,
    note VARCHAR(255),
    CONSTRAINT pk_customers_customer_id
    PRIMARY KEY(customer_id)
);

CREATE TABLE orders (
	order_id int auto_increment,
	customer_id int,
    date TIMESTAMP,
    cash double,
    credit double,
    notes VARCHAR(255),
    CONSTRAINT fk_orders_order_id
    PRIMARY KEY(order_id)
);