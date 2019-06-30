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
