# Auth0 + BankZero Proof of Concept Sample App

This sample demonstrates and validates that Auth0 is easy to use and has the ability to address BankZero's identity and security needs.
This application uses [PHP](http://php.net/) and started by using the [Auth0](https://auth0.com) quick start web application.

Check the [PHP Quickstart](https://auth0.com/docs/quickstart/webapp/php) to better understand this sample.

## Requirements for this proof of concept:

1. BankZero needs users to be able to sign up with a user name and password in the Auth0 databases
2. Existing users need to be able to authenticate with a user name and password
3. The Auth0 Lock sign in screen needs to be customized to align with BankZero's brand
4. Users should be able to login with two Social providers
5. BankZero only wants users with the email domain "examplewidgets.com" to be able to login (add social domains too)
6. Authorization Extension, provided by Auth0, needs to be utilized so that the capabilities of roles can be demonstrated.

## Getting Started

Lets get started.  The first thing to do is sign up for your Auth0 account.  Use the Auth0 link above and login.  After your authenticated you can begin to navigate around the Auth0 dashboard.  The dashboard is incredibly useful and well laid out so enjoy playing with the different sections to familiarize yourself with the layout.  Once your ready, head on over to Applications: ![image](https://user-images.githubusercontent.com/51866741/60377289-49ac8f80-99ca-11e9-992a-48f8d403163e.png)
You'll select Create new application and your journey begins.  To guide you through some of the setup here is some of Auth0's documentation on creating the application.  Come on back here when your ready for your for the quick start.  Since this application is done, you'll be able to simply clone this repository and get going right away.

, 
Before starting, make sure you have `composer` and `php` installed.

Rename the `.env.example` file to `.env` and populate it with your app's client ID, client secret, domain, and callback URL. These can be retrieved from your [Auth0 dashboard](https://manage.auth0.com).

## Running the App

```bash
composer install
php -S localhost:3000
```

The app will be served at [http://localhost:3000/](http://localhost:3000/).

## Running the App With Docker

Before starting, make sure you have `docker` installed.

Rename the `.env.example` file to `.env` and populate it like explained [previously](#getting-started).

Execute in command line `sh exec.sh` to run the Docker in Linux, or `.\exec.ps1` to run the Docker in Windows.

The app will be served at [http://localhost:3000/](http://localhost:3000/).

## What is Auth0?

Auth0 helps you to:

* Add authentication with [multiple authentication sources](https://docs.auth0.com/identityproviders), either social like **Google, Facebook, Microsoft Account, LinkedIn, GitHub, Twitter, Box, Salesforce, amont others**, or enterprise identity systems like **Windows Azure AD, Google Apps, Active Directory, ADFS or any SAML Identity Provider**.
* Add authentication through more traditional **[username/password databases](https://docs.auth0.com/mysql-connection-tutorial)**.
* Add support for **[linking different user accounts](https://docs.auth0.com/link-accounts)** with the same user.
* Support for generating signed [Json Web Tokens](https://docs.auth0.com/jwt) to call your APIs and **flow the user identity** securely.
* Analytics of how, when and where users are logging in.
* Pull data from other sources and add it to the user profile, through [JavaScript rules](https://docs.auth0.com/rules).

## Create a free account in Auth0

1. Go to [Auth0](https://auth0.com) and click Sign Up.
2. Use Google, GitHub or Microsoft Account to login.

## Issue Reporting

If you have found a bug or if you have a feature request, please report them at this repository issues section. Please do not report security vulnerabilities on the public GitHub issue tracker. The [Responsible Disclosure Program](https://auth0.com/whitehat) details the procedure for disclosing security issues.

## Author

[Auth0](https://auth0.com)

## License

This project is licensed under the MIT license. See the [LICENSE](LICENSE.txt) file for more info.
