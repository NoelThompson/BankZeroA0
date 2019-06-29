# Whitelist

## Create a Rule

In this part of the exercise we need to whitelist an email domain.  The reason BankZero wants this capability is because its a security measure; only allowing email domains that they want access to their system.  Auth0 provides this feature to its customers through the ease of a created rule.  These rules can be customized and you'll be able to see that there are way more options than just "whitelist".

Navigate your dashboard to the rules section:

![image](https://user-images.githubusercontent.com/51866741/60385248-199dd480-9a3c-11e9-89ec-29c01cd58a5b.png)

Next select Create Rule.  For this sample app we'll select white list and work on our configuration there.  You'll notice that you have some java script that has been pre-populated for your use.  For this case I'd like you to go ahead and use the java script in this repository named rule.js.  The reason is that there are a couple small changes that allow for a full domain rather than individual email addresses.  

```
function (user, context, callback) {

  // Access should only be granted to verified users.
  if (!user.email || !user.email_verified) {
    return callback(new UnauthorizedError('Access denied.'));
  }

  const whitelist = [ 'examplewidgets.com' , 'gmail.com' , 'hotmail.com' ]; //authorized users
  const userHasAccess = whitelist.some(
    function (domain) {
      const emailSplit = user.email.split('@');
      return domain === emailSplit[emailSplit.length-1].toLowerCase();
    });

  if (!userHasAccess) {
    return callback(new UnauthorizedError('Access denied.'));
  }

  callback(null, user, context);
  ```
  
Remember when I said to take note of the e-mail domain in the create user step?  This is where that comes into play.
*Note: I'd like to mention here that rules do run in order, so if you have more than one make sure the order is appropriate*
  
Lastly, select save after you've had a chance to update the domains to match your created users and social domains your using.

## Customize your lock screen next
The next part of our journey is to customize our lock screen.
