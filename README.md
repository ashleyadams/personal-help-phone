# personal-help-phone ;)
An app providing a simple IVR (interactive voice response) system for a programmable phone number using the Twilio service.

The specific purpose is to allow someone with a free phone number on their account to dial in and contact friends/family after entering a pin.

Caller ID recognition would allow bypass of the pin entry but if you have your own phone you probably have your contacts set up and sufficient allowance to make a call! 
However if you don't have your phone or the battery is dead you can use another phone or payphone and call the freephone Twilio number (on your account). With this you can then contact designated numbers without needing to remember them. Useful in minor emergencies!

Other users who are recognised by the system can dial in and reach the owner by recognising caller ID and the system will then route the call. Or if the incoming number is completely unrecognised a pin will allow this access.

Uses Lumen framework and Twilio SDK. 


### Requirements

- Twilio account with a phone number - doesn't have to be free phone 
- Public facing PHP enabled environment which Twilio services can reach
- Phone number needs to be set up on Twilio to make a webhook request to the project's endpoint:    /caller

The Docker container will serve requests on port 86 externally. Use ngrok to allow Twilio to see your local dev environment.

