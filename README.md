# personal-help-phone ;)
A Twilio app allowing flexible contact options to/from the owner of a toll free number.

Uses Lumen framework and Twilio SDK.

### Overview

When someone calls a Twilio phone number, a call is made to a webhook which responds with TwiML (Twilio Markup Language) describing how the call should be handled.

The purpose of this application is to allow a range of personal "emergency" contact actions the owner of a toll-free number could use in the event they have lost access to their regular phone or contacts, or allow friends/family to reach the user if they call that number.

- Detect caller id and allow the designated owner of the Twilio number to contact a shortlist of friends/family without knowing their phone numbers.
- Allow any caller id with the correct owner-pin to also perform owner actions (e.g. owner is calling from a payphone)
- Allow specific identified callers to directly reach the owner phone number
- Allow other callers to call the owner with the correct user-pin

### Requirements

- Twilio account with a phone number - doesn't have to be toll free
- Public facing PHP enabled environment which Twilio services can reach

The Docker container will serve requests on port 86 externally. Use ngrok to allow Twilio to see your local dev environment.


