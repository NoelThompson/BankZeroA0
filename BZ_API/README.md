# BZ Authorization API

This API has been created to demonstrate Auth0's new Role Based Access Control core.  The API verifies an incoming JWT signed by Auth0 for the user that logs in. 

## Getting Started

To use this API we'll need to walk through the setup and get an understanding of how to configure it for opperation.  One key element that we will do is run this API seperately from our program just like any other API is running, typically on a server.  Here we'll run it locally on a different port from our BZ application.

To start us off lets first create the API in our Auth0 dashboard.  Head back into APIs and use the Create API button.  For this API the identifier or "Audience" will be local.  Auth0 is not going to be calling your API but your application will.  For this API I chose to run it at the following address:

```http://localhost:3100```

Therefore after naming my API, that is the address scheme that I put in. 

## Adjust API settings

The point of all this is that we get to set RBAC settings.  So lets do that now.  

![image](https://user-images.githubusercontent.com/51866741/60689198-90d5cd00-9e6f-11e9-89c4-cae044482d27.png)

Our particular app utilizes the Permissions delivered in the Access Token, so lets take advantage of that and complete that enablement.  

## Permissions

Since we are delivering permissions in our access token, and our application is code to specific permissions, please create these permissions exactly as indicated here.  After you are able to examine the code and see how it works, then feel free to create more Permissions to use in other Roles.  

To create the Permissions simply type in the box and select add, just as is shown below:

![image](https://user-images.githubusercontent.com/51866741/60689337-363d7080-9e71-11e9-9dc9-091a3dc16570.png)


## Setup the `.env` File

If you download this sample from the PHP API quickstart page, a `.env` file will come pre-populated with your API identifier and Auth0 domain. If you clone the repo from GitHub, you will need to rename `.env.example` to `.env` and provide these values manually.

## Install the Dependencies and Start the API

```bash
composer install
php -S localhost:3010
```

The API will be served at `http://localhost:3010`.

## Endpoints

The sample includes these endpoints:

**GET** /api/public
* An unprotected endpoint which returns a message on success. Does not require a valid JWT access token.

**GET** /api/private
* A protected endpoint which returns a message on success. Requires a valid JWT access token.

**GET** /api/private-scoped
* A protected endpoint which returns a message on success. Requires a valid JWT access token and a scope of read:messages.

## Running the Example With Docker

In order to run the example with [Docker](https://www.docker.com/) you need to have `docker` installed.

You also need to set the environment variables as explained [previously](#setup-the-env-file).

Execute in command line `sh exec.sh` to run the Docker in Linux, or `.\exec.ps1` to run the Docker in Windows.

## What is Auth0?

Auth0 helps you to:

* Add authentication with [multiple authentication sources](https://docs.auth0.com/identityproviders), either social like **Google, Facebook, Microsoft Account, LinkedIn, GitHub, Twitter, Box, Salesforce, amont others**, or enterprise identity systems like **Windows Azure AD, Google Apps, Active Directory, ADFS or any SAML Identity Provider**.
* Add authentication through more traditional **[username/password databases](https://docs.auth0.com/mysql-connection-tutorial)**.
* Add support for **[linking different user accounts](https://docs.auth0.com/link-accounts)** with the same user.
* Support for generating signed [Json Web Tokens](https://docs.auth0.com/jwt) to call your APIs and **flow the user identity** securely.
* Analytics of how, when and where users are logging in.
* Pull data from other sources and add it to the user profile, through [JavaScript rules](https://docs.auth0.com/rules).

## Create a free Auth0 account

1. Go to [Auth0](https://auth0.com/signup) and click Sign Up.
2. Use Google, GitHub or Microsoft Account to login.

## Issue Reporting

If you have found a bug or if you have a feature request, please report them at this repository issues section. Please do not report security vulnerabilities on the public GitHub issue tracker. The [Responsible Disclosure Program](https://auth0.com/whitehat) details the procedure for disclosing security issues.

## Author

[Auth0](https://auth0.com)

## License

This project is licensed under the MIT license. See the [LICENSE](LICENSE.txt) file for more info.
