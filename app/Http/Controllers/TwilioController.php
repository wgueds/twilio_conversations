<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\ChatGrant;

class TwilioController extends Controller
{
    protected $twilioAccountSid;
    protected $twilioApiKey;
    protected $twilioApiSecret;
    protected $serviceSid;

    public function __construct() {
        $this->twilioAccountSid = getenv('TWILIO_ACCOUNT_SID');
        $this->twilioApiKey = getenv('TWILIO_API_KEY');
        $this->twilioApiSecret = getenv('TWILIO_API_KEY_SECRET');
        $this->serviceSid = getenv('TWILIO_SERVICE_SID');
    }

    public function generateAccessToken(Request $request) {
        $twilioAccountSid = $this->twilioAccountSid;
        $twilioApiKey = $this->twilioApiKey;
        $twilioApiSecret = $this->twilioApiSecret;

        // Required for Chat grant
        $serviceSid = $this->serviceSid;
        // choose a random username for the connecting user
        $identity = $request->user()->email;

        // Create access token, which we will serialize and send to the client
        $token = new AccessToken(
            $twilioAccountSid,
            $twilioApiKey,
            $twilioApiSecret,
            3600,
            $identity
        );

        // Create Chat grant
        $chatGrant = new ChatGrant();
        $chatGrant->setServiceSid($serviceSid);

        // Add grant to token
        $token->addGrant($chatGrant);

        return response()->json([
            'token' => $token->toJWT()
        ]);
    }
}
