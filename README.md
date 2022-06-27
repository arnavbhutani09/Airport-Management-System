# AirportMgmtSystem
## Airport
This module deals with airport details and allows adding, editing or deleting them. This module stores these details about each Airport: Airport ID, Airport Name, Location, Runways.
###### Work flow: Primary key used for this module is Airport ID. There are three options provided for data manipulation:
Add -> can be used to insert a new entry but refrains from using an already existing Airport ID
Edit -> can be used to edit a particular entry using a specified Airport ID
Delete -> can be used to delete a record by specifying the airport ID
## Flight details
This module involves flight details of each flight of the particular airline. This module stores these details about each flight: Flight ID, Airline Name, Flight Type and Capacity.
###### Work flow: Primary key used is Flight ID. Data manipulation options provided for this module are:
Add -> can be used to insert a new entry but refrains from using an already existing Flight ID
Edit -> can be used to edit a particular entry using a specified Flight ID
Delete -> can be used to delete a record by specifying the Flight ID
## Crew details
This module stores details of all crew members working in the particular airline. This module involves these details about each crew member: Member ID, Member Name, Designation, Mobile Number, Email.
###### Work flow: 
Primary key used is Member ID. Data manipulation options provided for this module are:
Add -> can be used to insert a new entry but refrains from using an already existing Member ID
Edit -> can be used to edit a particular entry using a specified Member ID
Delete -> can be used to delete a record by specifying the Member ID
## Flight crew
This module stores details of all crew members working in the particular airline. This module involves these details about each crew member: Member ID, Member Name, Designation, Mobile, Number, Email.
###### Work flow: 
Primary keys- Flight ID, Member ID, Airport ID
Foreign keys-
Flight ID -> Flight details (FlightID)
Member ID -> Crew details (MemberID)
Airport ID -> Airport (AirportID)
There are three options provided for data manipulation:
Add -> can be used to insert a new entry
Edit -> can be used to edit a particular entry
Delete -> can be used to delete a record by specifying the Flight ID, Member ID and Airport ID
## Flight schedule
This module stores scheduling details of the flights. This module involves these details: Flight ID,
Departure Date, Departure Time, Source airport, Destination airport, Number Of Passengers, Status, Remarks.
###### Work flow: 
Primary keys- Flight ID, Departure Date, Airport ID
Foreign keys-
Flight ID -> Flight details (FlightID)
Airport ID -> Airport (AirportID)
There are three options provided for data manipulation:
Add -> can be used to insert a new entry
Edit -> can be used to edit a particular entry
Delete -> can be used to delete a record by specifying the Flight ID, Departure Date and Source
