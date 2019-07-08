# Auth0 + BankZero Proof of Concept Sample App

This sample demonstrates and validates that Auth0 is easy to use and has the ability to address BankZero's identity and security needs.
This application uses [PHP](http://php.net/) and started by using the [Auth0](https://auth0.com) quick start web application.

Check the [PHP Quickstart](https://auth0.com/docs/quickstart/webapp/php) to better understand this sample.

## Requirements for this proof of concept:

1. BankZero needs users to be able to sign up with a user name and password in the Auth0 databases
2. Existing users need to be able to authenticate with a user name and password
3. The Auth0 Lock / Sign In screen needs to be customized to align with BankZero's brand
4. Users should be able to Login with two Social providers
5. BankZero only wants users with the email domain "examplewidgets.com" or "bankzero.com" to be able to login (add social domains too)
6. Authorization Extension, provided by Auth0, needs to be utilized so that the capabilities of roles can be demonstrated.

Bonus: Utilize Auth0's new core RBAC feature

## Getting Started

Lets get started.  The first thing to do is sign up for your Auth0 account.  Use the Auth0 link above and login.  After your authenticated you can begin to navigate around the Auth0 dashboard.  The dashboard is incredibly useful and well laid out so enjoy playing with the different sections to familiarize yourself with the layout.  Once your ready, head on over to Applications. ![image](https://user-images.githubusercontent.com/51866741/60377289-49ac8f80-99ca-11e9-992a-48f8d403163e.png)

You'll select Create new application and your journey begins.  Give this application a Name and go ahead and select "Regular Web Applications", which highlights it, and click create.  This defaults you to the quick start page.  Before we get there, lets go ahead and look at settings.  A couple of things will be filled out for you already.  Notice Domain, recognize that number scheme?  Its what is also listed next to your profile icon in the top right of the dashboard.  This is called a tenent, and we are using a Development tenant indicated by ```dev```.  You can create a Domain instead and not use the dev platform if you choose.  Client ID and Client Secret are going to be used very soon so just take note of them here.

Head over to the Quick Start link and select PHP.  
![image](https://user-images.githubusercontent.com/51866741/60378333-fc361f80-99d5-11e9-81ee-836af64b7694.png)

Go ahead and read through the quick start, then fill out your URL callbacks just as stated. We'll be installing the dependancies shortly.  Instead of downloading the sample in the quick start, clone this repository to the directory of your choosing.  You'll be using this code as there's a bit more in here to complete all of our requirements. 

## Let's Install

*I ran this application on a Mac, so the commands and screenshots provide here will reflect that.  Windows will be very similar, just make sure you call commands specific to Windows and not Mac.*

Open up a Terminal and navigate to the location where you cloned this code using ```cd``` and ```pwd``` to see where you are.  Type in bash so that your changed to the bash command processor.  

```
$ bash
bash-3.2$ 
```
Now head on out https://getcomposer.org/download/ and run the script as instructed (copy the whole script and paste it into your command prompt).  This will install composer.  Get the dependency install out of the way now in preparation of running this app.  Type the following:
```
php composer.phar require auth0/auth0-php:"~5.0"
```

Next we need to open up the code in your editor of choice as a couple of things need to be updated.  Open up the file `.env` and populate it with your app's client ID, client secret, domain, and callback URL. These can be retrieved from your [Auth0 dashboard](https://manage.auth0.com).  Once done save the file and we'll get right into running the app.

## Running the App

Back on your terminal type the following: 

```
php -S localhost:3000
```

The app will be served at [http://localhost:3000/](http://localhost:3000/).  That simply means type this in your browser URL.
Thats it!  Your are now running this application.  To get the full use out of we get to now start playing with the Auth0 dashboard.  So lets go have some more fun. :-)

[Create users](https://github.com/NoelThompson/BankZeroA0/tree/master/Create%20Users)
