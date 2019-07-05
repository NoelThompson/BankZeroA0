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

The permissions you'll be putting in are:
```read:mainpage```
```edit:mainpage```

When you run the application and the user has a certain role, which we'll get to in a sec, you'll notice the BZ application will give you a text box; based on the permissions, attached to the role, the user will be able to edit that text box or not.

## Create Roles

At this point in using the dashboard you were probably wondering what the "Roles" section of Users & Roles was all about, as you recall when we worked on the authorization extension, we set Roles there.  Roles in this area of the Auth0 dashboard is significant to our RBAC core.  It is very functional, easy to use, and can be updated without opening a new browser tab.  Go on in at select Roles, then Create Role.

![image](https://user-images.githubusercontent.com/51866741/60698721-9b12be00-9ea5-11e9-9135-5bb162913810.png)
![image](https://user-images.githubusercontent.com/51866741/60698742-b1207e80-9ea5-11e9-870f-3669089ff9c5.png)

The name for the roles we'll be creating here are: 
```BZ Employee```
 and 
```BZ Manager```
.  Once created you can assign some users and Permissions to each role.  Lets do permissions first.  Select the permissions link just under your Role title.  From there its a simple add Permissions.  You will now be presented with the Add Permissions popup.  Here you'll need to select your API.  For us this will be the API we created earlier and set our ```localhost:3100``` for.

![image](https://user-images.githubusercontent.com/51866741/60699395-808e1400-9ea8-11e9-93f4-609a827abc81.png)

Once selected choose the appropriate role for the permissions.  BZ Manager should get ```read:mainpage``` and ```edit:mainpage``` while BZ Employee will only recieve ```read:mainpage``` for this exercise.

![image](https://user-images.githubusercontent.com/51866741/60699525-22156580-9ea9-11e9-9a15-385575e89725.png)

Make your selection and click Add Permissions.

What Permissions done, hit the Users link and select add users.  Now the assign window appears; simply type the name of a user to begin the search.  When found select Assign.  Do this for both roles so we are able to have a good experience within the application.  When your settings, permissions, and users are done, hit "<- Back to Roles" to exit.  

If you find yourself in the Roles main window, there is a shortcut to assigning users as depicted below.

![image](https://user-images.githubusercontent.com/51866741/60698890-64897300-9ea6-11e9-8e8b-71b138b0d685.png)

## Time to Setup the API

Your done with the dashboard for now.  We need to start putting the rest of the puzzle together for RBAC.  For that lets move back to our desktop.  Since you have already installed the app locally your almost there for the API too.  Head into this folder in your editor and update the ```.env``` file.  The setting you'll need to update here is the Domain.  This needs to be your tenent.  The reason for this is that when this is working, we will need to verify the access token that is being passed to the API.  

## Run the API

Last step here is to run the API.  Since we'll be running our app locally as well, just open a new terminal window and change the directory to where is api is located on your local machine.  From there you should be able to run the API.

Simply type in

```php -S localhost:3100```

Now your running the API!
