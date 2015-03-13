<style>

body {
	/*background-color: #cccccc;*/
}

#container {
	width: 909px;
	height: auto;
	margin: 0 auto;
}

#content {
	width: 859px;
	height: auto;
	padding-left: 25px;
	padding-right: 25px;
	background-color: #06a7e1;
	float: left;
}

.section {
	width: 265px;
	height: 400px;
	margin-top: 40px;
	float: left;
	/*border: 1px solid red;*/
}

#hockey {
	margin-top: 40px;
	padding-left: 14px;
	padding-right: 14px;
}

.nextgame {
	width: 268px;
	height: 70px;
	margin-top: 0px;
	float: left;
	background-image: url("<?php echo base_url();?>static/img/hockey/nextgame.png");
}

#date {
	width: 50px;
	height: 60px;
	margin-left: 5px;
	margin-top: 5px;
	float: left;
}

#team {
	width: 203px;
	height: 60px;
	margin-left: 5px;
	margin-top: 5px;
	float: left;
}

#divider {
	width: 1px;
	height: 440px;
	background-color: #0378b8;
	float: left;
}

h1 {
	font-family: "AlternateGothic2BTRegular";
	font-size: 35px;
	color: #FFF;
	font-weight: normal;
	line-height: 35px;
}

h2 {
	font-family: "AlternateGothic2BTRegular";
	font-size: 18px;
	color: #FFF;
	font-weight: normal;
	margin-top: 5px;
	margin-left: 0px;


}

p {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #FFF;
}

.month {
	text-align: center;
	margin-top: 7px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight: normal;
	text-transform: uppercase;
}

.day {
	text-align: center;
	margin-top: -5px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 34px;
	font-weight: bold;
}

.listenlive {
	margin-top: 10px;
	float: left;
}

.schedule {
	font-family: "AlternateGothic2BTRegular", Arial, Helvetica;
	font-size: 18px;
	color: #f9ec33;
	float: left;
	margin-left: 15px;
	margin-top: 20px;
	text-decoration: underline;
}

.schedule:hover {
	text-decoration: none;
}
</style>

<div id="container">
	<img src="<?php echo base_url();?>static/img/hockey/header.png" alt="Welcome to RIT Hockey, presented by WITR 89.7" style="float:left;" />
    <div id="content">
    	<div class="section">
        	<h1 style="width: 250px;">WITR IS PROUD TO PRESENT LIVE BROADCASTS OF MEN'S AND WOMEN'S DIVISION 1 ICE HOCKEY!</h1>
            <p style="width: 250px; margin-top: 20px;"> We’re looking forward to another season of continued success with the Men’s team. And we’re proud to be a part of the Women’s inaugural Division 1 season! If you can’t make it to game, get in on the action here!</p>
        </div>
        <div id="divider"></div>
        <div class="section" id="hockey">
        	<img src="<?php echo base_url();?>static/img/hockey/mens.png" alt="Men's Hockey" />
            <h2>UPCOMING GAME</h2>
            <div class="nextgame">
            	<div id="date">
                	<p class="month"> <?php echo strftime('%b', strtotime($hockey['mens']->date)); ?> </p>
                    <p class="day"> <?php echo strftime('%d', strtotime($hockey['mens']->date)); ?> </p>
                </div>
                <div id="team">
                	<h1 style="margin-left: 7px; margin-top: 3px; color: #f9ec33;"> <?php echo $hockey['mens']->home ? "vs. " : "at "; echo $hockey['mens']->opponent; ?> </h1>
                    <h2 style="margin-left: 8px; margin-top: 0px;"> <?php echo strftime('%l:%M %p', strtotime($hockey['mens']->time)); ?> </h2>
                </div>
            </div>
            <a href="//witr.rit.edu/static/live.m3u"><img src="<?php echo base_url();?>static/img/hockey/stream.png" alt="Listen Live" class="listenlive"/></a>
            <a href="http://www.ritathletics.com/schedule.aspx?path=mhock" class="schedule" target="0">VIEW SCHEDULE</a>
            <p style="margin-top: 30px; float: left;">Men’s Hockey is sportscast by Ed Trefgzer, Scott Biggar, Chris Lerch, and Nick Phelan. We broadcast both home and away games over the air. </p>
        </div>
        <div id="divider"></div>
        <div class="section" id="hockey" style="margin-left: 0px;">
        	<img src="<?php echo base_url();?>static/img/hockey/womens.png" alt="Women's Hockey" />
            <h2>UPCOMING GAME</h2>
            <div class="nextgame">
            	<div id="date">
                	<p class="month"> <?php echo strftime('%b', strtotime($hockey['womens']->date)); ?> </p>
                    <p class="day"> <?php echo strftime('%d', strtotime($hockey['womens']->date)); ?> </p>
                </div>
                <div id="team">
                	<h1 style="margin-left: 7px; margin-top: 3px; color: #f9ec33;"> <?php echo $hockey['womens']->home ? "vs. " : "at "; echo $hockey['womens']->opponent; ?> </h1>
                    <h2 style="margin-left: 8px; margin-top: 0px;">2:35 PM</h2>
                </div>
            </div>
            <a href="//witr.rit.edu/static/2nd.m3u"><img src="<?php echo base_url();?>static/img/hockey/stream.png" alt="Listen Live" class="listenlive"/></a>
            <a href="http://www.ritathletics.com/schedule.aspx?path=whock" class="schedule" target="0">VIEW SCHEDULE</a>
            <p style="margin-top: 30px; float: left;">Women’s Hockey is sportscast by Nick Phelan, Fernando Ellis, and Renee Radwan. We broadcast home games over our 2nd internet stream.</p>
        </div>
    </div>
    <img src="<?php echo base_url();?>static/img/hockey/footer.png" style="float:left;"/>
</div>

