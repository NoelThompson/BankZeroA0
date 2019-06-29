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
