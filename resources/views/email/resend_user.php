<h2>Welcome, <?php echo $user->name ?>!</h2>
<p>This email has been sent on behalf of WITR 89.7 to notify you that your account has either not been created or an error had occurred during its creation.
To create your account, please navigate to the link below. If you are getting this email, but have already created your account, please recreate it by the following link.
We appologize for any inconvenience.
<br><br>
<a style="color: #00A7E1" href="//witr.rit.edu/dj/create_account/<?php echo $user->username ?>"><?php echo base_url(); ?>dj/create_account/<?php echo $user->username ?></a>
<br><br>
Any issues can be reported to <a style="color: #00A7E1" href="mailto:webmaster@witr.rit.edu">webmaster@witr.rit.edu</a>.
<br><br>
Thank you and welcome to WITR 89.7!
</p>
