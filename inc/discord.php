<?php

//Constants
$timestamp = date("c", strtotime("now"));
$cf7_discord_notification_options = get_option( 'cf7_discord_notification_option_name' ); 
$webhookURL = $cf7_discord_notification_options['webhook_url_0']; 
$username = $cf7_discord_notification_options['username_1']; 
$color = hexdec($cf7_discord_notification_options['color_2']);
$avatar_url = $cf7_discord_notification_options['avatar_url_3']; 

if($username == ''){
    $username == "CF7DN";
}

function cf7_to_discord() {
    global $webhookURL, $username,$avatar_url,$color, $timestamp;

    ?>
        <script>
            // Get Form Field Values from FormID
            document.addEventListener( 'wpcf7submit', function( event ) {
                var cf7_inputs = event.detail.inputs;
                sendMessage(cf7_inputs);
            }, false );

            // Send Message To Discord Webhook
            function sendMessage(cf7_inputs) {

            // Explode Array
            var fields = cf7_inputs;
            for (var key in fields) {
                var value = fields[key];
            }

            // Discord Post Request Fields
            var request = new XMLHttpRequest();
                request.open("POST", "<?php echo $webhookURL; ?>");
                request.setRequestHeader('Content-type', 'application/json');
                var params = {
                username: "<?php echo $username;?>",
                avatar_url: "<?php echo $avatar_url; ?>",
                embeds:[
                    {
                        fields: fields,
                        color: <?php echo $color;?>,
                        timestamp: "<?php echo $timestamp; ?>",
                    }
                ],

                }   
                request.send(JSON.stringify(params));
            }

        </script>
    <?php
}
add_action('wp_head', 'cf7_to_discord');

