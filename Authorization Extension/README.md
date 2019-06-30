# Authorization Extension
This module is where we be assigning at least two users of BankZero to a role of either Manager, Employee, or Both.  This feature is very valuable as an identified role user can be given different access and abilities in an application.  In this section we'll be setting up Auth0's Authorization Extension API so that we can see in our Bank Zero Application what roles users have been assigned.  This small but crucial task is what is so valuable to application developers in need of authorization variables for their applications.

## Extension
First things first, [install the extension](https://auth0.com/docs/extensions/authorization-extension/v2/implementation/installation).  In the step by step instructions I do want to point out that installing the extension will create an ```auth0-authz``` application for your account.  Leave it alone!  Do Not Delete!

## Role Setup
Next you will [set up the extension](https://auth0.com/docs/extensions/authorization-extension/v2/implementation/setup).  The area to focus on here is Roles for our example.  Its fun to see what the other things can do, so feel free to set up groups and permissions too.  We're going to work on rules first just to make sure our extension works.  Click on Roles in the Authorization Extension tool you learned about in setup, then select Create Role.

![image](https://user-images.githubusercontent.com/51866741/60392268-03335f80-9ab4-11e9-8243-ccc503363c00.png)

Make sure to select your application that you just created.  These roles will follow the application so you want to make sure you get it right.

![image](https://user-images.githubusercontent.com/51866741/60392276-4392dd80-9ab4-11e9-9f9b-052ec32ecfd3.png)

Now you'll give your role a name and a description.  We'll do 2 roles, as mentioned above so repeat the process after saving this role.

## Configure Extension
 
For [Configuring the extension](https://auth0.com/docs/extensions/authorization-extension/v2/implementation/configuration) you'll want to follow the guide pretty closely to get a good grasp of what is going on here.  Take special note about adding Authorization Information to the Token Issued as that is what we'll be using to know what role a user has, in our code.  So, make sure to hit the slide bar for Roles under Token Contents, then publish the rule.  

## API Access

Its time to setup API access to our extension so that we can be able to query authorization conext about our users...namely their role.  Follow the instruction in the [Auth0 Docs Article](https://auth0.com/docs/extensions/authorization-extension/v2/api-access).  When you get to the section regarding your URL, make note of that, we'll need it in a few minutes.

Carefully follow the creation of the Application; this is not a Web App like BankZero's, but the entity that interacts with the Authorization Extension API.  Complete the Machine to Machine Application setup and head over to the API.  

In the API you'll need to Authorize your Machine to Machine Application. 

![image](https://user-images.githubusercontent.com/51866741/60397665-20901a00-9b04-11e9-9741-3ebffb379e8f.png)

Simply move the slider over.  

![image](https://user-images.githubusercontent.com/51866741/60397889-c47ac500-9b06-11e9-9153-47159504e13d.png)

Now hit the arrow and select your scopes.  At least pick the read:users scope as that is what this application uses to see what roles are available for the signed in user.  Once you hit "update" your done with the configuration in the dashboard!  Congrats, you've just setup the Authentication Extension API. 

## Using the API

While your still in the Authorization Extension API ui select test.  Test will have POST code that is used to ask for the Auth0 access token from your Machine to Machine application.  You can select any language at the top, but this application is writen in PHP so select that.  Take note of two cURL statements: URL and PostFields.  Notice your tenant is accessed for the URL and is specific to ```/oauth/token```; in the post field you'll notice the client_id and secret line up to your Machine to Machine Application you just created.  This app shows this being done in the post-bzauth-app.php file of our BankZero Application running locally.

https://github.com/NoelThompson/BankZeroA0/blob/e5f776a7ada16e9578e33f53cd116cbb4911d795/post-bzauth-app.php#L2-L30

When this POST request is made there is a response back from our M2M app with an access token.  We can use that access token to make calls to certain endpoints that are available in our API when the scope is setup correctly.  

So lets take a look at the GET to our API.  You can scroll down past the POST section of Test in your Auth0 ui window and will see the GET code segment next.  Once again select PHP.  You'll take note two cURL statements.  URL is now going to change to your API path...remember I said to make note of that earlier.  When we get to our code we'll paste that in there.  The URL wont be complete until you specify the end point that you want though...you'll see what I mean by scrolling down to review the actual code.  Next, notice the Header...that's the reply from your POST.  We're going update that Bearer progamatically instead, because if our token expires we'll be left with an unsable piece of code and our app will error.

https://github.com/NoelThompson/BankZeroA0/blob/e5f776a7ada16e9578e33f53cd116cbb4911d795/ae-api-access.php#L3-L36

In this api endpoint we are using the userID to grab the roles for a specific user in our GET URL.  We pull that userid with the getuser command available via our Auth0 SDK.  For more of the API endpoints available with the Authorization Extension check [here](https://auth0.com/docs/api/authorization-extension#get-user-roles).

## Run the App

Wehoo, we are ready folks.  Lets run this app and see our results. 

![image](https://user-images.githubusercontent.com/51866741/60398684-f6dcf000-9b0f-11e9-9fe6-417c93d27600.png)

Click Login and now you get to our customized Lock screen.  We can now see the colors we selected to personalize this for BankZero, we also see our Social Connections, and SignUp area.  Lets type in a username and password for a user that has at least one of selected roles you setup for authorization extension.

![image](https://user-images.githubusercontent.com/51866741/60398709-53d8a600-9b10-11e9-8fab-188a8c0c6d23.png)

Our Results show exactly what BankZero wanted out of this exersice and also illistrates the ease of which we put this together.  On our results page we see what the user ID is.  This is what we used to put into our API endpoint call.  The next line shows the results of that call.  We see that the user in the screen shot below has two roles, both Manager and Employee.  That result can now be used for further role programming and also provides the basis for how to get information from our API.

![image](https://user-images.githubusercontent.com/51866741/60398815-7a4b1100-9b11-11e9-867d-f389fb709526.png)

