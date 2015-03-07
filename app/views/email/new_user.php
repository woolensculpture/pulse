<h2>Welcome, <?php echo $user->name ?>!</h2>
<p>This email has been sent on behalf of WITR 89.7 to notify you that an account has been created for you.
In order to finish the creation of your account, please click the link below to our website.
<br><br>
<a style="color: #00A7E1" href="<?php echo base_url(); ?>dj/create_account/<?php echo $user->username ?>"><?php echo base_url(); ?>dj/create_account/<?php echo $user->username ?></a>
<br><br>
Any issues can be reported to <a style="color: #00A7E1" href="mailto:webmaster@witr.rit.edu">webmaster@witr.rit.edu</a>.
<br><br>
Thank you and welcome to WITR 89.7!
</p>