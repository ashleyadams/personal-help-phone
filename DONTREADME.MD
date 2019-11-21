# Project Notes

Some notes about the development of this project.

### Work in progress

The project is incomplete and does not work as an IVR yet.

I have commented out the instantiation of the Twilio client so that the project can be tested without providing a valid SID/Token.

### Improvements

In its present state the project is over-engineered for its specific purpose (some vanilla php without a database may have been suitable) but at the same time under-developed for any broader purpose.

- Management UI - A web-based UI to edit/change phone numbers

- Change pin during call

- Language support - The 'say' phrases can be ran through a translate system. Or alternatively be mapped to voice recordings.

- Leave voice messages, call custom numbers

- Security - IP whitelisting would have been nice to enable but is not supported by Twilio. They recommend signature validation which requires SSL using certificates which are not self-signed. We can add support for LetsEncrypt to the Docker container to enable this.

- Abstraction of telephony service - if we wanted to be able to easily swap provider or offer this as a package for others to use with any service of their choice. Create interfaces for the request/responses and write Twilio classes that implement them.




