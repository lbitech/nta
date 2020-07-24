<head>
<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css" integrity="sha384-cg6SkqEOCV1NbJoCu11+bm0NvBRc8IYLRGXkmNrqUBfTjmMYwNKPWBTIKyw9mHNJ" crossorigin="anonymous">

</head>
<body>

    <img src="clear-nta-logo.png" alt="Northern Training Academy" width="130" height="86" style="padding-left: 20px; padding-top: 20px; padding-bottom: 60px;">
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET" class="pure-form pure-form-stacked" style="padding-left: 20px; padding-bottom: 60px;" >
        <fieldset>
            <legend> Learning Mentor Level 3 - Activity 1 <?php echo "Hello NTA"; ?></legend><br><br><br>
            <div class="pure-g" style="padding-bottom: 60px;">
                <div class="pure-u-1 pure-u-md-1-3">
                    <label for="multi-first-name">This is an example question</label><br>
                    <textarea rows="5" cols="80" name="comment_data" id="multi-first-name" class="pure-u-23-24"/><?php echo $_GET["comment_data"]; ?></textarea><br><br>
                </div>
                        <br><br>
            <button type="submit" class="pure-button pure-button-primary">Save</button>
        </fieldset>
    </form>
</body>
<footer>
</footer>