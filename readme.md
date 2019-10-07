# Calculator

This calculator app is comprised of two instances of a calculator. The more advanced calculator is built using browser side code. This is intended to bring a better calculator experience to the majority of users with modern browsers. This calculator aims to mimic the functionality of the iOS built in calculator application.

There is also a slightly less advanced calculator built using no javascript that should work on any device or browser.

## Getting Started

This project was developed in the Homestead development environment that is recommended to use with laravel. I recommend at least having PHP 7+, MySql and Node configured.

### Installation

Browser based calculator will require compilation.

```
npm install
npm run dev
```

For PHP calculator.

```
php artisan migrate
```

## Instructions

To access the browser calculator go to the root url. For the PHP calculator click the link or append '/calculator' to your base url.

The 'M' button will save the current number to memory when pressed once then apply the saved number when pressed again. It simply toggles between saving and outputting an number.

## Main Files

+ resources/js/components/Calculator.vue
+ app/Http/Controllers/CalculatorController.php

### Extra features

The browser based calculator allows you to repeatedly apply the last operation by continuing to press equals. 

After applying a repeat operation you can append a new number and the last operation will still be saved. 

The repeat operation is only reset by clearing the calculator or applying another operation.

## Reasoning

The question asked for use of PHP when answering this question. However the amount of data that needs to be persisted is minimal. Virtual calculators tend to be used quickly and then discarded.

A JS implementation makes more sense for this use case because of its fast nature. If a user has the ability to use JS why not provide the whole solution in JS for simplicity and speed.

However not everyone can use javascript so a more broadly accessible solution is also important. This implementation is less usable as the page needs to be reloaded every button press. It has the advance of accessibility

## Limitations

+ Time - I had limited time this weekend so have only been able to deliver a minimum viable answer.

+ Requirements - The requirements were vague and questions did not yeild a response.

## Future Work

Given more time I would apply the following developments in this order:

1. Bring PHP calculator functionality in line with JS calculator.

2. Develop cron job to clear database of old calculator instances after values have not been updated in a certain time period.

3. Refactor and apply tests.

4. Detect old IE versions or JS disabled browsers and automatically show /calculator.

## Built With

* [Laravel](https://laravel.com/) - The web framework used
* [Vue js](https://vuejs.org/) - Javascript library

