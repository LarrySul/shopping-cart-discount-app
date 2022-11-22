## Shopping Cart Discount App

This CLI program is built on the LARAVEL FRAMEWORK. The program is built to implement list of REST API endpoints that create customers, product, and calculate discounts on orders prior to creating the orders.


<p> The program has three (3) endpoints </p>

<li> Create customer - Create customer endpoint </li>

![Screenshot for Create customer endpoint](https://github.com/LarrySul/shopping-cart-discount-app/blob/feature/public/screenshots/customer.png)

<li> Create product - Create product endpoint </li>

![Screenshot for Create product endpoint ](https://github.com/LarrySul/shopping-cart-discount-app/blob/feature/public/screenshots/product.png)

<li> Create order - The endpoint calculate discount, create order and update customer revenue column on customer table  </li>

![Screenshot for calculating discount, create order endpoint ](https://github.com/LarrySul/shopping-cart-discount-app/blob/feature/public/screenshots/order.png)


## Repository Overview 

The repository contains source code on how to setup the application 

### Specifications in the clone include

<li> Endpoints that creates customers, products and customer orders </li>

<li> Core logic of the application reside within the Product, Customer and Order Controllers respectively</li>

<li> Writing of errors to logfile </li>

<li> The project has a total of 3 test cases (3 Unit) </li> <br>

![Screenshot of test cases ](https://github.com/LarrySul/shopping-cart-discount-app/blob/feature/public/screenshots/test.png)

## Requirements 

<li> Download <a href="https://www.php.net/downloads.php"> PHP V8.1 </a> and above. </li>

<li> Install <a href="https://getcomposer.org/download/"> Composer </a> </li>

## Explanation

The application covers the following use case

<li> A customer who has already bought for over € 1000, gets a discount of 10% on the whole order. </li>
<li> For every product of category "Switches" (id 2), when you buy five, you get a sixth for free. </li>
<li> If you buy two or more products of category "Tools" (id 1), you get a 20% discount on the cheapest product. </li>


## Steps to run locally 

<li> Clone this repository: </li>

<pre> git clone https://github.com/LarrySul/shopping-cart-discount-app </pre> 

<li> Install dependencies: </li>

<pre> composer install </pre>


