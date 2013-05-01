<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
<html>
    <body>
        <div class="container">
        <?php 
            if(isset($flash['errors'])){
                foreach($flash['errors'] as $error){
                    echo '<p class="text-error">'.$error.'</p>'; 
                }
            }
        ?>
        <?php if(isset($flash['message'])) echo '<p class="text-success">'.$flash['message'].'</p>'; ?>
        <form id="my_form" method="post" >
            <fieldset>
                <legend>Contact Form</legend>
                <label>Email</label>
                <input type="text" type="email" name="email" />
                <label>Subject</label>
                <input type="text" name="subject" />
                <label>Message
                    <textarea name="message"></textarea>
                </label>
                <button type="submit" class="btn">Submit</button>
            </fieldset>
        </form>
        </div>
    </body>
</html>